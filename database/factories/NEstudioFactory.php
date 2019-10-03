<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NEstudio;
use Faker\Generator as Faker;

$factory->define(NEstudio::class, function (Faker $faker) {
    return [
        'nivel' => $faker->unique()->sentence(1, false),
    ];
});
