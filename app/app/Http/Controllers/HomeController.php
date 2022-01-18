<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        logger('HomeControllerのindexメソッドです');
        return view ('home');
    }
}
