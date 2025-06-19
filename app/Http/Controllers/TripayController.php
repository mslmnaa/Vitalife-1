<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\TripayService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class TripayController extends Controller
{
    protected $tripayService;

    public function __construct(TripayService $tripayService)
    {
        $this->tripayService = $tripayService;
    }

    public function getPaymentChannels()
    {
        $channels = $this->tripayService->getPaymentChannels();
        
        if ($channels && $channels['success']) {
            return response()->json([
                'success' => true,
                'data' => $channels['data']
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to fetch payment channels'
        ], 500);
    }

    public function createTransaction(Request $request)
    {
        $request->validate([
            'method' => 'required|string',
            'amount' => 'required|numeric',
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string',
            'payment_id' => 'required|exists:payments,id'
        ]);

        $payment = Payment::findOrFail($request->payment_id);
        
        // Generate unique merchant reference
        $merchantRef = 'PAY-' . $payment->id . '-' . time();

        $transactionData = [
            'method' => $request->method,
            'merchant_ref' => $merchantRef,
            'amount' => $request->amount,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'order_items' => [
                [
                    'sku' => 'CONSULTATION-' . $payment->specialist_id,
                    'name' => 'Medical Consultation',
                    'price' => $request->amount,
                    'quantity' => 1,
                ]
            ]
        ];

        $result = $this->tripayService->createTransaction($transactionData);

        if ($result && $result['success']) {
            // Update payment record with Tripay reference
            $payment->update([
                'tripay_reference' => $result['data']['reference'],
                'tripay_merchant_ref' => $merchantRef,
                'payment_url' => $result['data']['checkout_url'] ?? null,
                'payment_instructions' => json_encode($result['data']['instructions'] ?? []),
                'expired_at' => date('Y-m-d H:i:s', $result['data']['expired_time']),
            ]);

            return response()->json([
                'success' => true,
                'data' => $result['data']
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to create transaction'
        ], 500);
    }

    public function callback(Request $request)
    {
        $data = $request->all();
        
        Log::info('Tripay Callback Received:', $data);

        // Validate callback signature
        if (!$this->tripayService->validateCallback($data)) {
            Log::error('Invalid Tripay callback signature');
            return response()->json(['message' => 'Invalid signature'], 400);
        }

        // Find payment by merchant reference
        $payment = Payment::where('tripay_merchant_ref', $data['merchant_ref'])->first();

        if (!$payment) {
            Log::error('Payment not found for merchant_ref: ' . $data['merchant_ref']);
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Update payment status based on Tripay status
        $status = $this->mapTripayStatus($data['status']);
        
        $payment->update([
            'status' => $status,
            'tripay_status' => $data['status'],
            'payment_date' => $status === 'confirmed' ? now() : null,
        ]);

        Log::info('Payment status updated:', [
            'payment_id' => $payment->id,
            'status' => $status,
            'tripay_status' => $data['status']
        ]);

        return response()->json(['message' => 'Callback processed successfully']);
    }

    public function return(Request $request)
    {
        $reference = $request->get('reference');
        
        if ($reference) {
            $payment = Payment::where('tripay_reference', $reference)->first();
            
            if ($payment) {
                // Redirect to appropriate page based on payment status
                if ($payment->status === 'confirmed') {
                    return redirect()->route('dashboard')->with('success', 'Payment successful!');
                } else {
                    return redirect()->route('dashboard')->with('info', 'Payment is being processed.');
                }
            }
        }

        return redirect()->route('dashboard')->with('error', 'Payment not found.');
    }

    private function mapTripayStatus($tripayStatus)
    {
        $statusMap = [
            'UNPAID' => 'pending',
            'PAID' => 'confirmed',
            'EXPIRED' => 'expired',
            'FAILED' => 'failed',
            'REFUND' => 'refunded',
        ];

        return $statusMap[$tripayStatus] ?? 'pending';
    }
}
