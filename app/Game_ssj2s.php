<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_ssj2s extends Model
{
    protected $fillable = ['title', 'name', 'description','image', 'review'];


    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }
    public function genreGames(){
        return $this->belongsTo(Genre::class);
    }
}
