<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'nama' => 'Iuni Spa Day',
                'deskripsi' => 'Hari relaksasi penuh diskon di Iuni Spa.',
                'tanggal' => '2025-05-01',
                'harga' => 100000,
                'alamat' => 'Jl. Mawar No. 10, Yogyakarta',
                'noHP' => '081111111111',
                'image' => 'event1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ladies Night Relaxation',
                'deskripsi' => 'Paket spa malam khusus wanita.',
                'tanggal' => '2025-05-05',
                'harga' => 85000,
                'alamat' => 'Jl. Melati No. 7, Bantul',
                'noHP' => '082222222222',
                'image' => 'event2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Couple Spa Promo',
                'deskripsi' => 'Datang berdua, bayar satu!',
                'tanggal' => '2025-05-10',
                'harga' => 150000,
                'alamat' => 'Jl. Anggrek No. 3, Sleman',
                'noHP' => '083333333333',
                'image' => 'event3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Family Spa Weekend',
                'deskripsi' => 'Paket spesial akhir pekan untuk keluarga.',
                'tanggal' => '2025-05-12',
                'harga' => 200000,
                'alamat' => 'Jl. Flamboyan No. 8, Yogyakarta',
                'noHP' => '084444444444',
                'image' => 'event4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Mother’s Day Special',
                'deskripsi' => 'Hadiah spesial untuk ibu tercinta.',
                'tanggal' => '2025-05-15',
                'harga' => 120000,
                'alamat' => 'Jl. Dahlia No. 5, Yogyakarta',
                'noHP' => '085555555555',
                'image' => 'event5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
