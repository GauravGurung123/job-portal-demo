<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employer_id' => Employer::all()->random()->id,
            'skill_id' => Skill::all()->random()->id,
            'title' => $this->faker->unique()->jobTitle(),
            'application_email' => $this->faker->unique()->companyEmail(),
            'application_url' => $this->faker->url(),
            'job_type' => $this->faker->randomElement(['Fulltime', 'Parttime', 'Internship', 'Others']),
            'description' => $this->faker->text(),
            'responsibility' => $this->faker->text(),
            'requirement' => $this->faker->text(),
            'experience' => $this->faker->text(),
            'min_salary' => $this->faker->numberBetween(10000, 30000),
            'max_salary' => $this->faker->numberBetween(30000, 5000000),
            'status' => $this->faker->randomElement(['Active', 'Pending', 'Rejected', 'Expired']),
            'featured' => rand(0, 1),
            'top_job' => rand(0, 1),
            'last_date' => $this->faker->date('Y-m-d', '2022-5-27'),
            'views' => $this->faker->numberBetween(1,10),
            'openings' => $this->faker->numberBetween(1,10),
            'slug' => $this->faker->slug(),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = '2022-5-27', $timezone = 'Asia/Kathmandu'),
            'updated_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = '2022-5-27', $timezone = 'Asia/Kathmandu'),
        ];
    }
}
