<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Game_ssj2s extends Model
{
    //use Notifiable, SoftDeletes;
    //
    protected $fillable = ['name', 'description','image', 'review'];


    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

}
