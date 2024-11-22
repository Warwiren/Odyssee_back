<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\postJson;

it('allows a user to log in successfully', function () {
    // Créer un utilisateur fictif
    $user = User::factory()->create([
        'email' => 'user' . Str::random(5) . '@example.com',
        'password' => Hash::make('password'), 
    ]);

    // Effectuer une requête POST à la route de connexion
    $response = postJson('/api/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    // Vérifier que la connexion est réussie
    // $response->assertStatus(201);
    
    // Vérifier que l'utilisateur est bien authentifié
    expect(auth()->user()->id)->toBe($user->id);
});
