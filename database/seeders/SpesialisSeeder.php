<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spesialis')->insert([
            // [
            //     'nama' => 'dr salman',
            //     'harga' => 150000,
            //     'spesialisasi' => 'Spesialis Kulit',
            //     'tempatTugas' => 'Klinik Iuni Derma',
            //     'alamat' => 'Jl. Kenanga No. 12, Yogyakarta',
            //     'noHP' => '082371358824',
            //     'image' => 'spesialis1.jpg',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            [
                'nama' => 'dr samsul',
                'harga' => 170000,
                'spesialisasi' => 'Spesialis Kandungan',
                'tempatTugas' => 'RSIA Sehat Bahagia',
                'alamat' => 'Jl. Melati No. 3, D.I Yogyakarta',
                'noHP' => '087742290995',
                'image' => 'spesialis2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'dr. Budi Raharjo',
                'harga' => 130000,
                'spesialisasi' => 'Spesialis Gizi',
                'tempatTugas' => 'Klinik Nutrisi Ceria',
                'alamat' => 'Jl. Anggrek No. 7, Sleman',
                'noHP' => '083333333333',
                'image' => 'spesialis3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'dr. Sari Wahyuni',
                'harga' => 200000,
                'spesialisasi' => 'Spesialis Saraf',
                'tempatTugas' => 'RS Mitra Sehat',
                'alamat' => 'Jl. Flamboyan No. 9, Yogyakarta',
                'noHP' => '084444444444',
                'image' => 'spesialis4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'dr. Hendra Wijaya',
                'harga' => 160000,
                'spesialisasi' => 'Spesialis Psikiatri',
                'tempatTugas' => 'Klinik Jiwa Harmoni',
                'alamat' => 'Jl. Dahlia No. 6, Yogyakarta',
                'noHP' => '085555555555',
                'image' => 'spesialis5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
