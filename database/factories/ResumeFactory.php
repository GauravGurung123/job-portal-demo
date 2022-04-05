<?php

namespace Database\Factories;

use App\Models\Jobseeker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResumeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $degrees = ['SEE/SLC', '+2 in science', '+2 in management', 'BIT', 'BBA', 'MBA', 'MIT'];
        $languages = ['english', 'nepali', 'french', 'mandarin', 'spanish', 'german'];
        return [
            'jobseeker_id' => Jobseeker::all()->random()->id,
            'education' => $degrees[rand(0,6)],
            'training' => $this->faker->realText(200, 2),
            'experience' => $this->faker->realText(300, 2),
            'language' => $languages[rand(0,5)],
            'social_links' => $this->faker->safeEmailDomain(),
            'cv_path' => $this->faker->url(),
        ];
    }
}
