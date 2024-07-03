<?php

namespace App\Http\Controllers;

use App\Http\Resources\MapResource;
use App\Models\Character;
use App\Models\Map;
use Illuminate\Http\Request;

class AvailableMapsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Character $character, Request $request)
    {
        // $maps = Map::get();
        $maps = Map::with('events')->withCount('events')->get();

        return MapResource::collection($maps);
    }
}
