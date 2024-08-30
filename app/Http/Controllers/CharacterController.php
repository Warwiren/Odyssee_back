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

        // Transformer les données des personnages
        // $charactersWithClassName = $characters->map(function ($character) {
        //     return [
        //         'id' => $character->id,
        //         'character_name' => $character->character_name,
        //         'class_id' => $character->class_id,
        //         'class_name' => $character->classe->class_name,
        //         'current_health' => $character->current_health,
        //         'max_health' => $character->max_health,
        //         'skill' => $character->skill,
        //         'will' => $character->will,
        //         'strength' => $character->strength,
        //         'spell_slot' => $character->spell_slot,
        //     ];
        // });

        // Retourner la réponse JSON
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
    
        // Trouver le personnage par ID
        $character = Character::findOrFail($id);
    
        // Trouver la nouvelle classe par ID
        $classe = Classe::findOrFail($request->input('class_id'));
    
        // Mettre à jour la classe du personnage et ses caractéristiques
        $character->class_id = $classe->id;
        $character->skill = $classe->skill;
        $character->will = $classe->will;
        $character->strength = $classe->strength;
        $character->spell_slot = $classe->spell_slot;
    
        $character->save();
    
        // Réponse JSON avec la classe mise à jour
        return response()->json([
            'message' => 'Classe et caractéristiques mises à jour avec succès',
            'character' => $character->load('classe') // Charge les données de la classe associée
        ]);
    }
    
}
