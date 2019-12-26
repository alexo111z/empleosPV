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
        'id_pais' => $faker->numberBetween(1,5),
        'id_estado' => $faker->numberBetween(1,5),
        'id_ciudad' => $faker->numberBetween(1,5),
        'email' => $faker->unique()->companyEmail,
        'telefono' => '322XXXXXXX',//$faker->phoneNumber,
        'contacto' => $faker->name, //nombre de contacto
        'id_social' => $faker->numberBetween(1, 5), //razon social
        'id_giro' => $faker->numberBetween(1, 5),
        'logo' => null,

        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
    ];
});
