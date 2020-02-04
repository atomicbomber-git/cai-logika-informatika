<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Permasalahan;
use Faker\Generator as Faker;

$factory->define(Permasalahan::class, function (Faker $faker) {
    return [
        "judul" => $faker->sentence,
        "teks" => $faker->paragraph
    ];
});
