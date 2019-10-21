<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Solicitud_Info;
use Faker\Generator as Faker;

$factory->define(Solicitud_Info::class, function (Faker $faker) {
    return [
        'id_usuario' => $faker->numberBetween(1, 5),
        'id_emp' => $faker->numberBetween(1, 5),
        'permiso' => null,
        'estado' => true,
    ];
});
