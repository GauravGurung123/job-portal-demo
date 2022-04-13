<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $models = ['App\Models\Jobseeker', 'App\Models\Employer'];

        return [
            'skillable_id' => rand(1,20),
            'skillable_type' => $models[rand(0,1)],
            'name' => $this->faker->word(),
            'slug' => $this->faker->word(),
        ];
    }
}
