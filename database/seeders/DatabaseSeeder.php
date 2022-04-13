<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        // DB::table('admins')->truncate();
        // DB::table('jobseekers')->truncate();
        // DB::table('employers')->truncate();
        // DB::table('locations')->truncate();
        // DB::table('skills')->truncate();
        // DB::table('industries')->truncate();
        // DB::table('roles')->truncate();
        // DB::table('permissions')->truncate();
        // DB::table('role_has_permissions')->truncate();
        // DB::table('model_has_roles')->truncate();
        // DB::table('model_has_permissions')->truncate();
        
        $this->call(
            [
                IndustrySeeder::class,
                LocationSeeder::class,
                SkillSeeder::class,
                AdminSeeder::class,
                JobseekerSeeder::class,
                EmployerSeeder::class,
                JobSeeder::class,
                JobApplicationSeeder::class,
                JobseekerFavoriteSeeder::class,
                ResumeSeeder::class,
                PermissionSeeder::class,
                ModelHasRoleSeeder::class,
                ModelHasPermissionSeeder::class,
            ]
            );
    }

}
