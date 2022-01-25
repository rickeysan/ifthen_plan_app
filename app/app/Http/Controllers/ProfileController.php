<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        logger('PfofileControllerのindexです');
        $user_info = User::where('id',Auth::id())->get();
        // dd($user_info);
        return view('/profile',compact('user_info'));
    }

    public function update(Request $request, $id) {
        logger('PrifileControllerのupdateメソッドです');
        $validate_rule = [
            'name'=>'required',
            'email'=>'required | email',
            'introduction'=>'max:256',
        ];
        $this->validate($request,$validate_rule);
        $param = $request->all();
        unset($param['_method']);
        unset($param['_token']);
        $user = User::find(Auth::id());
        // dd($user);
        $user->fill($param)->save();
        return redirect('home');
    }

}
