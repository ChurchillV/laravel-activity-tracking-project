<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activty>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['Done', 'Pending'];

        return [
            'name' => fake()->sentence(),
            'status' => $statuses[array_rand($statuses)],
            'created_by' => User::inRandomOrder()->first()->id,
        ];
    }
}
