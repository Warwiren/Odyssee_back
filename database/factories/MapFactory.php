<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Map>
 */
class MapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mapName = fake()->unique()->randomElement(['Montagne', 'Foret', 'Grotte']);

        $baseUrl = 'storage/maps/';

        $mapImage = match ($mapName) {
            'Montagne' => asset($baseUrl . 'mountain.png'),
            'Foret' => asset($baseUrl . 'forest.jpg'),
            'Grotte' => asset($baseUrl . 'cave.jpg'),
        };

        return [
            'map_name' => $mapName,
            'map_image' => $mapImage,
        ];
    }
}
