<?php

namespace App\Models;
use App\Models\Map;
use App\Models\Scenario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapScenario extends Model
{
    use HasFactory;

    public function map()
    {
        return $this->belongsTo(Map::class, 'map_id');
    }

    public function scenario()
    {
        return $this->belongsTo(Scenario::class, 'scenario_id');
    }
}
