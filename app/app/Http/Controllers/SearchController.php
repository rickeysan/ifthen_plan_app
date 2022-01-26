<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;

class SearchController extends Controller
{
    public function index(){
        logger('PostControllerのindexメソッドです');
        $habits = Habit::all();
        return view('search',compact('habits'));
    }
}
