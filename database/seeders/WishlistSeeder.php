<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wishlists')->insert([
            [
                'photographer_id' => 1,
                'user_id' => 2,
            ],
            [
                'photographer_id' => 2,
                'user_id' => 2,
            ],
        ]);
    }
}
