<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;

class SearchController extends Controller
{
    public function index(){
        logger('PostControllerのindexメソッドです');
        $total_habits_amount = count(Habit::all());
        $habits = Habit::paginate(10);
        // dd($habits);
        return view('post/search',compact('habits','total_habits_amount'));
    }

    public function store(Request $request){
        logger('PostControllerのstoreメソッドです');
        logger($request);
        $key_word = $request->input('key_word');
        //検索キーワードが空の場合
        if (empty($key_word)) {
            $users = Habit::paginate(10);  
        //検索キーワードが入っている場合
        } else {
            // $_key_word = str_replace('　', ' ', $key_word);  //全角スペースを半角に変換
            // $_key_word = preg_replace('/\s(?=\s)/', '', $_key_word); //連続する半角スペースは削除
            // $_key_word = trim($_key_word); //文字列の先頭と末尾にあるホワイトスペースを削除
            // $_key_word = str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $_key_word); //円マーク、パーセント、アンダーバーはエスケープ処理
            // $keywords = array_unique(explode(' ', $_key_word)); //キーワードを半角スペースで配列に変換し、重複する値を削除

            $habits = Habit::where('task','like','%'.$key_word.'%')->paginate(10);   
            $total_habits_amount = count(Habit::where('task','like','%'.$key_word.'%')->get());
        }
        return view('post/search',compact('habits','total_habits_amount'));
    }


}
