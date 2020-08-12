<?php

use Illuminate\Database\Seeder;

class RingkasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Faker\Generator $faker */
        $faker = app(\Faker\Generator::class);

        \App\Informasi::query()->firstOrCreate([
            "id" => \App\Informasi::RINGKASAN,
        ], [
            "konten" => $faker->realText,
        ]);
    }
}
