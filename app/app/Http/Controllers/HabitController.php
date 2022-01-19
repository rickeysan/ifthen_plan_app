<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;

class HabitController extends Controller
{
    public function index(){
        logger('HabitControllerのindexメソッドです');
        return view('habit');
    }
    public function store(Request $request){
        logger('HabitControllerのcreateメソッドです');
        $validate_rule = [
            'purpose'=>'required',
            'task'=>'required',
            'start_date'=>'required',
            'finish_date'=>'required',
        ];
        $this->validate($request,$validate_rule);
        $param = $request->all();
        unset($param['_token']);
        $param['user_id']=$request->session()->get('user_id');
        // dd($param);
        $habit = new Habit;
        $habit->fill($param)->save();
        return redirect('home');
    }
}
