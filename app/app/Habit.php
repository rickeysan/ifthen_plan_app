<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    protected $fillable = [
        'category_id','purpose','task','start_date','finish_date','user_id',
    ];

}
