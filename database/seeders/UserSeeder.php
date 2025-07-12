    <?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'doketrsalman',
            'email' => 'dokter@a.com',
            'role' => 'dokter',
            'password' => Hash::make('123'),
            'image' => 'admin.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@a.com',
            'role' => 'admin',
            'password' => Hash::make('123'),
            'image' => 'admin.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'samsul',
            'email' => 'user@a.com',
            'role' => 'user',
            'password' => Hash::make('123'),
            'image' => 'user.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // Bisa tambahkan lebih banyak user dummy di sini
    }
}
