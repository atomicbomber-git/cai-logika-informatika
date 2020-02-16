<?php

use Illuminate\Database\Seeder;
use const Illuminate\Support\Facades\DB;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        $materis = factory(App\Materi::class, 10)
            ->create()
            ->each(function ($materi, $index) {
                $materi->update([
                    "judul" => "Materi " . ($index + 1)
                ]);
            });

        foreach ($materis as $materi) {
            $soals = factory(\App\Soal::class, 10)
                ->create([
                    "materi_id" => $materi->id,
                ]);

            foreach ($soals as $soal) {
                $pilihan_jawabans = factory(\App\PilihanJawaban::class, 4)
                    ->create([ "soal_id" => $soal->id ]);

                $soal->update([
                    "jawaban_benar_id" => $pilihan_jawabans->random()->id,
                ]);
            }
        }

        DB::commit();
    }
}
