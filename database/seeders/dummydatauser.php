<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class dummydatauser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat user biasa
        $userId = DB::table('users')->insertGetId([
            'name' => 'John Doe',
            'email' => 'user@test.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // 2. Buat akun dokter
        $dokterId = DB::table('users')->insertGetId([
            'name' => 'Dr. Ahmad',
            'email' => 'alfarizim168@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // 3. Buat data spesialis
        $spesialisId = DB::table('spesialis')->insertGetId([
            'nama' => 'Dr. Ahmad',
            'harga' => 200000,
            'spesialisasi' => 'Penyakit Dalam',
            'tempatTugas' => 'RS Sardjito',
            'alamat' => 'Yogyakarta',
            'noHP' => '08123456789',
            'image' => 'dokter.jpg',
            'user_id' => $dokterId,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // 4. Buat pembayaran confirmed
        DB::table('payments')->insert([
            'user_id' => $userId,
            'specialist_id' => $spesialisId,
            'full_name' => 'John Doe',
            'gender' => 'Laki-laki',
            'date_of_birth' => '1990-01-01',
            'phone_number' => '08123456789',
            'address' => 'Jakarta',
            'complaints' => 'Demam dan batuk',
            'amount' => 200000,
            'total_amount' => 200000,
            'status' => 'confirmed',
            'payment_date' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

       
    }
}