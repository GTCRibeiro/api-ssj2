<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use Notifiable, SoftDeletes;
    //
    protected $fillable = ['title', 'description','image', 'studio_id'];

    function whichGameStudio(){
        return $this->belongsTo('App\Game_ssj2s', 'game_ssj2s_id', 'id');
    }
}
