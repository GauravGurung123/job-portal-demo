<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $skills = [
        //     ['name' => 'php', 'slug' => 'php'],
        //     ['name' => 'laravel', 'slug' => 'laravel'],
        //     ['name' => 'dotnet', 'slug' => 'dotnet'],
        //     ['name' => 'javascript', 'slug' => 'javascript'],
        //     ['name' => 'java', 'slug' => 'java'],
        // ];

        // Skill::insert($skills);        

        Skill::factory(10)->create();

    }
}
