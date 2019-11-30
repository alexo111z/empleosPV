<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\RelacionTag;
use Faker\Generator as Faker;

$factory->define(RelacionTag::class, function (Faker $faker) {
    return [
        //configurar para poner tagas en ofertas, dejar asi para usuarios, (opcion: configurar en el seeder)
        'id_usuario' => $faker->numberBetween(1, 5),
        'id_oferta' => $faker->numberBetween(1, 5),

        //tag aleatorio
        'id_tag' => $faker->numberBetween(1, 5),
    ];
});
