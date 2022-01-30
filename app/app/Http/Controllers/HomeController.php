<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        logger('HomeControllerのindexメソッドです');

        $habits = Habit::where('user_id',Auth::id())->get();
        // session()->flash('message','作成しました');
        // session()->flash('message', 'hello,toaster');
        session()->flash('toastr', config('toastr.delete'));
        return view ('home',compact('habits'));
    }
}
