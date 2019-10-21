<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Calificacion;
use Faker\Generator as Faker;

$factory->define(Calificacion::class, function (Faker $faker) {
    return [
        'id_usuario' => $faker->numberBetween(1, 10),
        'id_emp' => $faker->numberBetween(1, 10),
        'califi' => $faker->randomFloat(1,1,5),
    ];
});
