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
                ])
                ->each(function ($soal, $index) {
                    $soal->update([ "konten" => "Soal " . ($index + 1) ]);
                });

            foreach ($soals as $soal) {
                $pilihan_jawabans = factory(\App\PilihanJawaban::class, 4)
                    ->create([ "soal_id" => $soal->id ])
                    ->each(function ($pilihan_jawaban, $index) {
                        $pilihan_jawaban->update([ "konten" => "Pilihan Jawaban " . ($index + 1) ]);
                    });

                $soal->update([
                    "jawaban_benar_id" => $pilihan_jawabans->random()->id,
                ]);
            }
        }

        DB::commit();
    }
}
