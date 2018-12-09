<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    function whichGameGenre(){
       return $this->belongsTo('App\Game_ssj2s', 'game_ssj2s_id', 'id');
    }
}
