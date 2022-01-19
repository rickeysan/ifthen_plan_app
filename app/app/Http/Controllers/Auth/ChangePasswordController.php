<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function index(){
        logger('ChangePasswordControllerのindexメソッド');
        // dd('fadsoi');
        return view('password/change_pass');
    }
    public function store(){
        logger('ChangePasswordControllerのstoreメソッド');
        // dd('storeメソッド');
        
        return redirect('home');
    }

}
