<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class WithdrawController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        logger('WithdrawControllerのindexメソッドです');
        return view('withdraw');
    }
    public function destroy($id){
        logger('WithdrawControllerのdestroyメソッドです');
        $user = User::find($id);
        $user->delete();
        session()->flash('toastr', config('toastr.withdraw'));
        return redirect()->route('register.index');
    }
}
