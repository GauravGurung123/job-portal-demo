<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = [
            ['name' => 'software', 'slug' => 'software'],
            ['name' => 'isp', 'slug' => 'isp'],
            ['name' => 'telecom', 'slug' => 'telecom'],
            ['name' => 'bank', 'slug' => 'bank'],
            ['name' => 'education', 'slug' => 'education'],
        ];

        Industry::insert($industries);
    }
}