<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PilihanJawaban;
use Faker\Generator as Faker;

$factory->define(PilihanJawaban::class, function (Faker $faker) {
    return [
        "konten" => $faker->paragraph,
    ];
});
