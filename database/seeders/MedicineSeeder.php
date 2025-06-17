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
                'nama' => 'Amoxicilin',
                'harga' => 15000,
                'deskripsi' => 'Antibiotik untuk infeksi bakteri.',
                'kategori' => 'Antibiotik',
                'stok' => 50,
                'tanggal_kadaluarsa' => Carbon::now()->addYear(),
                'produsen' => 'PT Kimia Farma',
                'image' => 'Amoxicilin-Antibiotik.jpg',
            ],
            [
                'nama' => 'Formula 44',
                'harga' => 20000,
                'deskripsi' => 'Obat batuk dengan rasa mentol.',
                'kategori' => 'Obat Batuk',
                'stok' => 40,
                'tanggal_kadaluarsa' => Carbon::now()->addMonths(10),
                'produsen' => 'PT Bintang Toedjoe',
                'image' => 'Formula44-Obat batuk.jpg',
            ],
            [
                'nama' => 'Ibuprofen',
                'harga' => 18000,
                'deskripsi' => 'Obat pereda nyeri dan demam.',
                'kategori' => 'Analgetik',
                'stok' => 60,
                'tanggal_kadaluarsa' => Carbon::now()->addYear(),
                'produsen' => 'PT Kalbe Farma',
                'image' => 'Ibuprofen-pereda nyeri.jpg',
            ],
            [
                'nama' => 'Mylanta',
                'harga' => 17000,
                'deskripsi' => 'Antasida untuk mengurangi asam lambung.',
                'kategori' => 'Antasida',
                'stok' => 30,
                'tanggal_kadaluarsa' => Carbon::now()->addMonths(8),
                'produsen' => 'PT Mersifarma',
                'image' => 'Mylanta-Antisida.png',
            ],
            [
                'nama' => 'Naturale Vitamin E',
                'harga' => 25000,
                'deskripsi' => 'Suplemen kesehatan kulit dan antioksidan.',
                'kategori' => 'Vitamin',
                'stok' => 70,
                'tanggal_kadaluarsa' => Carbon::now()->addYear(),
                'produsen' => 'PT Soho Global Health',
                'image' => 'Naturale Vitamin E.jpg',
            ],
            [
                'nama' => 'Paracetamol',
                'harga' => 12000,
                'deskripsi' => 'Obat penurun demam dan pereda nyeri.',
                'kategori' => 'Analgetik',
                'stok' => 100,
                'tanggal_kadaluarsa' => Carbon::now()->addMonths(12),
                'produsen' => 'PT Sanbe Farma',
                'image' => 'Paracetamol-Analgetik.jpg',
            ],
            [
                'nama' => 'Vitamin C',
                'harga' => 10000,
                'deskripsi' => 'Meningkatkan daya tahan tubuh.',
                'kategori' => 'Vitamin',
                'stok' => 90,
                'tanggal_kadaluarsa' => Carbon::now()->addMonths(9),
                'produsen' => 'PT Kimia Farma',
                'image' => 'Vitamin C.jpg',
            ],
            [
                'nama' => 'Vitamin D',
                'harga' => 12000,
                'deskripsi' => 'Mendukung kesehatan tulang dan imunitas.',
                'kategori' => 'Vitamin',
                'stok' => 80,
                'tanggal_kadaluarsa' => Carbon::now()->addMonths(9),
                'produsen' => 'PT Dexa Medica',
                'image' => 'Vitamin D.jpg',
            ],
            [
                'nama' => 'Woods',
                'harga' => 16000,
                'deskripsi' => 'Obat batuk dan antihistamin.',
                'kategori' => 'Antihistamin',
                'stok' => 45,
                'tanggal_kadaluarsa' => Carbon::now()->addMonths(10),
                'produsen' => 'PT Woods Indonesia',
                'image' => 'Woods-Antihistamin.jpg',
            ],
        ];

        DB::table('medicines')->insert($medicines);
    }
}
