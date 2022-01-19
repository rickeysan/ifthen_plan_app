<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;

class HabitController extends Controller
{
    public function create(){
        logger('HabitControllerのcreateメソッドです');
        return view('habit/create');
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
    public function show(Request $request){
        logger('HabitControllerのshowメソッドです');
        return ('/habit/show');
        // $habit = Habit::where('id',)
    }
    public function edit(Request $request){
        logger('HabitControllerのeditメソッドです');

    }
}
