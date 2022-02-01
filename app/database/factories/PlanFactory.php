<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plan;
use Faker\Generator as Faker;

$factory->define(Plan::class, function (Faker $faker) {
    static $order = 4;
    return [
        'habit_id'=>$order++,
        'plan_text'=>$faker->realText(rand(10,30)),
    ];
});
