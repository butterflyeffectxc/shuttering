<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Vanesya',
                'phone' => '08978987656765',
                'email' => 'vanesya.a@gmail.com',
                'password' => Hash::make('admin'),
                'role' => '1',
            ],
            [
                'name' => 'Marshanda',
                'phone' => '081234567898765',
                'email' => 'marshanda@gmail.com',
                'password' => Hash::make('user'),
                'role' => '3',
            ],
            [
                'name' => 'Darren',
                'phone' => '081234123898765',
                'email' => 'darrenlie@gmail.com',
                'password' => Hash::make('user'),
                'role' => '3',
            ],
        ]);
    }
}
