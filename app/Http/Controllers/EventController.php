<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\History;

class EventController extends Controller
{
    //
    function index()
    {
        return Event::all();
    }

    // public function getMap($mapId)
    // {
    //     $events = Event::where('map_id', $mapId)->get();
    //     return response()->json($events);
    // }

    public function getMap($mapId, Request $request)
    {
        $characterId = $request->query('character_id');
        $events = Event::where('map_id', $mapId)->with('monsters')->get();

        $completedEvents = History::where('character_id', $characterId)
                                   ->whereIn('event_id', $events->pluck('id'))
                                   ->pluck('event_id');

        $updatedEvents = $events->map(function(Event $event) use ($completedEvents) {
            $event->completed = $completedEvents->contains($event->id);
            return $event;
        });

        return response()->json($updatedEvents);
    }
}
