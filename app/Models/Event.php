<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'description',
        'dice_test',
        'location',
        'location_image',
        'type',
        'map_id',
    ];

    public function map()
    {
        return $this->belongsTo(Map::class);
    }

    public function monsters() {
        return $this->belongsToMany(Monster::class, 'event_monsters');
    }
}
