<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use App\Models\Monster;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScenarioMonster>
 */
class EventMonsterFactory extends Factory
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
            'event_id' => Event::factory(),
        ];
    }
}
