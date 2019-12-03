<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Oferta;
use Faker\Generator as Faker;

$factory->define(Oferta::class, function (Faker $faker) {
    return [
        'id_emp' => $faker->numberBetween(1, 10),
        'titulo' => $faker->sentence(4),
        'd_corta' => $faker->sentence(10),
        'd_larga' => $faker->sentence(20, false),
        'salario'=> $faker->numberBetween(1, 99999),
        't_contrato' => null,
        'vigencia' => $faker->date(),
        'id_pais' => $faker->numberBetween(1, 5),
        'id_estado' => $faker->numberBetween(1, 5),
        'id_ciudad' => $faker->numberBetween(1, 5),
    ];
});
