<?php

use Illuminate\Database\Seeder;
use App\Plan;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = new Plan;
        $param = [
            'habit_id'=>'1',
            'habit_text'=>'集中力が切れたらスクワットをする',
        ];
        $plan->fill($param)->save();

        $plan = new Plan;
        $param = [
            'habit_id'=>'1',
            'habit_text'=>'集中力が切れたら海外ドラマを見る時は、気になるセリフをメモして練習してみる',
        ];
        $plan->fill($param)->save();

        $plan = new Plan;
        $param = [
            'habit_id'=>'2',
            'habit_text'=>'お風呂から出たら、すぐにストレッチをする',
        ];
        $plan->fill($param)->save();
    }
}
