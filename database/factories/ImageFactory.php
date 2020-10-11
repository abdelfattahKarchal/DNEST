<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'path_small' => $faker->imageUrl(438,438),
        'path_large' => $faker->imageUrl(1000,1000),
    ];
});
