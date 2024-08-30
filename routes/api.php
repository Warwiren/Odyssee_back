<?php

use App\Http\Controllers\AvailableMapsController;
use App\Http\Controllers\CharacterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Models\Event;
use App\Http\Resources\EventResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [UserController::class, 'register'])->middleware('guest');
Route::post('login',[UserController::class,'login'])->middleware('guest');
Route::post('logout',[UserController::class,'logout'])->middleware('auth:sanctum');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('user', [UserController::class, 'show']);
    Route::get('users', [UserController::class, 'index']);

    Route::get('characters', [CharacterController::class, 'index']);
    Route::post('characters', [CharacterController::class, 'store']);
    Route::delete('characters/{id}', [CharacterController::class, 'destroy']);
    Route::put('characters/{id}/update-class', [CharacterController::class, 'updateClass']);


    Route::get('classes', [ClasseController::class, 'index']);
    Route::get('characters/{character}/available_maps', AvailableMapsController::class);

    Route::get('maps', [MapController::class, 'index']);

    //Route::get('events', [EventController::class, 'index']);
    // Route::get('/selection/{mapId}', [EventController::class, 'getMap']);

    // Route::get('maps/{map}/events', function($id) {
    //     $events = Event::where('map_id', $id)->with('monsters')->get();
    //     // Récupérer dans l'historique tous les id des évènements pour le character_id qui ont un id dans $events->pluck('id')
    //     $completedEvents = collect([3]);

    //     $updatedEvents = $events->map(function(Event $event) use($completedEvents) {
    //         // Si $event->id est dans $completedEvents alors $event->completed = true
    //         $event->completed = $completedEvents->contains($event->id);
    //         return $event;
    //     });

    //     return EventResource::collection($updatedEvents);
    // });


    Route::get('maps/{id}/events', function($id) {
        $events = Event::where('map_id', $id)->with('monsters')->get();

        // Example of retrieving completed events from history (adjust as needed)
        $completedEvents = collect([1,3]); // This should come from your history logic

        $updatedEvents = $events->map(function(Event $event) use ($completedEvents) {
            // If $event->id is in $completedEvents, then $event->completed = true
            $event->completed = $completedEvents->contains($event->id);
            return $event;
        });

        return EventResource::collection($updatedEvents);
    });

    // Route::get('maps/{map}/events', function($id) {
    //     // Récupérer tous les événements pour la carte spécifiée
    //     $events = Event::where('map_id', $id)->with('monsters')->get();
    //     // Récupérer l'utilisateur connecté
    //     $user = auth()->user();
    //     // Récupérer tous les personnages de l'utilisateur
    //     $characters = $user->characters;
    //     // Récupérer dans l'historique tous les id des événements complétés pour le character_id
    //     $completedEvents = $characters->flatMap(function ($character) use ($events) {
    //         return $character->histories->whereIn('event_id', $events->pluck('id'))->pluck('event_id');
    //     });
    //     // Mettre à jour les événements avec la propriété 'completed'
    //     $updatedEvents = $events->map(function(Event $event) use($completedEvents) {
    //         $event->completed = $completedEvents->contains($event->id);
    //         return $event;
    //     });
    //     return EventResource::collection($updatedEvents);
    // });

});
//Pourquoi ne pas suivre un modèle d'API REST plus traditionnel
//-> Pour limiter le nombre de requêtes -> utiliser seulement ce qui est pratique

//Route::post('register', [UserController::class, 'register']);




// Route::post('logout', [UserController::class, 'logout']);

// Route::post('/tokens/create', function (Request $request) {
//     $token = $request->user()->createToken($request->token_name);

//     return ['token' => $token->plainTextToken];
// });
