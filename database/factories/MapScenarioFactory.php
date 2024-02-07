<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Map;
use App\Models\Scenario;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MapScenario>
 */
class MapScenarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $location = fake()->unique()->randomElement(['Pommier', 'Cascade', 'Sapin']);

        return [

            'location' => $location,
            'map_id' => Map::factory(),
            'scenario_id' => Scenario::factory(),

        ];
    }
}
