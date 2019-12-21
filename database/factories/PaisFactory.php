<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Pais;

$factory->define(Pais::class, function (Faker $faker) {
    return [
        'pais' => $faker->sentence(3, true),
    ];
});
