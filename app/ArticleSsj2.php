<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ArticleSsj2 extends Model
{
    use Notifiable, SoftDeletes;
    //
    protected $fillable = ['title', 'description','image', 'user_id'];

    function autor(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
