<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MapScenario;
use App\Models\Monster;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScenarioMonster>
 */
class ScenarioMonsterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'monster_id' => Monster::factory(),
            'scenario_id' => MapScenario::factory(),
        ];
    }
}
