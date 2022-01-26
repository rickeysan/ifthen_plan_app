<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;

class SearchController extends Controller
{
    public function index(){
        logger('PostControllerのindexメソッドです');
        $total_habits_amount = count(Habit::all());
        $habits = Habit::paginate(10);
        // dd($habits);
        return view('post/search',compact('habits','total_habits_amount'));
    }
}
