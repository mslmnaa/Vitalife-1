<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Broadcast;
use App\Events\NewChatMessage;
use App\Models\Chat;

class TestBroadcast extends Command
{
    protected $signature = 'test:broadcast {payment_id?}';
    protected $description = 'Test broadcasting functionality';

    public function handle()
    {
        $paymentId = $this->argument('payment_id') ?? 1;
        
        $this->info('Testing broadcast configuration...');
        
        // 1. Cek driver broadcasting
        $driver = config('broadcasting.default');
        $this->info("Broadcasting driver: {$driver}");
        
        if ($driver === 'null') {
            $this->error('Broadcasting driver is set to null! Please check BROADCAST_DRIVER in .env');
            return;
        }
        
        // 2. Test simple broadcast
        $this->info('Testing simple broadcast...');
        try {
            broadcast(new \Illuminate\Broadcasting\PrivateChannel('test'), [
                'message' => 'Test broadcast from command'
            ]);
            $this->info('✅ Simple broadcast successful');
        } catch (\Exception $e) {
            $this->error('❌ Simple broadcast failed: ' . $e->getMessage());
            return;
        }
        
        // 3. Test dengan event yang sebenarnya
        $this->info('Testing NewChatMessage event...');
        try {
            // Buat chat dummy untuk test
            $chat = new Chat([
                'id' => 9999,
                'payment_id' => $paymentId,
                'sender_id' => 1,
                'receiver_id' => 2,
                'message' => 'Test message from command',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            // Set relation dummy
            $chat->setRelation('sender', (object)[
                'id' => 1,
                'name' => 'Test User'
            ]);
            
            broadcast(new NewChatMessage($chat));
            $this->info('✅ NewChatMessage event broadcast successful');
            
        } catch (\Exception $e) {
            $this->error('❌ NewChatMessage event broadcast failed: ' . $e->getMessage());
            $this->error('Error details: ' . $e->getTraceAsString());
        }
        
        // 4. Test konfigurasi Reverb
        $this->info('Testing Reverb configuration...');
        $reverbConfig = config('broadcasting.connections.reverb');
        $this->table(['Config', 'Value'], [
            ['Host', $reverbConfig['options']['host'] ?? 'Not set'],
            ['Port', $reverbConfig['options']['port'] ?? 'Not set'],
            ['Scheme', $reverbConfig['options']['scheme'] ?? 'Not set'],
            ['App ID', $reverbConfig['app_id'] ?? 'Not set'],
            ['Key', $reverbConfig['key'] ? 'Set' : 'Not set'],
            ['Secret', $reverbConfig['secret'] ? 'Set' : 'Not set'],
        ]);
        
        $this->info('Test completed!');
    }
}