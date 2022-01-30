<?php

use Illuminate\Database\Seeder;
use App\Habit;

class HabitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $habit = new Habit;
        $param = [
            'user_id'=>'1',
            'category_id'=>'1',
            'purpose'=>'英検準一級に合格した',
            'task'=>'英語の勉強を毎日2時間する',
            'is_open'=>1,
            'start_date'=>'2022-01-03',
            'finish_date'=>'2022-01-28',
        ];
        $habit->fill($param)->save();

        $habit = new Habit;
        $param = [
            'user_id'=>'1',
            'category_id'=>'2',
            'purpose'=>'次の長距離記録会で5000mのタイムで16分半を達成する',
            'task'=>'部活から帰宅した後は、練習の振り返りノートを書く',
            'is_open'=>1,
            'start_date'=>'2022-01-13',
            'finish_date'=>'2022-03-30',
        ];
        $habit->fill($param)->save();

        $habit = new Habit;
        $param = [
            'user_id'=>'2',
            'category_id'=>'1',
            'purpose'=>'漢準一級に合格した',
            'task'=>'漢字の勉強を毎日2時間する',
            'is_open'=>1,
            'start_date'=>'2022-01-03',
            'finish_date'=>'2022-01-28',
        ];
        $habit->fill($param)->save();

        factory(Habit::class, 80)->create();
    }
}
