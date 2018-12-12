<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    public function whichGameGenre(){
       return $this->hasMany(Game_ssj2s::class);
    }
}
