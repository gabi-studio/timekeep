<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
            'project_type' => $this->faker->randomElement(['website', 'web app', 'design', 'cms']),
            'status' => $this->faker->randomElement(['active', 'in progress', 'completed', 'not started', 'waiting on']),
            'client' => $this->faker->name(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'estimated_hours' => $this->faker->numberBetween(1, 100),
            'actual_hours' => $this->faker->numberBetween(1, 100),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'link' => $this->faker->url(),
            'image' => $this->faker->imageUrl(),
            'notes' => $this->faker->text(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
