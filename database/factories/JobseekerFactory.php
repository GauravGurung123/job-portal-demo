<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobseekerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'role_id' => 2,
            'name' => $this->faker->name(),
            'username' => $this->faker->unique()->userName(),
            'slug' => $this->faker->slug(),
            'content' => $this->faker->sentence(),
            'phone_no' => $this->faker->phoneNumber(),
            'current_address' => $this->faker->city(),
            'permanent_address' => $this->faker->city(),
            'website' => $this->faker->url(),
            'dob' => $this->faker->date('Y-m-d', 'now'),
            'gender' => $this->faker->randomElement(['male', 'female', 'others']),
            'status' => $this->faker->randomElement(['Active', 'Blocked']),
            'social_links' => $this->faker->url(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => $this->faker->sha256('password'),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'profile_photo_path' => $this->faker->imageUrl(400, 240),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = '2022-5-27', $timezone = 'Asia/Kathmandu'),
            'updated_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = '2022-5-27', $timezone = 'Asia/Kathmandu'),

        ];
    }
}
