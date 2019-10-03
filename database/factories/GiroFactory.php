<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Giro;
use Faker\Generator as Faker;

$factory->define(Giro::class, function (Faker $faker) {
    return [
        'giro' => $faker->unique()->sentence(3),
    ];
});
