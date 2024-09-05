<?php

use App\Models\User;
use App\Models\Classe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\postJson;
use function Pest\Laravel\assertDatabaseHas;

uses(RefreshDatabase::class);

it('can create a character', function () {
    // Crée un utilisateur via la factory
    $user = User::factory()->create();

    // Utilise une classe existante, obtenue à partir de la base de données ou via une factory
    $classe = Classe::factory()->create([
        'class_name' => 'Warrior', // Exemple de données pour la classe
        'health' => 100,
        'skill' => 10,
        'will' => 5,
        'strength' => 8,
        'spell_slot' => 3,
        'class_image' => 'image_url'
    ]);

    // Authentifie l'utilisateur
    $this->actingAs($user);

    // Effectue une requête POST pour créer un personnage
    $response = postJson('/api/characters', [
        'character_name' => 'Test Character',
        'class_id' => $classe->id,
    ]);

    // Vérifie le code de réponse HTTP
    $response->assertStatus(201);

    // Vérifie que les données retournées sont correctes
    $response->assertJson([
        'character_name' => 'Test Character',
        'class_id' => $classe->id,
        'user_id' => $user->id,
        'current_health' => 100,
        'max_health' => 100,
        'skill' => 10,
        'will' => 5,
        'strength' => 8,
        'spell_slot' => 3,
    ]);

    // Vérifie que le personnage a bien été créé dans la base de données
    assertDatabaseHas('characters', [
        'character_name' => 'Test Character',
        'class_id' => $classe->id,
        'user_id' => $user->id,
        'current_health' => 100,
        'max_health' => 100,
        'skill' => 10,
        'will' => 5,
        'strength' => 8,
        'spell_slot' => 3,
    ]);
});
