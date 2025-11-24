<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotographerPhotoTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('photographer_photo_types')->insert([
            [
                'photographer_id' => 1,
                'photo_type_id' => 1,
            ],
            [
                'photographer_id' => 1,
                'photo_type_id' => 2,
            ],
            [
                'photographer_id' => 2,
                'photo_type_id' => 3,
            ],
        ]);
    }
}
