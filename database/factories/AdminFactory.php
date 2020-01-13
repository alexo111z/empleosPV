<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {

    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('admin'),
        'nombre' => $faker->name,
        'apellido' => $faker->lastName,
        'tipo' => false,

        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
    ];
});
