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
        // dd(Auth::id());
        // dd($request->session());
        // dd($request->session()->get('user_id'));
        $habits = Habit::where('user_id',Auth::id())->get();
        // dd($habits);
        return view ('home',compact('habits'));
    }
}
 