<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function addLike($habit_id){
        logger('LikeControllerのdoLikeメソッドです');
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
