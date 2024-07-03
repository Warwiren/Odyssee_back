<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scenario>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $eventName = fake()->unique()->randomElement(['Embuscade', 'Accident', 'Boss']);
        $locationName = fake()->unique()->randomElement(['Avalanche', 'Tornade', 'Pluie d\'acide']);

        return [
            'event_name' => $eventName,
            'description' => fake()->unique()->randomElement(['Vous entrez dans une mystèrieuse forêt. L\'air vous pertrube un peu car une odeur noséabonde vient attaqué vos narines. En effet non loin de vous, sous un arbre dors un troll.. que faire: attaquer ou passer à côté ? ', 'Vous entrez dans une mystèrieuse caverne. L\'air vous pertrube un peu car une odeur noséabonde vient attaqué vos narines. En effet non loin de vous, à un croisement, 2 gobelins attendent..', 'Vous escaladez une montagne. Le vent se lève et une tempète se prépare, un dragon arrive.']),
            'dice_test' => fake()->numberBetween(8, 15),
            'location' => $locationName,
            'location_image' => '',
            'type' => $eventName,
            'map_id' =>fake()->numberBetween(1, 3),

        ];
    }
}
