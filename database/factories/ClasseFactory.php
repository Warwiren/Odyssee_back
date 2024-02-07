<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classe>
 */
class ClasseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $className = fake()->unique()->randomElement(['Guerrier', 'Assassin', 'Mage']);

        return [
            'class_name' => $className,
            'health' => 100,
            'skill' => fake()->numberBetween(10, 20),
            'will' => fake()->numberBetween(10, 20),
            'strength' => fake()->numberBetween(10, 20),
            'spell_slot' => fake()->numberBetween(0, 3),
            'class_image' => '',
        ];
    }
}
