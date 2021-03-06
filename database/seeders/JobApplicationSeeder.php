<?php

namespace Database\Seeders;

use App\Models\JobApplication;
use Illuminate\Database\Seeder;

class JobApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobApplication::factory(20)->create();
        $this->command->info('Inserted '.count(JobApplication::all()).' job application records.');
    
    }
}
