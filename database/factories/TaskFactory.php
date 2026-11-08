<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->sentence(),
            'status' => fake()->randomElement(['new', 'in_progress', 'done']),
            'project_id' => Project::factory(),
            'author_id' => User::factory(),
            'assigned_to' => User::factory(),
            'due_date' => fake()->dateTimeBetween('now', '+1 month'),
        ];
    }
}
