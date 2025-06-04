<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['To do', 'Done', 'In Progress'];

        return [
            'title' => fake()->text(20),
            'content' => fake()->realText(90),
            'status' => $statuses[array_rand($statuses)],
            'created_by' => User::inRandomOrder()->first()->id,
        ];
    }
}
