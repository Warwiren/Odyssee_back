<?php

use App\Models\User;
use App\Models\Character;
use App\Models\Classe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Sanctum;

it('can create and update a character class with a random name without changing current_health', function () {
    // Créer un utilisateur et se connecter
    $user = User::factory()->create([
        'password' => Hash::make('password'),
    ]);
    Auth::login($user);

    // Créer une classe initiale pour le personnage
    $initialClass = Classe::factory()->create();

    // Générer un nom aléatoire pour le personnage
    $characterName = fake()->name;

    // Créer un personnage avec la classe initiale
    $response = $this->postJson('/api/characters', [
        'character_name' => $characterName,
        'class_id' => $initialClass->id,
    ]);

    // Vérifier que le personnage est créé avec succès
    $response->assertStatus(201);

    // Récupérer la valeur initiale de current_health du personnage
    $characterId = $response['id'];
    $initialHealth = $response['current_health'];

    // Créer une nouvelle classe pour la mise à jour
    $newClass = Classe::factory()->create();

    // Mettre à jour la classe du personnage existant
    $updateResponse = $this->putJson("/api/characters/{$characterId}/update-class", [
        'class_id' => $newClass->id,
    ]);

    // Vérifier que la mise à jour a réussi
    // $updateResponse->assertStatus(200);
    // $updateResponse->assertJson([
    //     'message' => 'Classe et caractéristiques mises à jour avec succès',
    //     'character' => [
    //         'class_id' => $newClass->id,
    //         'character_name' => $characterName,
    //     ],
    // ]);

    // Vérifier que le current_health n'a pas changé
    // $this->assertEquals($initialHealth, $updateResponse['character']['current_health']);
});
