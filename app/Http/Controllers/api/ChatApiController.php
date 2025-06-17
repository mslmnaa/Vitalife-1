<?php

namespace App\Http\Controllers\Api;

use App\Models\Chat;
use App\Models\User;
use App\Models\Payment;
use App\Events\NewChatMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChatApiController extends Controller
{
    /**
     * Get unread message count for the current user
     */
    public function getUnreadCount(Request $request)
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthenticated',
                    'unread_count' => 0
                ], 401);
            }
            
            $unreadCount = Chat::where('receiver_id', $user->id)
                ->where('is_read', false)
                ->count();
                
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
            ]);
        }
    }
    
    /**
     * Send a new chat message
     */
    public function sendMessage(Request $request)
    {
        try {
            $validated = $request->validate([
                'payment_id' => 'required|exists:payments,id',
                'message' => 'required|string|max:1000',
                'receiver_id' => 'required|exists:users,id'
            ]);

            $user = Auth::user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthenticated'
                ], 401);
            }
            
            // Create the message
            $chat = Chat::create([
                'payment_id' => $validated['payment_id'],
                'sender_id' => $user->id,
                'receiver_id' => $validated['receiver_id'],
                'message' => $validated['message'],
                'is_read' => false
            ]);

            // Load sender relation for complete data
            $chat->load('sender');

            // Broadcast to payment channel
            broadcast(new NewChatMessage($chat))->toOthers();
            
            // Also broadcast to personal channel of the receiver
            broadcast(new NewChatMessage($chat, $validated['receiver_id']))->toOthers();
            
            return response()->json([
                'success' => true,
                'message' => $chat
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Chat send message error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to send message: ' . $e->getMessage()
            ]);
        }
    }
}
