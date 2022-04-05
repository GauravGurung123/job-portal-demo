<?php

namespace Database\Factories;

use App\Models\Industry;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * jobseeker
     *
     * @return void
     */

    public function location()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => $this->faker->city(),
                'slug' => $this->faker->slug(),
            ];
        });
    }

    public function jobseeker()
    {
        return $this->state(function (array $attributes) {

            return [
                'role_id' => '2',
                'name' => $this->faker->name(),
                'username' => $this->faker->unique()->userName(),
                'slug' => $this->faker->slug($this->faker->name()),
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

            ];
        });
    }

    /**
     * employer
     *
     * @return void
     */
    public function employer()
    {
        return $this->state(function (array $attributes) {
        
            return [
                'role_id' => '3',
                'location_id' => Location::all()->random()->id,
                'industry_id' => Industry::all()->random()->id,
                'username' => $this->faker->unique()->userName(),
                'org_name' => $this->faker->company(),
                'slug' => $this->faker->slug($this->faker->unique()->userName()),
                'content' => $this->faker->text(),
                'phone_no' => $this->faker->phoneNumber(),
                'website' => $this->faker->safeEmailDomain(),
                'status' => $this->faker->randomElement(['Active', 'Blocked']),
                'social_links' => $this->faker->url(),
                'email' => $this->faker->unique()->companyEmail(),
                'email_verified_at' => now(),
                'password' => $this->faker->sha256('password'),
                // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'profile_photo_path' => $this->faker->imageUrl(400, 240),
            ];
        });
    }
}
