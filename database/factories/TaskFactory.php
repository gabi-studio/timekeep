<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            //
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'project_id' => $this->faker->numberBetween(1, 10),
            'timekeeper_id' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['active', 'in progress', 'completed', 'not started', 'waiting on']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'date' => $this->faker->date(),
            'time_spent' => $this->faker->numberBetween(1, 8),
            'notes' => $this->faker->text(),
            'link' => $this->faker->url(),
            'created_at' => now(),
            'updated_at' => now(),
            
        ];
    }
}
