<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Municipio;

$factory->define(Municipio::class, function (Faker $faker) {
    return [
        'id_estado' => $faker->numberBetween(1, 5),
        'municipio' => $faker->sentence,
    ];
});
