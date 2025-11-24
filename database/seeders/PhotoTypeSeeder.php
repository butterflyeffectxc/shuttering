<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('photo_types')->insert([
            [
                'name' => 'Graduation',
                'description' => 'yes',
            ],
            [
                'name' => 'Event',
                'description' => "",
            ],
            [
                'name' => 'Lifestyle',
                'description' => '',
            ],
            [
                'name' => 'Nature',
                'description' => '',
            ],
        ]);
    }
}
