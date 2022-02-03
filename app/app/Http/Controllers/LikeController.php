<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Illuminate\Support\Facades\Auth;
use App\Habit;
use App\User;

class LikeController extends Controller
{
    public function show(){
        logger('LikeControllerのshowメソッドです');
        $user = User::with('likes.habit')->where('id',Auth::id())->first();
        return view('my_likes',compact('user'));
    }

    public function addLike($habit_id){
        logger('LikeControllerのaddLikeメソッドです');
        $like = new Like;
        $param = [
            'habit_id'=>$habit_id,
            'user_id'=>Auth::id(),
        ];
        $like->fill($param)->save();
        session()->flash('toastr', config('toastr.add_like'));
        return redirect()->back();
    }
    public function removeLike($habit_id){
        logger('LikeControllerのremoveLikeメソッドです');
        $like = Like::where('habit_id', $habit_id)->where('user_id', Auth::id())->first();
        $like->delete();
        session()->flash('toastr', config('toastr.remove_like'));
        return redirect()->back();
    }


}
