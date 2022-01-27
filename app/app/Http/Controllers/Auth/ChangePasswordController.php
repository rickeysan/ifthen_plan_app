<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        logger('ChangePasswordControllerのindexメソッド');
        return view('password/change_pass');
    }
    public function store(ChangePasswordRequest $request){
        logger('ChangePasswordControllerのstoreメソッド');
        $param = $request->all();
        Auth::user()->update(['password'=>Hash::make($param['new_pass'])]);
        return redirect('home');
    }

}
