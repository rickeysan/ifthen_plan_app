<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;
use Illuminate\Database\Eloquent\SoftDeletes;

class HabitController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
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
        return view('/habit/show');
        }
    public function edit(Request $request, $id){
        logger('HabitControllerのeditメソッドです');
        // dd('editです');
        // dd($request->input(id));
        // dd($id);
        // dd($request->session()->get('user_id'));

        $habit = Habit::where('id',$id)->where('user_id',Auth::id())->get();
        // $habit = Habit::find($id)->where('user_id',$request->session()->get());
        // dd($habit);
        // dd($habit->all());
        return view('/habit/edit',compact('habit'));
    }
    public function update(Request $request, $id) {
        logger('HabitControllerのupdateメソッドです');
        $validate_rule = [
            'purpose'=>'required',
            'task'=>'required',
            'start_date'=>'required',
            'finish_date'=>'required',
        ];
        $this->validate($request,$validate_rule);
        $param = $request->all();
        unset($param['_method']);
        unset($param['_token']);
        // dd($param);
        $habit = Habit::find($id);
        // dd(get_class($habit));
        // dd($habit);
        $habit->fill($param)->save();
        return redirect('home');
    }
    public function destroy($id) {
        logger('HabitControllerのdestoryメソッドです');
        // dd('destoryです');
        // dd(Habit::find($id));

        Habit::find($id)->delete();

        return redirect('home');
    }
}
