<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
use App\Plan;
use Illuminate\Support\Facades\Auth;


class HabitController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){
        logger('HabitControllerのcreateメソッドです');
        $categories = Category::all();
        return view('habit/create',compact('categories'));
    }
    public function store(Request $request){
        logger('HabitControllerのstoreメソッドです');
        logger('パリデーションをします');
        // dd(Auth::id());
        $validate_rule = [
            'category_id'=>'required',
            'purpose'=>'required',
            'task'=>'required',
            'start_date'=>'required',
            'finish_date'=>'required',
            'plan_text'=>'required',
        ];
        $this->validate($request,$validate_rule);
        logger('バリデーションOKです');
        $param = $request->all();
        $plan_text = $param['plan_text'];
        unset($param['_token']);
        unset($param['plan_text']);
        $param['user_id']=Auth::id();


        $habit = new Habit;
        $habit->fill($param)->save();
        $last_insert_id = $habit->id;

        $plan = new Plan;
        $plan_param = ['habit_id'=>$last_insert_id,'plan_text'=>$plan_text];
        $plan->fill($plan_param)->save();

        return redirect('home');
    }
    public function show(Request $request,$id){
        logger('HabitControllerのshowメソッドです');
        $habit = Habit::where('id',$id)->first();
        return view('/habit/show',compact('habit'));
        }
    public function edit(Request $request, $id){
        logger('HabitControllerのeditメソッドです');
        $habit = Habit::where('id',$id)->where('user_id',\Auth::id())->first();
        // dd($habit->plan->plan_text);
        $categories = Category::all();
        return view('/habit/edit',compact('habit','categories'));
    }
    public function update(Request $request, $id) {
        logger('HabitControllerのupdateメソッドです');
        logger('バリデーションをします');
        $validate_rule = [
            'category_id'=>'required',
            'purpose'=>'required',
            'task'=>'required',
            'start_date'=>'required',
            'finish_date'=>'required',
            'plan_text'=>'required',
        ];
        $this->validate($request,$validate_rule);
        logger('バリデーションOKです');
        $param = $request->all();
        $plan_text = $request->input('plan_text');
        unset($param['_method']);
        unset($param['_token']);
        unset($param['plan_text']);

        $habit = Habit::find($id);
        $plan_id = $habit['id'];
        $plan = Plan::find($plan_id);
        $plan->plan_text = $plan_text;
        $plan->save();
        $habit->fill($param)->save();

        $categories = Category::all();
        return view('/habit/edit',compact('habit','categories'));
    }
    public function destroy($id) {
        logger('HabitControllerのdestoryメソッドです');
        // dd('destoryです');
        // dd(Habit::find($id));

        Habit::find($id)->delete();

        return redirect('home');
    }
}
