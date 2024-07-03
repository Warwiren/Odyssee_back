<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = ['character_name', 'class_id', 'user_id', 'current_health', 'max_health', 'skill', 'will', 'strength', 'spell_slot', 'class_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }
}
