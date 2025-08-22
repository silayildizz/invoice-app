<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $password = env('ADMIN_SEED_PASSWORD', 'ChangeMe123!'); // .env den al

        for ($i = 1; $i <= 10; $i++) {
            // Aynı email varsa şifreyi güncelle yoksa oluştur
            User::updateOrCreate(
                ['email' => "admin{$i}@example.com"],
                [
                    'name' => fake()->name(),
                    'password' => Hash::make($password),
                ]
            );
        }
    }
}
