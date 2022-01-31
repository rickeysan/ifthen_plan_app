<?php

use Illuminate\Database\Seeder;
use App\Example;

class ExampleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'やる気が無くなったら',
        ];
        $example->fill($param)->save();


    }
}
