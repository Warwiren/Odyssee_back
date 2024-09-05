<?php

// use App\Models\User;
// use App\Models\Classe;
// use App\Models\Character;
// use Illuminate\Foundation\Testing\RefreshDatabase;

// uses(RefreshDatabase::class);

// Test de la création d'un personnage
// it('can create a character', function () {
//     $user = User::factory()->create();

//     $this->actingAs($user)
//         ->postJson('/api/characters', [
//             'character_name' => 'Test Character',
//             'class_id' => $classe->id,
//         ])
//         ->assertStatus(201)
//         ->assertJson([
//             'character_name' => 'Test Character',
//             'class_id' => $classe->id,
//             'user_id' => $user->id,
//         ]);
// });

// it('can retrieve characters for authenticated user', function () {
//     $user = User::factory()->create();
//     $classe = Classe::factory()->create();
//     $character = Character::factory()->create([
//         'user_id' => $user->id,
//         'class_id' => $classe->id,
//     ]);

//     $this->actingAs($user)
//         ->getJson('/api/characters')
//         ->assertStatus(200)
//         ->assertJsonFragment([
//             'character_name' => $character->character_name,
//         ]);
// });

// Test de la mise à jour de la classe d'un personnage
// it('can update a character class', function () {
//     $user = User::factory()->create();
//     $oldClasse = Classe::factory()->create();
//     $newClasse = Classe::factory()->create();
//     $character = Character::factory()->create([
//         'user_id' => $user->id,
//         'class_id' => $oldClasse->id,
//     ]);

//     $this->actingAs($user)
//         ->putJson("/api/characters/{$character->id}/update-class", [
//             'class_id' => $newClasse->id,
//         ])
//         ->assertStatus(200)
//         ->assertJsonFragment([
//             'class_id' => $newClasse->id,
//         ]);
// });

// Test de la suppression d'un personnage
// it('can delete a character', function () {
//     $user = User::factory()->create();
//     $character = Character::factory()->create([
//         'user_id' => $user->id,
//     ]);

//     $this->actingAs($user)
//         ->deleteJson("/api/characters/{$character->id}")
//         ->assertStatus(200);

//     $this->assertDatabaseMissing('characters', [
//         'id' => $character->id,
//     ]);
// });
