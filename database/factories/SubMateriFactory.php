<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SubMateri;
use Faker\Generator as Faker;

$factory->define(SubMateri::class, function (Faker $faker) {
    $genContent = function ($paragraphCount = 10) use ($faker) {
        $result = "";

        $result .= "<article>";
        for ($i = 0; $i < $paragraphCount; ++$i) {
            $result .= "<p> {$faker->paragraph} </p>";
        }
        $result .= "</article>";

        return $result;
    };

    return [
        "konten" => $genContent(),
    ];
});
