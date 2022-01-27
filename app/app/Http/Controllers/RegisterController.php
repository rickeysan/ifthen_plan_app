<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{

    public function index(){
        logger('indexメソッドです');
        return view('register');
    }
    public function store(RegisterRequest $request){
        logger('storeメソッドです');
        $param = $request->all();
        unset($param['_token']);
        unset($param['passowrd_confirmation']);
        $param['password'] = Hash::make($param['password']);
        // dd($param);
        $user = new User;
        $user->fill($param)->save();
        return view('home');
    }
}
