<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentario;
use Faker\Generator as Faker;

$factory->define(Comentario::class, function (Faker $faker) {
    return [
        'id_usuario' => $faker->numberBetween(1, 10),
        'id_emp' => $faker->numberBetween(1, 10),
        'coment' => $faker->sentence(20),
        'fecha' => now(),
    ];
});
