<?php

use App\Models\User;
use App\Models\Classe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

it('can create a character', function () {
    // Créer un utilisateur
    $user = User::factory()->create();

    // Créer une classe via la factory
    $classe = Classe::factory()->create();

    // Authentifier l'utilisateur
    actingAs($user);

    // Effectuer une requête POST pour créer un personnage
    $response = $this->postJson('/api/characters', [
        'character_name' => 'Test Character',
        'class_id' => $classe->id,
    ]);

    // Vérifier le statut de la réponse
    $response->assertStatus(201);

    // Vérifier que les données retournées sont correctes
    $response->assertJson([
        'character_name' => 'Test Character',
        'class_id' => $classe->id,
        'user_id' => $user->id,
    ]);

    // Vérifier que le personnage a bien été créé dans la base de données
    $this->assertDatabaseHas('characters', [
        'character_name' => 'Test Character',
        'class_id' => $classe->id,
        'user_id' => $user->id,
    ]);
});
