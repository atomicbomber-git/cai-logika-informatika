<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Materi;
use Faker\Generator as Faker;

$factory->define(Materi::class, function (Faker $faker) {
    return [
        "judul" => $faker->sentence,
    ];
});
