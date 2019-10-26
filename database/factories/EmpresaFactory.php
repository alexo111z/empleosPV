<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {

    static $password;

    return [
        'nombre' => $faker->company,
        'password' => $password ?: $password = bcrypt('empresa'),
        'rfc' => $faker->unique()->text(13),
        'd_fiscal' => $faker->sentence(5),
        'pais' => $faker->country,
        'estado' => 'Estado X',
        'ciudad' => 'Cidudad Y',
        'email' => $faker->unique()->companyEmail,
        'telefono' => '322XXXXXXX',//$faker->phoneNumber,
        'contacto' => $faker->name, //nombre de contacto
        'id_social' => $faker->numberBetween(1, 5), //razon social
        'id_giro' => $faker->numberBetween(1, 5),
        'logo' => null,
    ];
});
