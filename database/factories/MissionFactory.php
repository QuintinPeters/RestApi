<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mission>
 */
class MissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mission_description' => $this->faker->sentence(),   
            'progression' => $this->faker->numberBetween(1,100),   
            'stage' => $this->faker->numberBetween(1,3), 
            'mission_img' => $this->faker->url(),
            'user_id' => User::factory()
             ];
    }
}
