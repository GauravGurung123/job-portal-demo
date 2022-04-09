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
            ['name' => 'software', 'slug' => 'software', 'created_at' => '2022-09-03 14:16:18'],
            ['name' => 'isp', 'slug' => 'isp', 'created_at' => '2022-01-03 14:16:18'],
            ['name' => 'telecom', 'slug' => 'telecom', 'created_at' => '2021-01-03 14:16:18'],
            ['name' => 'bank', 'slug' => 'bank', 'created_at' => '2022-01-03 14:16:18'],
            ['name' => 'education', 'slug' => 'education', 'created_at' => '2022-05-03 14:16:18'],
        ];

        Industry::insert($industries);
    }
}