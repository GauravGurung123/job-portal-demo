<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Jobseeker;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jobseeker_id' => Jobseeker::all()->random()->id,
            'job_id' => Job::all()->random()->id,
            'cv_path' => $this->faker->url(),
            'status' => $this->faker->randomElement(['Pending', 'Shortlisted', 'Rejected', 'Blocked']),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = '2022-5-27', $timezone = 'Asia/Kathmandu'),
            'updated_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = '2022-5-27', $timezone = 'Asia/Kathmandu'),
            
        ];
    }
}
