<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pharmacy;
use App\Models\Medicine;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some sample pharmacies
        $pharmacies = [
            [
                'name' => 'HealthyLife Pharmacy',
                'address' => '123 Wellness Street, Jakarta',
                'phone' => '02112345678',
                'whatsapp' => '6281234567890',
                'operating_hours' => 'Monday - Sunday, 08:00 - 22:00',
                'latitude' => -6.20000000,
                'longitude' => 106.81666600,
                'description' => '24/7 pharmacy with professional consultations.',
                'image' => 'pharmacy1.jpg',
                'facilities' => json_encode(['24h', 'consultation', 'parking']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MediPlus Pharmacy',
                'address' => '456 Health Avenue, Bandung',
                'phone' => '02298765432',
                'whatsapp' => '6285678901234',
                'operating_hours' => 'Monday - Saturday, 09:00 - 21:00',
                'latitude' => -6.91474400,
                'longitude' => 107.60981000,
                'description' => 'Reliable pharmacy for daily medical needs.',
                'image' => 'pharmacy2.jpg',
                'facilities' => json_encode(['consultation', 'delivery']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($pharmacies as $pharmacyData) {
            $pharmacy = Pharmacy::create($pharmacyData);

            // Attach some medicines with pivot data if available
            $medicines = Medicine::inRandomOrder()->take(3)->get();

            foreach ($medicines as $medicine) {
                $pharmacy->medicines()->attach($medicine->id, [
                    'is_available' => true,
                    'stock' => rand(10, 100),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
