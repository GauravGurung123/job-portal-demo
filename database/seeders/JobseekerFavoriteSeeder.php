<?php

namespace Database\Seeders;

use App\Models\JobseekerFavorite;
use Illuminate\Database\Seeder;

class JobseekerFavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobseekerFavorite::factory(10)->create();
    }
}
