<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class dummydatadokter extends Seeder
{
    /**
     * Run the database seeds.
     */


public function run()
{
    $dokters = [
        [
            'name' => 'Dr. Syamsu Abduh',
            'email' => 'alfarizim168@gmail.com',
            'spesialisasi' => 'Anatomy',
            'tempatTugas' => 'RS Sardjito',
            'alamat' => 'Yogyakarta',
            'noHP' => '08123456789',
            'image' => 'image/dokter/Dokter1.jpeg',
            'is_online' => false
        ],
        [
            'name' => 'Dr. Dayat',
            'email' => 'siti@example.com',
            'spesialisasi' => 'Primary Care',
            'tempatTugas' => 'RS Bethesda',
            'alamat' => 'Sleman',
            'noHP' => '08234567890',
            'image' => 'image/dokter/dokter2.jpeg',
        ],
        [
            'name' => 'Dr. Budi',
            'email' => 'budi@example.com',
            'spesialisasi' => 'Cardiology',
            'tempatTugas' => 'RS Panti Rapih',
            'alamat' => 'Bantul',
            'noHP' => '08345678901',
            'image' => 'image/dokter/dokter3.jpeg',
        ],
        [
            'name' => 'Dr. Fauzan S.kom',
            'email' => 'lina@example.com',
            'spesialisasi' => 'Pregnancy',
            'tempatTugas' => 'RS PKU Muhammadiyah',
            'alamat' => 'Kulon Progo',
            'noHP' => '08456789012',
            'image' => 'image/dokter/dokter4.jpeg',
        ],
        [
            'name' => 'Dr. Iskandar S.kom',
            'email' => 'yoga@example.com',
            'spesialisasi' => 'Piscologist',
            'tempatTugas' => 'RSUD Wonosari',
            'alamat' => 'Gunung Kidul',
            'noHP' => '08567890123',
            'image' => 'image/dokter/dokter5.jpeg',
        ],
    ];

    foreach ($dokters as $dokter) {
        $dokterId = DB::table('users')->insertGetId([
            'name' => $dokter['name'],
            'email' => $dokter['email'],
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('spesialis')->insert([
            'nama' => $dokter['name'],
            'harga' => 200000,
            'spesialisasi' => $dokter['spesialisasi'],
            'tempatTugas' => $dokter['tempatTugas'],
            'alamat' => $dokter['alamat'],
            'noHP' => $dokter['noHP'],
            'image' => $dokter['image'], // Tidak null
            'user_id' => $dokterId,
            'created_at' => now(),
            'updated_at' => now(),
            'is_online' => $dokter['is_online'] ?? true, // <-- tambahkan ini

        ]);
    }
}

}