<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Employer;
use App\Models\Jobseeker;
use Illuminate\Database\Seeder;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::findOrFail(1)->roles()->sync(1);
        for ($i=1; $i < 11; $i++) { 
            Employer::findOrFail($i)->roles()->sync(2);
            Jobseeker::findOrFail($i)->roles()->sync(3);
        }
    }
}
