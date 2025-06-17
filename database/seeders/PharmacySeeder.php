<?php

namespace Database\Seeders;

use App\Models\Pharmacy;
use App\Models\Medicine;
use Illuminate\Database\Seeder;

class PharmacySeeder extends Seeder
{
    public function run(): void
    {
        $pharmacies = [
            [
                'name' => 'UNISA SAMSUL',
                'address' => '123 Main Street, Yogyakarta',
                'phone' => '+6282371358824',
                'whatsapp' => '082371358824',
                'latitude' => -7.76798194779174, 
                'longitude' => 110.3337795196476,
                'description' => 'A complete pharmacy with 24/7 service.',
                'facilities' => ['parking', '24_hour', 'consultation', 'online_payment'],
                'operating_hours' => [
                    'monday'    => ['is_open' => true, 'open' => '08:00', 'close' => '15:00'],
                    'tuesday'   => ['is_open' => true, 'open' => '08:00', 'close' => '22:00'],
                    'wednesday' => ['is_open' => true, 'open' => '08:00', 'close' => '22:00'],
                    'thursday'  => ['is_open' => true, 'open' => '08:00', 'close' => '22:00'],
                    'friday'    => ['is_open' => true, 'open' => '08:00', 'close' => '22:00'],
                    'saturday'  => ['is_open' => true, 'open' => '08:00', 'close' => '20:00'],
                    'sunday'    => ['is_open' => false],
                ],
                'image' => 'Vitamin C.jpg',
                'is_active' => true,
            ],
            // Add more pharmacies here if needed
        ];

        foreach ($pharmacies as $pharmacyData) {
            $pharmacy = Pharmacy::create($pharmacyData);

            // Attach medicines with pivot data
            $allMedicines = Medicine::all();

            foreach ($allMedicines as $medicine) {
                $pharmacy->medicines()->attach($medicine->id_medicine, [
                    'stock' => rand(10, 100),
                    'price' => $medicine->harga + rand(-3000, 3000),
                    'is_available' => true,
                    'notes' => 'Available in limited quantity.'
                ]);
            }
        }
    }
}
