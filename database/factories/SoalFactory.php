<?php

/** @var Factory $factory */

use App\Materi;
use App\Soal;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Soal::class, function (Faker $faker) {
    return [
        "konten" => $faker->realText(1000),
        "pembahasan" => $faker->realText(1000),
        "termasuk_quiz" => rand(0, 1),
    ];
});
