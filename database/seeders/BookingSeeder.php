<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            [
                'user_id' => 2,
                'photographer_id' => 1,
                'session_date' => '2024-08-10',
                'session_duration' => '01:30:00',
                'session_location' => 'Jakarta',
                'total_price' => 2000,
                'photo_type_id' => 1,
                'notes' => '',
                'status' => 'pending',
            ],
            [
                'user_id' => 2,
                'photographer_id' => 2,
                'session_date' => '2024-08-10',
                'session_duration' => '02:00:00',
                'session_location' => 'Surabaya Center',
                'total_price' => 2000,
                'photo_type_id' => 1,
                'notes' => '',
                'status' => 'completed',
            ],
            [
                'user_id' => 3,
                'photographer_id' => 2,
                'session_date' => '2024-08-10',
                'session_duration' => '02:00:00',
                'session_location' => 'Bali Sunset Pier',
                'total_price' => 2000,
                'photo_type_id' => 1,
                'notes' => '',
                'status' => 'pending',
            ],
        ]);
    }
}
