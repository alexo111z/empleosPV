<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Estado;

$factory->define(Estado::class, function (Faker $faker) {
    return [
        'id_pais' => $faker->numberBetween(1, 5),
        'estado' => $faker->sentence,
    ];
});
