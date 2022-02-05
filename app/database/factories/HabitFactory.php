<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Habit;
use Faker\Generator as Faker;

$factory->define(Habit::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween($min = 1, $max = 3),
        'category_id'=>$faker->numberBetween($min = 1, $max = 3),
        'purpose'=>$faker->realText(rand(10,80)),
        'task'=>$faker->realText(rand(10,40)),
        'is_open'=>$faker->numberBetween($min=0,$max=1),
        'begin_date'=>$faker->date($format='Y-m-d',$max='now'),
        'finish_date'=>$faker->date($format='Y-m-d',$max='now'),
    ];
});
