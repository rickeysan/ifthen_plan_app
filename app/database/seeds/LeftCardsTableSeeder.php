<?php

use Illuminate\Database\Seeder;
use App\LeftCard;

class LeftCardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leftcard = new LeftCard;
        $param = [
            'body'=>'疲れていたら',
            'planning_id'=>1,
        ];
        $leftcard->fill($param)->save();

        $leftcard = new LeftCard;
        $param = [
            'body'=>'お腹が空いたら',
            'planning_id'=>1,
        ];
        $leftcard->fill($param)->save();

        $leftcard = new LeftCard;
        $param = [
            'body'=>'眠くなったら',
            'planning_id'=>1,
        ];
        $leftcard->fill($param)->save();


    }
}
