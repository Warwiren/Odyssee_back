<?php

use App\Models\User;
use App\Models\Character;
use App\Models\Classe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Sanctum;


it('can delete a character', function () {

    $user = User::factory()->create([
        'password' => Hash::make('password'),
    ]);

    Sanctum::actingAs($user);

    // Créer une classe
    $class = Classe::factory()->create();

    // Créer un personnage
    $response = $this->postJson('/api/characters', [
        'character_name' => 'Hero',
        'class_id' => $class->id,
    ]);

    // Extraire l'ID du personnage de la réponse JSON
    $characterId = $response->json('id');

    // Effectuer une requête DELETE pour supprimer le personnage
    $deleteResponse = $this->deleteJson("/api/characters/{$characterId}");

    // Vérifier que le personnage est supprimé avec succès
    $deleteResponse->assertStatus(200);
    $deleteResponse->assertJson(['message' => 'Character deleted successfully']);

    // Vérifier que le personnage n'existe plus dans la base de données
    $this->assertDatabaseMissing('characters', [
        'id' => $characterId,
    ]);
});
