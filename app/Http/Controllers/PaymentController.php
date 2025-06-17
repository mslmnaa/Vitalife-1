<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Voucher;
use App\Models\Spesialis;
use App\Services\TripayService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $tripayService;

    public function __construct(TripayService $tripayService)
    {
        $this->tripayService = $tripayService;
    }

    /**
     * Store a newly created payment in storage.
     */
    public function store(Request $request)
    {
        Log::info('PaymentController: Store method called', ['request_data' => $request->all()]);

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'specialist_id' => 'required|exists:spesialis,id_spesialis',
            'full_name' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'complaints' => 'required|string',
            'medical_history' => 'nullable|string',
            'payment_method' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            Log::error('PaymentController: Validation failed', ['errors' => $validator->errors()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        try {
            // Get specialist details
            $specialist = Spesialis::findOrFail($request->specialist_id);
            Log::info('PaymentController: Specialist found', ['specialist' => $specialist->toArray()]);
            
            // Calculate payment details
            $amount = $specialist->harga;
            $discountAmount = session('discount_amount', 0);
            $totalAmount = session('discounted_price', $amount);
            $voucherCode = session('applied_voucher');
            
            Log::info('PaymentController: Payment calculation', [
                'original_amount' => $amount,
                'discount_amount' => $discountAmount,
                'total_amount' => $totalAmount,
                'voucher_code' => $voucherCode
            ]);
            
            // Create payment record first
            $payment = Payment::create([
                'user_id' => Auth::id(),
                'specialist_id' => $request->specialist_id,
                'full_name' => $request->full_name,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'medical_history' => $request->medical_history,
                'complaints' => $request->complaints,
                'amount' => $amount,
                'discount_amount' => $discountAmount,
                'total_amount' => $totalAmount,
                'voucher_code' => $voucherCode,
                'status' => 'pending',
            ]);

            Log::info('PaymentController: Payment record created', ['payment_id' => $payment->id]);

            // Create Tripay transaction
            $merchantRef = 'PAY-' . $payment->id . '-' . time();
            
            // Get user email with fallback
            $userEmail = Auth::user()->email ?? 'customer@example.com';
            
            // Clean phone number
            $cleanPhone = preg_replace('/[^0-9]/', '', $request->phone_number);
            if (substr($cleanPhone, 0, 1) === '0') {
                $cleanPhone = '62' . substr($cleanPhone, 1);
            } elseif (substr($cleanPhone, 0, 2) !== '62') {
                $cleanPhone = '62' . $cleanPhone;
            }
            
            $transactionData = [
                'method' => $request->payment_method,
                'merchant_ref' => $merchantRef,
                'amount' => (int) $totalAmount,
                'customer_name' => $request->full_name,
                'customer_email' => $userEmail,
                'customer_phone' => $cleanPhone,
                'order_items' => [
                    [
                        'sku' => 'CONSULTATION-' . $specialist->id_spesialis,
                        'name' => 'Medical Consultation with ' . $specialist->nama,
                        'price' => (int) $totalAmount,
                        'quantity' => 1,
                    ]
                ]
            ];

            Log::info('PaymentController: Creating Tripay transaction', ['transaction_data' => $transactionData]);

            $tripayResult = $this->tripayService->createTransaction($transactionData);

            Log::info('PaymentController: Tripay result', ['tripay_result' => $tripayResult]);

            if ($tripayResult && isset($tripayResult['success']) && $tripayResult['success']) {
                // Update payment with Tripay data
                $payment->update([
                    'tripay_reference' => $tripayResult['data']['reference'],
                    'tripay_merchant_ref' => $merchantRef,
                    'payment_url' => $tripayResult['data']['checkout_url'] ?? null,
                    'payment_instructions' => json_encode($tripayResult['data']['instructions'] ?? []),
                    'expired_at' => isset($tripayResult['data']['expired_time']) ? 
                        date('Y-m-d H:i:s', $tripayResult['data']['expired_time']) : 
                        now()->addHours(24),
                ]);

                Log::info('PaymentController: Payment updated with Tripay data');

                // Update voucher usage if applicable
                if ($voucherCode && session()->has('voucher_id')) {
                    $voucher = Voucher::find(session('voucher_id'));
                    if ($voucher) {
                        $voucher->usage_count += 1;
                        if ($voucher->usage_limit && $voucher->usage_count >= $voucher->usage_limit) {
                            $voucher->is_used = true;
                        }
                        $voucher->save();
                        Log::info('PaymentController: Voucher usage updated');
                    }
                }

                // Clear session variables
                session()->forget(['applied_voucher', 'discount_amount', 'discounted_price', 'discount_percentage', 'voucher_id']);

                return response()->json([
                    'success' => true,
                    'payment' => $payment,
                    'tripay_data' => $tripayResult['data']
                ]);
            }

            // If Tripay transaction fails, keep the payment record but log the error
            Log::error('PaymentController: Tripay transaction failed', [
                'tripay_result' => $tripayResult,
                'payment_id' => $payment->id
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to create payment transaction with Tripay',
                'error_details' => $tripayResult['message'] ?? 'Unknown error'
            ], 500);

        } catch (\Exception $e) {
            Log::error('PaymentController: Exception occurred', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $spesialis = Spesialis::findOrFail($id);
        
        // Get available payment channels from Tripay
        $paymentChannelsResponse = $this->tripayService->getPaymentChannels();
        $paymentChannels = [];
        
        if ($paymentChannelsResponse && $paymentChannelsResponse['success']) {
            $paymentChannels = $paymentChannelsResponse['data'];
        }
        
        // Store specialist information in session for voucher validation
        session(['specialist_id' => $id]);
        
        // Get the price from the specialist
        if (!session()->has('specialist_price')) {
            session(['specialist_price' => $spesialis->harga]);
        }
        
        return view('user.spesBayar', compact('spesialis', 'paymentChannels'));
    }

    /**
     * Update an existing payment status.
     */
    public function updateStatus(Request $request, Payment $payment)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|string|in:pending,confirmed,cancelled,expired,failed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $payment->status = $request->status;
        
        if ($request->status === 'confirmed') {
            $payment->payment_date = now();
        }
        
        $payment->save();

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
