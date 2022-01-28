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
            'achivement_flg' => 'required|boolean',
            'habit_id'=>'required|int',
        ]);
        logger('バリデーションOKです');
        // 登録処理
        $schedule = new Schedule;
        // 日付に変換。JavaScriptのタイムスタンプはミリ秒なので秒に変換
        $schedule->start_date = $request->input('start_date');
        $schedule->end_date = $request->input('end_date');
        $schedule->event_name = $request->input('event_name');
        $schedule->achivement_flg = $request->input('achivement_flg');
        $schedule->habit_id = $request->input('habit_id');
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
            'end_date' => 'required|integer',
            'habit_id' => 'required',
        ]);
        logger('バリデーションOK');

        // カレンダー表示期間
        $start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d', $request->input('end_date') / 1000);
        $habit_id = $request->input('habit_id');
        logger($habit_id);
        // 登録処理
        $schedules = Schedule::query()
            ->select(
                // FullCalendarの形式に合わせる
                'start_date as start',
                'end_date as end',
                'event_name as title',
                'achivement_flg',
            )
            // FullCalendarの表示範囲のみ表示
            ->where('end_date', '>', $start_date)
            ->where('start_date', '<', $end_date)
            ->where('habit_id',$habit_id)
            ->get();
        logger($schedules);
        $schedules->map(function($item,$key){
            if($item['achivement_flg'] ==0){
                $item['classNames'] = ['ok_class'];
            }else{
                $item['classNames'] = ['ng_class'];
            }
        });
        logger($schedules);
        return $schedules;
    }

    // 該当日のスケジュールの記録があるか判定
    public function scheduleJudge(Request $request)
    {
        logger('scheduleJudgeです');
        logger($request);
        // バリデーション
        $request->validate([
            'start_date' => 'required|date',
            'habit_id'=>'required',
        ]);
        logger('バリデーションOKです');
        $record = Schedule::where([['start_date',$request['start_date']],'habit_id'=>$request['habit_id']])->first();
        logger($record);
        // 中身があるか判定する
        if(is_null($record)){
            logger('データはありません');
            return ['flg'=>false,'text'=>'','start_date'=>$request['start_date']];
        }else{
            logger('データはあります');
            return ['flg'=>true, 'text'=>$record['event_name'],
            'start_date'=>$request['start_date'], 'achivement_flg'=>$record['achivement_flg'] ];
            return 'OK';
        }
    }
    /**
     * スケジュールを編集
     *
     * @param  Request  $request
     */
    public function scheduleEdit(Request $request)
    {
        logger('scheduleEditです');
        logger($request);
        logger('バリデーションを行います');
        // バリデーション
        $request->validate([
            'start_date' => 'required|date',
            'event_name' => 'required|max:32',
            'habit_id' => 'required',
        ]);
        logger('バリデーションOKです');

        // 登録処理
        $schedule = Schedule::where([['start_date',$request['start_date']],'habit_id'=>$request['habit_id']])->first();
        logger($schedule);
        $schedule->event_name = $request->input('event_name');
        $schedule->achivement_flg = $request->input('achivement_flg');
        $schedule->save();

        return;
    }

}
