<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),

        'nombre' => $faker->name,
        'apellido' => $faker->lastName,
        'nacimiento' => $faker->date('Y-m-d'),
        'genero' => true,
        'id_estudios' => 1,
        'id_area' => $faker->numberBetween(1, 5),
        'edad' => $faker->numberBetween(18,80),

//        'pais' => $faker->country,
//        'estado' => 'Estado1',
//        'telefono' => '322XXXXXXX',
//        'conocimientos' => 'Prueba. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',


        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
        'coment' => False,
    ];
});
    /**
    $table->dateTime('nacimiento');
    $table->boolean('genero');   colocarlo en el seed
    $table->bigInteger('id_estudios')->unsigned(); colocarlo en el seed
    $table->integer('edad');
    */
