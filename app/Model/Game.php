<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [];

    public function genre(){
        return $this->belongsToMany(Genre::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class)->orderBy('created_at', 'DESC');
    }
}
