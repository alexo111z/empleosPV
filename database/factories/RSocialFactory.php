<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\RSocial;
use Faker\Generator as Faker;

$factory->define(RSocial::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->sentence(2),
    ];
});
