<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PhotographerSeeder extends Seeder
{
 public function run(): void
    {
        $photographers = [
            [
                'name' => 'Cecilia Bright',
                'phone' => '081234567898765',
                'email' => 'cecilia@gmail.com',
                'password' => 'photographer',
                'profile_photo' => '',
                'location' => 'Jakarta',
                'start_rate' => 100000,
                'description' => 'Hey, I’m Cecilia Bright — I shoot love stories...',
                'status' => '1',
            ],
            [
                'name' => 'Nutnut',
                'phone' => '081234567898765',
                'email' => 'nutnut@gmail.com',
                'password' => 'photographer',
                'profile_photo' => '',
                'location' => 'Bali',
                'start_rate' => 168000,
                'description' => 'Hey, I’m Nutty — I shoot love stories...',
                'status' => '1',
            ],
        ];

        foreach ($photographers as $p) {

            // 1️⃣ Insert ke tabel USERS dulu
            $userId = DB::table('users')->insertGetId([
                'name' => $p['name'],
                'phone' => $p['phone'],
                'email' => $p['email'],
                'password' => Hash::make($p['password']),
                'role' => '2', // PENTING
            ]);

            // 2️⃣ Insert ke tabel PHOTOGRAPHERS (ambil user_id dari insert sebelumnya)
            DB::table('photographers')->insert([
                'user_id' => $userId,
                'profile_photo' => $p['profile_photo'],
                'location' => $p['location'],
                'start_rate' => $p['start_rate'],
                'description' => $p['description'],
                'status' => $p['status'],
                'verified_by_admin' => '1',
            ]);
        }
    }
}
