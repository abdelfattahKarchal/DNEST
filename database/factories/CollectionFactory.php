<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Collection;
use Faker\Generator as Faker;

$factory->define(Collection::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image1' => $faker->imageUrl(438,438),
        'image2' => $faker->imageUrl(438,438),
        'description' => $faker->realText(67)
    ];
});
