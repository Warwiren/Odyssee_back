<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Monster>
 */
class MonsterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $monsterName = fake()->unique()->randomElement(['Gobelin', 'Orc', 'Troll']);

        return [
            'monster_name' => $monsterName,
            'health' => fake()->numberBetween(0, 30),
            'skill' => fake()->numberBetween(8, 16),
            'will' => fake()->numberBetween(8, 16),
            'strength' => fake()->numberBetween(8, 16),
            'spell_slot' => 0,
            'monster_image' => '',
        ];
    }
}
