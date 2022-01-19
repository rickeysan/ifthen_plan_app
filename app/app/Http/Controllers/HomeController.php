<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;


class HomeController extends Controller
{
    public function index(Request $request){
        logger('HomeControllerのindexメソッドです');
        // dd($request->session());
        $habits = Habit::where('user_id',$request->session()->get('user_id'))->get();
        // dd($habits);
        return view ('home',compact('habits'));
    }
}
