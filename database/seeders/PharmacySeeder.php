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
                'name' => 'Apotek K-24 Jalan Godean Sleman',
                'address' => 'Godean Street, Kajor Road No. Km. 4, RT 03 / RW 01, Kwarasan, Nogotirto Village, Gamping District, Sleman Regency, Special Region of Yogyakarta 55599',
                'phone' => '+6282371358824',
                'whatsapp' => '082371358824',
                'latitude' => -7.780303954894002,
                'longitude' => 110.3453881763706,
                'description' => 'Campus pharmacy with consultation services.',
                'facilities' => ['parking', 'consultation', 'bpjs'],
                'operating_hours' => [
                    'monday' => ['is_open' => true, 'open' => '08:00', 'close' => '15:00'],
                    'tuesday' => ['is_open' => true, 'open' => '08:00', 'close' => '22:00'],
                    'wednesday' => ['is_open' => true, 'open' => '08:00', 'close' => '22:00'],
                    'thursday' => ['is_open' => true, 'open' => '08:00', 'close' => '22:00'],
                    'friday' => ['is_open' => true, 'open' => '08:00', 'close' => '22:00'],
                    'saturday' => ['is_open' => true, 'open' => '08:00', 'close' => '20:00'],
                    'sunday' => ['is_open' => false],
                ],
                'image' => 'image/apotek/apotek13.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Apotek Kimia Farma Godean',
                'address' => 'Ngapak - Kentheng Street No. 23, KM 5, Modinan, Banyuraden Village, Gamping District, Sleman Regency, Special Region of Yogyakarta 55293',
                'phone' => '+6281234567890',
                'whatsapp' => '081234567890',
                'latitude' => -7.778489012354131,
                'longitude' => 110.33742372360943,
                'description' => '24-hour pharmacy with digital payment.',
                'facilities' => ['24_hour', 'online_payment', 'delivery'],
                'operating_hours' => [
                    'monday' => ['is_open' => true, 'open' => '00:00', 'close' => '23:59'],
                    'tuesday' => ['is_open' => true, 'open' => '00:00', 'close' => '23:59'],
                    'wednesday' => ['is_open' => true, 'open' => '00:00', 'close' => '23:59'],
                    'thursday' => ['is_open' => true, 'open' => '00:00', 'close' => '23:59'],
                    'friday' => ['is_open' => true, 'open' => '00:00', 'close' => '23:59'],
                    'saturday' => ['is_open' => true, 'open' => '00:00', 'close' => '23:59'],
                    'sunday' => ['is_open' => true, 'open' => '00:00', 'close' => '23:59'],
                ],
                'image' => 'image/apotek/apotek12.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Apotek K-24 Jl. Magelang Yogyakarta',
                'address' => 'Magelang Street No.160–162, Kricak, Karangwaru, Tegalrejo District, Yogyakarta City, Special Region of Yogyakarta 55241, Indonesia',
                'phone' => '+6289876543210',
                'whatsapp' => '089876543210',
                'latitude' => -7.774088761490025,
                'longitude' => 110.3613235113407,
                'description' => 'Pharmacy with drive-thru and doctor consultation.',
                'facilities' => ['drive_thru', 'consultation', 'online_payment'],
                'operating_hours' => [
                    'monday' => ['is_open' => true, 'open' => '07:00', 'close' => '22:00'],
                    'tuesday' => ['is_open' => true, 'open' => '07:00', 'close' => '22:00'],
                    'wednesday' => ['is_open' => true, 'open' => '07:00', 'close' => '22:00'],
                    'thursday' => ['is_open' => true, 'open' => '07:00', 'close' => '22:00'],
                    'friday' => ['is_open' => true, 'open' => '07:00', 'close' => '22:00'],
                    'saturday' => ['is_open' => true, 'open' => '08:00', 'close' => '21:00'],
                    'sunday' => ['is_open' => false],
                ],
                'image' => 'image/apotek/apotek17.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'APOTEK PHARM 24 GODEAN',
                'address' => 'Ngapak - Kentheng Street No.5 KM 4, Rice Field Area, Banyuraden, Gamping District, Sleman Regency, Special Region of Yogyakarta 55293, Indonesia',
                'phone' => '+6282233445566',
                'whatsapp' => '082233445566',
                'latitude' => -7.779409328962561,
                'longitude' => 110.34145101747507,
                'description' => 'Serving hospital prescriptions and health consultations.',
                'facilities' => ['parking', 'bpjs', 'consultation'],
                'operating_hours' => [
                    'monday' => ['is_open' => true, 'open' => '09:00', 'close' => '20:00'],
                    'tuesday' => ['is_open' => true, 'open' => '09:00', 'close' => '20:00'],
                    'wednesday' => ['is_open' => true, 'open' => '09:00', 'close' => '20:00'],
                    'thursday' => ['is_open' => true, 'open' => '09:00', 'close' => '20:00'],
                    'friday' => ['is_open' => true, 'open' => '09:00', 'close' => '20:00'],
                    'saturday' => ['is_open' => false],
                    'sunday' => ['is_open' => false],
                ],
                'image' => 'image/apotek/apotek16.jpeg',
                'is_active' => true,
            ],
            [
                'name' => 'Apotek XP',
                'address' => 'HOS Cokroaminoto Street No.90, Tegalrejo, Tegalrejo District, Yogyakarta City, Special Region of Yogyakarta 55253, Indonesia',
                'phone' => '+6281999988877',
                'whatsapp' => '081999988877',
                'latitude' => -7.793383569239803,
                'longitude' => 110.35348128128086,
                'description' => 'Family pharmacy with fast service.',
                'facilities' => ['parking', 'delivery', 'bpjs'],
                'operating_hours' => [
                    'monday' => ['is_open' => true, 'open' => '08:00', 'close' => '21:00'],
                    'tuesday' => ['is_open' => true, 'open' => '08:00', 'close' => '21:00'],
                    'wednesday' => ['is_open' => true, 'open' => '08:00', 'close' => '21:00'],
                    'thursday' => ['is_open' => true, 'open' => '08:00', 'close' => '21:00'],
                    'friday' => ['is_open' => true, 'open' => '08:00', 'close' => '21:00'],
                    'saturday' => ['is_open' => true, 'open' => '09:00', 'close' => '18:00'],
                    'sunday' => ['is_open' => false],
                ],
                'image' => 'image/apotek/apotek15.jpg',
                'is_active' => true,
            ],
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
                    'notes' => 'Available in limited quantity.',
                ]);
            }
        }
    }
}
