<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{

    /**
     * スケジュールを登録
     *
     * @param  Request  $request
     */
    public function scheduleAdd(Request $request)
    {
        logger('scheduleAddです');
        logger('バリデーションを行います');
        // バリデーション
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'event_name' => 'required|max:32',
        ]);
        logger('バリデーションOKです');
        // 登録処理
        $schedule = new Schedule;
        // 日付に変換。JavaScriptのタイムスタンプはミリ秒なので秒に変換
        // $schedule->start_date = date('Y-m-d', $request->input('start_date') / 1000);
        // $schedule->end_date = date('Y-m-d', $request->input('end_date') / 1000);
        $schedule->start_date = $request->input('start_date');
        $schedule->end_date = $request->input('end_date');
        $schedule->event_name = $request->input('event_name');
        $schedule->save();

        return;
    }

    /**
     * スケジュールを取得
     *
     * @param  Request  $request
     */
    public function scheduleGet(Request $request)
    {
        logger('scheduleGetです');
        // バリデーション
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer'
        ]);

        // カレンダー表示期間
        $start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d', $request->input('end_date') / 1000);

        // 登録処理
        return Schedule::query()
            ->select(
                // FullCalendarの形式に合わせる
                'start_date as start',
                'end_date as end',
                'event_name as title'
            )
            // FullCalendarの表示範囲のみ表示
            ->where('end_date', '>', $start_date)
            ->where('start_date', '<', $end_date)
            ->get();
    }

    // 該当日のスケジュールの記録があるか判定
    public function scheduleJudge(Request $request)
    {
        logger('scheduleJudgeです');
        logger($request);
        // バリデーション
        $request->validate([
            'start_date' => 'required|date',
        ]);
        logger('バリデーションOKです');
        logger($request['start_date']);
        $record = Schedule::where('start_date',$request['start_date'])->first();
        logger('recordの中身');
        logger($record);
        // 中身があるか判定する
        if(is_null($record)){
            logger('データはありません');
            return ['flg'=>false,'text'=>'','start_date'=>$request['start_date']];
        }else{
            logger('データはあります');
            return ['flg'=>true,'text'=>$record['event_name'],'start_date'=>$request['start_date']];
            return 'OK';
        }
        // // 登録処理
        // return Schedule::query()
        //     ->select(
        //         // FullCalendarの形式に合わせる
        //         'start_date as start',
        //         'end_date as end',
        //         'event_name as title'
        //     )
        //     // FullCalendarの表示範囲のみ表示
        //     ->where('end_date', '>', $start_date)
        //     ->where('start_date', '<', $end_date)
        //     ->get();
    }
}
