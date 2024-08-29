<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    //use RefreshDatabase;

    public function test_user_can_register()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        // Effectuer une requête POST à la route d'inscription avec le préfixe api
        $response = $this->postJson('/api/register', $userData);

        // Vérifier que l'utilisateur est bien redirigé après l'inscription
        $response->assertStatus(201);
        // Vérifier que l'utilisateur est bien enregistré dans la base de données
        $this->assertDatabaseHas('users', [
            'email' => 'johndoe@example.com',
        ]);
    }
}
