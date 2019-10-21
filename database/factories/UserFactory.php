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
        //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'password' => $password ?: $password = bcrypt('secret'),

        'nombre' => $faker->name,
        'apellido' => $faker->lastName,
        'nacimiento' => $faker->date('Y-m-d'),
        'genero' => true,
        'id_estudios' => 1,
        'id_area' => $faker->numberBetween(1, 5),
        'edad' => $faker->numberBetween(18,80),

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
