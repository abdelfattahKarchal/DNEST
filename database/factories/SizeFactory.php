<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Size;
use Faker\Generator as Faker;

$factory->define(Size::class, function (Faker $faker) {
    return [
        'size'=> $faker->randomNumber(2),
        'add_price'=>$faker->randomFloat(20000,10),
    ];
});
