<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soundtrack extends Model
{
    //use Notifiable, SoftDeletes;
    //
    protected $fillable = ['music', 'composer'];

    function whichGameSound(){
        return $this->belongsTo('App\Game_ssj2s', 'game_ssj2s_id', 'id');
    }
}
