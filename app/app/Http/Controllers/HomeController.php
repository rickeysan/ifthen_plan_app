<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;


class HomeController extends Controller
{
    public function index(){
        logger('HomeControllerのindexメソッドです');
        $habits = Habit::all();
        // dd($habits);
        return view ('home',compact('habits'));
    }
}
