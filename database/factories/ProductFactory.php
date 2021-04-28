<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat(20000,10),
        'new_price' => $faker->randomFloat(4000,10),
        'description'=>$faker->realText(80),
        'quantity' => $faker->randomNumber(3),
        'path_small_1' => $faker->imageUrl(438,438),
        'path_small_2' => $faker->imageUrl(438,438),
    ];
});
