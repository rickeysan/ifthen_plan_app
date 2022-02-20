<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HabitRequest;
use App\Habit;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
use App\Plan;
use Illuminate\Support\Facades\Auth;


class HabitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        logger('HabitControllerのcreateメソッドです');
        $categories = Category::all();
        return view('habit/create', compact('categories'));
    }
    public function store(HabitRequest $request)
    {
        logger('HabitControllerのstoreメソッドです');
        $param = $request->only(['category_id', 'begin_date', 'finish_date', 'purpose', 'task', 'plan_text', 'is_open']);
        if (isset($param['is_open'])) {
            // 1は公開
            $param['is_open'] = 1;
        } else {
            // 0は非公開
            $param['is_open'] = 0;
        }
        $plan_text = $param['plan_text'];
        $param['user_id'] = Auth::id();

        $habit = new Habit;
        $habit->fill($param)->save();
        $last_insert_id = $habit->id;

        $plan = new Plan;
        $plan_param = ['habit_id' => $last_insert_id, 'plan_text' => $plan_text];
        $plan->fill($plan_param)->save();
        session()->flash('toastr', config('toastr.habit_register'));
        return redirect('home');
    }
    public function show(Request $request, $id)
    {
        logger('HabitControllerのshowメソッドです');
        $habit = Habit::where('id', $id)->first();
        if (empty($habit)) {
            return redirect('search');
        }
        return view('/habit/show', compact('habit'));
    }
    public function edit(Request $request, $id)
    {
        logger('HabitControllerのeditメソッドです');
        $habit = Habit::where('id', $id)->where('user_id', Auth::id())->first();
        if (empty($habit)) {
            return redirect('home');
        }
        $categories = Category::all();
        return view('/habit/edit', compact('habit', 'categories'));
    }
    public function update(HabitRequest $request, $id)
    {
        logger('HabitControllerのupdateメソッドです');
        $param = $request->only(['category_id', 'begin_date', 'finish_date', 'purpose', 'task', 'plan_text', 'is_open']);
        if (isset($param['is_open'])) {
            // 1は公開
            $param['is_open'] = 1;
        } else {
            // 0は非公開
            $param['is_open'] = 0;
        }
        $plan_text = $request->input('plan_text');

        $habit = Habit::find($id);
        $plan_id = $habit['id'];
        $plan = Plan::find($plan_id);
        $plan->plan_text = $plan_text;
        $plan->save();
        $habit->fill($param)->save();

        $categories = Category::all();
        session()->flash('toastr', config('toastr.habit_update'));
        logger('処理終了');
        return view('/habit/edit', compact('habit', 'categories'));
    }
    public function destroy($id)
    {
        logger('HabitControllerのdestoryメソッドです');
        Habit::find($id)->delete();
        session()->flash('toastr', config('toastr.habit_delete'));
        return redirect('home');
    }
}
