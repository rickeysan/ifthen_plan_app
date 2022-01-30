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
        return view ('home',compact('habits'));
    }
}
