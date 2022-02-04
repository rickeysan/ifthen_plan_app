<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable =['start_date','end_date','event_name','achivement_flg','habit_id'];
}
