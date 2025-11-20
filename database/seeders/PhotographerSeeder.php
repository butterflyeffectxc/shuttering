<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PhotographerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('photographers')->insert([
            [
                'name' => 'Cecilia Bright',
                'phone' => '081234567898765',
                'email' => 'cecilia@gmail.com',
                'password' => Hash::make('photgrapher'),
                'location' => 'Jakarta',
                // 'role' => '2',
                'start_rate' => '100000',
                'description' => 'Hey, I’m Cecilia Bright — I shoot love stories, candid smiles, and those in-between moments that make everything feel real.',
                'status' => '1',
            ],
            [
                'name' => 'Nutnut',
                'phone' => '081234567898765',
                'email' => 'nutnut@gmail.com',
                'password' => Hash::make('photgrapher'),
                'location' => 'Bali',
                // 'role' => '2',
                'start_rate' => '168000',
                'description' => 'Hey, I’m Nutty — I shoot love stories, candid smiles, and those in-between moments that make everything feel real.',
                'status' => '1',
            ],
        ]);
    }
}
