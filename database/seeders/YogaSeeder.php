<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YogaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('yogas')->insert([
            [
                'nama' => 'Sunrise Yoga Center',
                'harga' => 50000,
                'alamat' => 'Jl. Merapi No. 1, Sleman',
                'noHP' => '081111111111',
                'waktuBuka' => json_encode([
                    'senin' => '06:00 - 08:00',
                    'rabu' => '06:00 - 08:00',
                    'jumat' => '06:00 - 08:00'
                ]),
                'image' => 'yoga1.jpg',
                'maps' => 'https://goo.gl/maps/yoga1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Evening Zen Yoga',
                'harga' => 60000,
                'alamat' => 'Jl. Merbabu No. 5, Yogyakarta',
                'noHP' => '082222222222',
                'waktuBuka' => json_encode([
                    'selasa' => '18:00 - 20:00',
                    'kamis' => '18:00 - 20:00',
                    'sabtu' => '18:00 - 20:00'
                ]),
                'image' => 'yoga2.jpg',
                'maps' => 'https://goo.gl/maps/yoga2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Yoga for Moms',
                'harga' => 75000,
                'alamat' => 'Jl. Kemuning No. 7, Bantul',
                'noHP' => '083333333333',
                'waktuBuka' => json_encode([
                    'senin' => '10:00 - 12:00',
                    'kamis' => '10:00 - 12:00'
                ]),
                'image' => 'yoga3.jpg',
                'maps' => 'https://goo.gl/maps/yoga3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Power Yoga Studio',
                'harga' => 80000,
                'alamat' => 'Jl. Flamboyan No. 9, Yogyakarta',
                'noHP' => '084444444444',
                'waktuBuka' => json_encode([
                    'setiap hari' => '17:00 - 19:00'
                ]),
                'image' => 'yoga4.jpg',
                'maps' => 'https://goo.gl/maps/yoga4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Prenatal Yoga Center',
                'harga' => 90000,
                'alamat' => 'Jl. Dahlia No. 3, Sleman',
                'noHP' => '085555555555',
                'waktuBuka' => json_encode([
                    'senin' => '09:00 - 11:00',
                    'rabu' => '09:00 - 11:00',
                    'jumat' => '09:00 - 11:00'
                ]),
                'image' => 'yoga5.jpg',
                'maps' => 'https://goo.gl/maps/yoga5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
