<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                // RoleSeeder::class,
                // IndustrySeeder::class,
                // LocationSeeder::class,
                // SkillSeeder::class,
                AdminSeeder::class,
                // JobseekerSeeder::class,
                // EmployerSeeder::class,
                // Jobseeder::class,
                // JobApplicationSeeder::class,
                // JobseekerFavoriteSeeder::class,
                // ResumeSeeder::class,
            ]
            );
    }
}
