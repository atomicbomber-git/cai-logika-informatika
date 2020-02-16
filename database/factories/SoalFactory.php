<?php

/** @var Factory $factory */

use App\Materi;
use App\Soal;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Soal::class, function (Faker $faker) {
    return [
        "konten" => $faker->paragraph,
        "materi_id" => factory(Materi::class)->create()->id,
    ];
});
