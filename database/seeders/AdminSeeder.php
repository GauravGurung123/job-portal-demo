<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'email' => 'superadmin@superadmin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                // 'token' => Str::random(64),
                'status' => 'Active',
            ],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                // 'token' => Str::random(64),
                'status' => 'Active',
            ],
            [
                'name' => 'Bob',
                'username' => 'bobtest',
                'email' => 'bob@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                // 'token' => Str::random(64),
                'status' => 'Active',
            ],
            [
                'name' => 'Lisa',
                'username' => 'lisatest',
                'email' => 'lisa@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                // 'token' => Str::random(64),
                'status' => 'Active',
            ],
    ]);
        $this->command->info('Inserted '.count(Admin::all()).' admin records.');
    }
}
