<?php

use App\Informasi;
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

        Informasi::query()->firstOrCreate([
            "id" => Informasi::RINGKASAN,
        ], [
            "konten" => $faker->realText,
        ]);
    }
}
