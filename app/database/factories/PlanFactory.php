<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plan;
use Faker\Generator as Faker;

$factory->define(Plan::class, function (Faker $faker) {
    static $sequence = 1;
        return [
        'habit_id' => function () { return $sequence++; },
        'plan_text'=>$faker->realText(rand(10,40)),
    ];
});
