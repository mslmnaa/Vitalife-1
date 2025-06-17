<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use App\Models\Payment;
use App\Models\Spesialis;
use Illuminate\Http\Request;
use App\Events\NewChatMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    /**
     * Display the chat interface for a specific payment
     */
    public function show($payment_id)
    {
        try {
            Log::info('Chat show called with payment_id: ' . $payment_id);
            
            // Find the payment and ensure it belongs to the current user or specialist
            $payment = Payment::with(['user', 'specialist'])->find($payment_id);
            
            if (!$payment) {
                Log::error('Payment not found: ' . $payment_id);
                return redirect()->route('chat.index')->with('error', 'Chat room not found.');
            }
            
            // Check if user is authorized to view this chat
            $user = Auth::user();
            $isSpecialist = false;
            
            if ($user->role === 'admin' || $user->role === 'dokter') {
                // Get specialist associated with the payment
                $specialist = Spesialis::find($payment->specialist_id);
                
                if (!$specialist) {
                    Log::error('Specialist not found: ' . $payment->specialist_id);
                    return redirect()->route('chat.index')->with('error', 'Specialist not found.');
                }
                
                // If no user_id is associated with the specialist, create this association
                if (!$specialist->user_id && $user->role === 'admin') {
                    $specialist->user_id = $user->id;
                    $specialist->save();
                }
                
                // Check if current admin/dokter user is associated with this specialist
                $isSpecialist = ($specialist->user_id === $user->id);
                
                if (!$isSpecialist) {
                    return redirect()->route('chat.index')->with('error', 'You are not authorized to view this chat.');
                }
            } else {
                // Regular user - must be the payment owner
                if ($payment->user_id !== $user->id) {
                    return redirect()->route('chat.index')->with('error', 'You are not authorized to view this chat.');
                }
            }
            
            // Get all messages for this payment
            $messages = Chat::where('payment_id', $payment_id)
                ->with(['sender'])
                ->orderBy('created_at', 'asc')
                ->get();
            
            // Mark messages as read if user is the receiver
            Chat::where('payment_id', $payment_id)
                ->where('receiver_id', $user->id)
                ->where('is_read', false)
                ->update(['is_read' => true]);
            
            Log::info('Chat show successful for payment: ' . $payment_id);
            
            return view('user.chat.show', compact('payment', 'messages', 'isSpecialist'));
        } catch (\Exception $e) {
            Log::error('Chat show error: ' . $e->getMessage(), [
                'payment_id' => $payment_id,
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('chat.index')->with('error', 'Unable to load chat.');
        }
    }
    
    /**
     * List all chats for the current user
     */
    public function index()
    {
        try {
            $user = Auth::user();
            
            if ($user->role === 'admin' || $user->role === 'dokter') {
                // Find specialists linked to this admin/dokter user
                $specialists = Spesialis::where('user_id', $user->id)->pluck('id_spesialis');
                
                // If no specialists found and user is dokter, try to find direct association
                if ($specialists->isEmpty() && $user->role === 'dokter') {
                    // Mencari spesialis berdasarkan ID user dokter
                    $specialist = Spesialis::where('user_id', $user->id)->first();
                    
                    if ($specialist) {
                        $specialists = collect([$specialist->id_spesialis]);
                    }
                }
                
                // Get payments for these specialists with confirmed status
                $payments = Payment::whereIn('specialist_id', $specialists)
                    ->where('status', 'confirmed')
                    ->with(['user', 'specialist'])
                    ->latest()
                    ->get();
                    
            } else {
                // Regular user - show their payments with confirmed status
                $payments = Payment::where('user_id', $user->id)
                    ->where('status', 'confirmed')
                    ->with(['user', 'specialist'])
                    ->latest()
                    ->get();
            }
            
            return view('user.chat.index', compact('payments'));
        } catch (\Exception $e) {
            Log::error('Chat index error: ' . $e->getMessage());
            return view('user.chat.index', ['payments' => collect()]);
        }
    }
    
    /**
     * Send a new chat message
     */
    public function store(Request $request)
    {
        try {
            // Log the incoming request for debugging
            Log::info('Chat store request:', [
                'user_id' => auth()->id(),
                'request_data' => $request->all(),
                'url' => $request->url()
            ]);

            $request->validate([
                'payment_id' => 'required|exists:payments,id',
                'message' => 'required|string|max:1000',
                'receiver_id' => 'required|exists:users,id'
            ]);

            $payment = Payment::findOrFail($request->payment_id);
            $user = Auth::user();
            
            // Verify user has permission to send message in this chat
            $hasPermission = false;
            if ($user->role === 'admin' || $user->role === 'dokter') {
                $specialist = Spesialis::where('id_spesialis', $payment->specialist_id)
                    ->where('user_id', $user->id)
                    ->exists();
                $hasPermission = $specialist;
            } else {
                $hasPermission = ($payment->user_id === $user->id);
            }
            
            if (!$hasPermission) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized to send message in this chat'
                ], 403);
            }
            
            // Create the message
            $chat = Chat::create([
                'payment_id' => $request->payment_id,
                'sender_id' => $user->id,
                'receiver_id' => $request->receiver_id,
                'message' => $request->message,
                'is_read' => false
            ]);

            // Load sender relation for complete data
            $chat->load('sender');

            // Log successful message creation
            Log::info('Chat message created:', ['chat_id' => $chat->id]);

            // Broadcast event - DISEDERHANAKAN
            try {
                broadcast(new NewChatMessage($chat))->toOthers();
                Log::info('Broadcast successful');
            } catch (\Exception $e) {
                Log::error('Broadcast failed: ' . $e->getMessage());
            }
            
            return response()->json([
                'success' => true,
                'message' => $chat
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Chat validation error:', $e->errors());
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Chat store error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to send message: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Get unread message count for the current user
     */
    public function getUnreadCount(Request $request)
    {
        try {
            // Log the request for debugging
            Log::info('Unread count request:', [
                'user_id' => auth()->id(),
                'authenticated' => auth()->check()
            ]);

            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthenticated',
                    'unread_count' => 0
                ], 401);
            }
            
            $user = Auth::user();
            $unreadCount = Chat::where('receiver_id', $user->id)
                ->where('is_read', false)
                ->count();
                
            Log::info('Unread count retrieved:', ['count' => $unreadCount]);
                
            return response()->json([
                'success' => true,
                'unread_count' => $unreadCount
            ]);
        } catch (\Exception $e) {
            Log::error('Get unread count error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to get unread count: ' . $e->getMessage(),
                'unread_count' => 0
            ], 500);
        }
    }
}
