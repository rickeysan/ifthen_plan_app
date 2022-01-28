<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;
use App\Category;

class SearchController extends Controller
{
    public function index(){
        logger('PostControllerのindexメソッドです');
        $total_habits_amount = count(Habit::all());
        $habits = Habit::paginate(12);
        $categories = Category::all();
        return view('post/search',compact('habits','total_habits_amount','categories'));
    }

    public function store(Request $request){
        logger('PostControllerのstoreメソッドです');
        logger($request);
        $categories = Category::all();
        $key_word = $request->input('key_word');
        $category_id = $request->input('category_id');
        if (empty($key_word)) {
            if(!empty($category_id)){
                //検索キーワードなし、カテゴリーが選択されている場合
                $habits = Habit::where([['category_id',$category_id]])->paginate(12);
                $total_habits_amount = count(Habit::where('category_id',$category_id)->get());
            }else{
                //検索キーワードなし、カテゴリー選択なしの場合
                $users = Habit::paginate(12);
                $total_habits_amount =count(Habit::all());
            }
        } else {
            if(!empty($category_id)){
            //検索キーワードあり、カテゴリーが選択されている場合
                $habits = Habit::where([['task','like','%'.$key_word.'%'],['category_id',$category_id]])->paginate(12);
                $total_habits_amount = count(Habit::where([['task','like','%'.$key_word.'%'],['category_id',$category_id]])->get());
            }else{
            //検索キーワードあり、カテゴリー選択なしの場合
            $habits = Habit::where([['task','like','%'.$key_word.'%']])->paginate(12);
            $total_habits_amount = count(Habit::where([['task','like','%'.$key_word.'%']])->get());
            }
        }
        return view('post/search',compact('habits','total_habits_amount','categories','key_word','category_id'));
    }


}
