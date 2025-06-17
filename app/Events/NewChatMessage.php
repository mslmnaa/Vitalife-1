<?php

namespace App\Events;

use App\Models\Chat;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class NewChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat;

    /**
     * Create a new event instance.
     */
    public function __construct(Chat $chat)
    {
        $this->chat = $chat->load('sender');
        
        // Enhanced logging
        Log::info('NewChatMessage event created:', [
            'chat_id' => $this->chat->id,
            'payment_id' => $this->chat->payment_id,
            'sender_id' => $this->chat->sender_id,
            'receiver_id' => $this->chat->receiver_id,
            'message' => $this->chat->message,
            'broadcast_driver' => config('broadcasting.default'),
            'event_class' => get_class($this)
        ]);
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn(): array
    {
        $channels = [
            new PrivateChannel('chat.' . $this->chat->payment_id),
            new PrivateChannel('user.' . $this->chat->receiver_id),
        ];
        
        Log::info('Broadcasting on channels:', [
            'payment_channel' => 'private-chat.' . $this->chat->payment_id,
            'user_channel' => 'private-user.' . $this->chat->receiver_id,
            'channels_count' => count($channels),
            'channels_array' => array_map(function($channel) {
                return $channel->name;
            }, $channels)
        ]);
        
        return $channels;
    }
    
    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        $eventName = 'NewChatMessage';
        Log::info('Broadcasting event with name: ' . $eventName);
        return $eventName;
    }
    
    /**
     * Get the data to broadcast.
     */
    public function broadcastWith(): array
    {
        $data = [
            'chat' => [
                'id' => $this->chat->id,
                'payment_id' => $this->chat->payment_id,
                'sender_id' => $this->chat->sender_id,
                'receiver_id' => $this->chat->receiver_id,
                'message' => $this->chat->message,
                'created_at' => $this->chat->created_at,
                'sender' => $this->chat->sender ? [
                    'id' => $this->chat->sender->id,
                    'name' => $this->chat->sender->name
                ] : null
            ]
        ];
        
        Log::info('Broadcasting data:', [
            'chat_id' => $this->chat->id,
            'message' => $this->chat->message,
            'sender_id' => $this->chat->sender_id,
            'receiver_id' => $this->chat->receiver_id,
            'data_size' => strlen(json_encode($data)),
            'sender_loaded' => $this->chat->relationLoaded('sender')
        ]);
        
        return $data;
    }
    
    /**
     * Determine if this event should broadcast.
     */
    public function shouldBroadcast(): bool
    {
        $shouldBroadcast = config('broadcasting.default') !== 'null';
        
        Log::info('Should broadcast check:', [
            'should_broadcast' => $shouldBroadcast,
            'broadcast_driver' => config('broadcasting.default'),
            'chat_id' => $this->chat->id
        ]);
        
        return $shouldBroadcast;
    }
}