<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicines = [
            [
                'nama' => 'Amoxicillin',
                'harga' => 15000,
                'deskripsi' => 'Antibiotic for bacterial infections.',
                'kategori' => 'Antibiotic',
                'stok' => 50,
                'tanggal_kadaluarsa' => Carbon::now()->addYear(),
                'produsen' => 'PT Kimia Farma',
                'image' => 'Amoxicillin-Antibiotic.jpg',
            ],
            [
                'nama' => 'Formula 44',
                'harga' => 20000,
                'deskripsi' => 'Cough medicine with menthol flavor.',
                'kategori' => 'Cough Medicine',
                'stok' => 40,
                'tanggal_kadaluarsa' => Carbon::now()->addMonths(10),
                'produsen' => 'PT Bintang Toedjoe',
                'image' => 'Formula44-Cough.jpg',
            ],
            [
                'nama' => 'Ibuprofen',
                'harga' => 18000,
                'deskripsi' => 'Pain reliever and fever reducer.',
                'kategori' => 'Analgesic',
                'stok' => 60,
                'tanggal_kadaluarsa' => Carbon::now()->addYear(),
                'produsen' => 'PT Kalbe Farma',
                'image' => 'Ibuprofen-PainRelief.jpg',
            ],
            [
                'nama' => 'Mylanta',
                'harga' => 17000,
                'deskripsi' => 'Antacid to reduce stomach acid.',
                'kategori' => 'Antacid',
                'stok' => 30,
                'tanggal_kadaluarsa' => Carbon::now()->addMonths(8),
                'produsen' => 'PT Mersifarma',
                'image' => 'Mylanta-Antacid.png',
            ],
            [
                'nama' => 'Naturale Vitamin E',
                'harga' => 25000,
                'deskripsi' => 'Skin health supplement and antioxidant.',
                'kategori' => 'Vitamin',
                'stok' => 70,
                'tanggal_kadaluarsa' => Carbon::now()->addYear(),
                'produsen' => 'PT Soho Global Health',
                'image' => 'Naturale Vitamin E.jpg',
            ],
            [
                'nama' => 'Paracetamol',
                'harga' => 12000,
                'deskripsi' => 'Fever reducer and pain reliever.',
                'kategori' => 'Analgesic',
                'stok' => 100,
                'tanggal_kadaluarsa' => Carbon::now()->addMonths(12),
                'produsen' => 'PT Sanbe Farma',
                'image' => 'Paracetamol-Analgesic.jpg',
            ],
            [
                'nama' => 'Vitamin C',
                'harga' => 10000,
                'deskripsi' => 'Boosts the immune system.',
                'kategori' => 'Vitamin',
                'stok' => 90,
                'tanggal_kadaluarsa' => Carbon::now()->addMonths(9),
                'produsen' => 'PT Kimia Farma',
                'image' => 'Vitamin C.jpg',
            ],
            [
                'nama' => 'Vitamin D',
                'harga' => 12000,
                'deskripsi' => 'Supports bone health and immunity.',
                'kategori' => 'Vitamin',
                'stok' => 80,
                'tanggal_kadaluarsa' => Carbon::now()->addMonths(9),
                'produsen' => 'PT Dexa Medica',
                'image' => 'Vitamin D.jpg',
            ],
            [
                'nama' => 'Woods',
                'harga' => 16000,
                'deskripsi' => 'Cough and antihistamine medicine.',
                'kategori' => 'Antihistamine',
                'stok' => 45,
                'tanggal_kadaluarsa' => Carbon::now()->addMonths(10),
                'produsen' => 'PT Woods Indonesia',
                'image' => 'Woods-Antihistamine.jpg',
            ],
        ];

        DB::table('medicines')->insert($medicines);
    }
}
