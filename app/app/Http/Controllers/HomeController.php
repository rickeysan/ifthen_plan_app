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
        // dd(Auth::user());
        // dd($request->session());
        $habits = Habit::where('user_id',$request->session()->get('user_id'))->get();
        // dd($habits);
        return view ('home',compact('habits'));
    }
}
