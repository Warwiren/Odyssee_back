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

        switch ($mapName) {
            case 'Montagne':
                $mapImage = 'maps/mountain.png';
                break;
            case 'Foret':
                $mapImage = 'maps/forest.jpg';
                break;
            case 'Grotte':
                $mapImage = 'maps/cave.jpg';
                break;
            default:
                $mapImage = '';
                break;
        }

        return [
            'map_name' => $mapName,
            'map_image' => $mapImage,
        ];
    }
}
