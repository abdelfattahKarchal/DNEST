<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'description' => $faker->realText(60),
        'email' => $faker->email,
        'name' => $faker->name
    ];
});
