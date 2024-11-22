<?php

use App\Models\User;
use App\Models\Character;
use App\Models\Classe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

it('can create a character', function () {
    // Créer un utilisateur et se connecter
    $user = User::factory()->create([
        'password' => Hash::make('password'),
    ]);
    
    Auth::login($user);

    // Créer une classe
    $class = Classe::factory()->create();

    // Effectuer une requête POST pour créer un personnage
    $response = $this->postJson('/api/characters', [
        'character_name' => 'Hero',
        'class_id' => $class->id,
    ]);

    // Vérifier que le personnage est créé avec succès
    $response->assertStatus(201);
    $response->assertJson([
        'character_name' => 'Hero',
        'class_id' => $class->id,
    ]);

    // Vérifier que le personnage est enregistré dans la base de données
    $this->assertDatabaseHas('characters', [
        'character_name' => 'Hero',
        'class_id' => $class->id,
        'user_id' => $user->id,
    ]);
});
