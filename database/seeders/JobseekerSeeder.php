<?php

namespace Database\Seeders;

use App\Models\Jobseeker;
use Illuminate\Database\Seeder;

class JobseekerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jobseeker::factory(10)->create();
    }
}
