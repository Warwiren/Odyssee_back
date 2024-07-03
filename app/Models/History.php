<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'character_id',
        'event_id',
    ];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
