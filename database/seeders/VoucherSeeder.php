<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vouchers = [
            [
                'image' => 'image/voucher/voucher1.jpg',
                'description' => '35% discount for doctor consultation services.',
                'discount_percentage' => 35,
                'usage_count' => 0,
                'usage_limit' => 50,
                'is_used' => false,
                'expired_at' => Carbon::now()->addDays(30),
                'code' => Str::upper(Str::random(8)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'image/voucher/voucher2.jpg',
                'description' => '80% discount on wellness package purchases.',
                'discount_percentage' => 80,
                'usage_count' => 0,
                'usage_limit' => 30,
                'is_used' => false,
                'expired_at' => Carbon::now()->addDays(45),
                'code' => Str::upper(Str::random(8)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'image/voucher/voucher3.jpg',
                'description' => '50% discount on health tourism services.',
                'discount_percentage' => 50,
                'usage_count' => 0,
                'usage_limit' => 20,
                'is_used' => false,
                'expired_at' => Carbon::now()->addDays(60),
                'code' => Str::upper(Str::random(8)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'image/voucher/voucher4.jpg',
                'description' => '50% discount on health tourism services.',
                'discount_percentage' => 50,
                'usage_count' => 0,
                'usage_limit' => 20,
                'is_used' => false,
                'expired_at' => Carbon::now()->addDays(60),
                'code' => Str::upper(Str::random(8)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'image/voucher/voucher5.jpg',
                'description' => '20% discount on health tourism services.',
                'discount_percentage' => 20,
                'usage_count' => 0,
                'usage_limit' => 20,
                'is_used' => false,
                'expired_at' => Carbon::now()->addDays(60),
                'code' => Str::upper(Str::random(8)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('vouchers')->insert($vouchers);
    }
}
