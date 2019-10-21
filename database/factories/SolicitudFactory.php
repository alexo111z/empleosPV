<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Solicitud;
use Faker\Generator as Faker;

$factory->define(Solicitud::class, function (Faker $faker) {
    return [
        'id_oferta' => $faker->numberBetween(1, 5),
        'id_usuario' => $faker->numberBetween(1, 5),
        //'estado' -> true por defecto en la tabla
    ];
});
