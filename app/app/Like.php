<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['habit_id','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function habit(){
        return $this->belongsTo('App\Habit');
    }

}
