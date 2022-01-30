<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index(Request $request){
        logger('LogoutControllerのindexメソッドです');
        Auth::logout();
        session()->flash('toastr', config('toastr.logout'));
        return redirect()->route('login.index');
    }
}
