<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classe;
use App\Models\User;
use App\Models\Map;
use App\Models\EventMonster;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder

{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Classe::truncate();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Classe::factory()->count(3)->create();
        User::factory()->count(1)->create();
        Map::factory()->count(3)->create();
        // Scenario::factory()->count(3)->create();
        // Monster::factory()->count(3)->create();
        // MapScenario::factory()->count(3)->create();
        EventMonster::factory()->count(3)->create();

    }
}
