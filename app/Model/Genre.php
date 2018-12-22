<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    public function games(){
        return $this->belongsToMany(Game::class)->orderBy('created_at', 'DESC');
    }
}
