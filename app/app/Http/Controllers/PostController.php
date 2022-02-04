<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;

class PostController extends Controller
{
    public function show($id){
        logger('PostControllerのshowメソッドです');
        $habit = Habit::where('id',$id)->first();
        return view('post/post', compact('habit'));
    }
}
