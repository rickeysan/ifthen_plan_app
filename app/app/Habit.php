<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Habit extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'category_id','purpose','task','start_date','finish_date','user_id','is_open',
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function plan(){
        return $this->hasOne('App\Plan');
    }
    public function likes()
    {
      return $this->hasMany('App\Like');
    }

    /**
    * 習慣を閲覧しているユーザーがお気に入り登録しているかの判定
    *
    * @return bool true:登録している false:登録していない
    */
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = array();
        foreach($this->likes as $like) {
        array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }

}
