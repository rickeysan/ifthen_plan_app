<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        logger('indexメソッドです');
        return view('register');
    }
    public function store(Request $request){
        logger('storeメソッドです');
        

        $form = $request->all();


        return view('home');
    }
}
