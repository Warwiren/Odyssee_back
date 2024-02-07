<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MapScenario;


class MapScenarioController extends Controller
{
    //
    function index()
    {
        // return MapScenario::all();
        $mapScenarios = MapScenario::with(['map:id,map_name','scenario:id,scenario_name,description'])
        ->get(['location', 'map_id', 'scenario_id']);

        // On exclu les champs map_id et scenario_id car l'on affiche déja les données liées
        $mapScenarios->each(function ($mapScenario) {
            $mapScenario->makeHidden(['map_id', 'scenario_id']);
        });

        return $mapScenarios;
    }
}
