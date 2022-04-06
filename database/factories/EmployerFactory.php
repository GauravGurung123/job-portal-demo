<?php

namespace Database\Factories;

use App\Models\Industry;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    
        return [
            'role_id' => 3,
            'location_id' => Location::all()->random()->id,
            'industry_id' => Industry::all()->random()->id,
            'username' => $this->faker->unique()->userName(),
            'org_name' => $this->faker->company(),
            'slug' => $this->faker->slug(),
            'content' => $this->faker->text(),
            'phone_no' => $this->faker->phoneNumber(),
            'website' => $this->faker->safeEmailDomain(),
            'status' => $this->faker->randomElement(['Active', 'Blocked']),
            'social_links' => $this->faker->url(),
            'email' => $this->faker->unique()->companyEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'profile_photo_path' => $this->faker->imageUrl(400, 240),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = '2022-5-27', $timezone = 'Asia/Kathmandu'),
            'updated_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = '2022-5-27', $timezone = 'Asia/Kathmandu'),
 
        ];
    }
}
