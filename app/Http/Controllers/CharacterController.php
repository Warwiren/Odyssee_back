<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Classe;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{

    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer les personnages de l'utilisateur connecté
        $characters = Character::where('user_id', $user->id)
            ->with('classe')
            ->get();

        return response()->json($characters);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'character_name' => 'required|string|max:255',
            'class_id' => 'required|integer|exists:classes,id',
        ]);

        $validated['user_id'] = $request->user()->id;

        $classe = Classe::find($validated['class_id']);

        $validated['current_health'] = $classe->health;
        $validated['max_health'] = $classe->health;
        $validated['skill'] = $classe->skill;
        $validated['will'] = $classe->will;
        $validated['strength'] = $classe->strength;
        $validated['spell_slot'] = $classe->spell_slot;



        /** @var Character $character */
        $character = Character::create($validated);

        // $character = Character::create([
        //     'character_name' => $request->character_name,
        //     'class_id' => $request->class_id,
        //     'user_id' => $request->user()->id,
        // ]);

        return response()->json($character, 201);
    }

    public function destroy($id)
    {
        $character = Character::findOrFail($id);
        $character->delete();

        return response()->json(['message' => 'Character deleted successfully']);
    }

    public function updateClass($id, Request $request)
    {
        // Validation des données reçues
        $request->validate([
            'class_id' => 'required|exists:classes,id',
        ]);
    
        $character = Character::findOrFail($id);    
        $classe = Classe::findOrFail($request->input('class_id'));
    
        // Sauvegarder la santé actuelle du personnage avant de modifier ses caractéristiques
        $currentHealth = $character->current_health;
    
        // Mettre à jour la classe du personnage et ses caractéristiques
        $character->class_id = $classe->id;
        $character->skill = $classe->skill;
        $character->will = $classe->will;
        $character->strength = $classe->strength;
        $character->spell_slot = $classe->spell_slot;
        $character->current_health = $currentHealth;
    
        // Sauvegarder le personnage
        $character->save();
    
        // Réponse JSON avec la classe mise à jour
        return response()->json([
            'message' => 'Classe et caractéristiques mises à jour avec succès',
            'character' => $character->load('classe') 
        ]);
    }
    
    
}
