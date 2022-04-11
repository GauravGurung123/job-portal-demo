<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class ModelHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 36; $i++) { 
            Admin::findOrFail(1)->permissions()->attach($i);
            // Employer::findOrFail($i)->roles()->sync(2);
            // Jobseeker::findOrFail($i)->roles()->sync(3);
        }
    }
}
