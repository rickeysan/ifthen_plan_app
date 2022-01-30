<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function index(){
        logger('RegisterControllerのindexメソッドです');
        return view('register');
    }
    public function store(RegisterRequest $request){
        logger('RegisterControllerのstoreメソッドです');
        $param = $request->all();
        unset($param['_token']);
        unset($param['passowrd_confirmation']);
        $param['password'] = Hash::make($param['password']);
        $user = new User;
        $user->fill($param)->save();
        $user_id = $user->id;
        Auth::loginUsingId($user_id);
        session()->flash('toastr', config('toastr.user_register'));
        return redirect('home');
    }
}
