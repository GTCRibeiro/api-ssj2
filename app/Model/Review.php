<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Review extends Model
{
    protected $fillable = ['title', 'name', 'description','image', 'review', 'game_id', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function game(){
        return $this->belongsTo(Game::class)->orderBy("created_at", "DESC");
    }
}
