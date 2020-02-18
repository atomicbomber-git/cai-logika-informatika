<?php

use App\Materi;
use App\PilihanJawaban;
use App\Soal;
use App\SubMateri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriSeeder extends Seeder
{
    const N_SUB_MATERI_PER_MATERI = 7;
    const N_MATERI = 10;
    const N_SOAL_PER_MATERI = 10;
    const N_PILIHAN_JAWABAN_PER_SOAL = 4;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        $materis = factory(App\Materi::class, self::N_MATERI)
            ->make()
            ->each(function (Materi $materi, $index) {
                $materi->forceFill([
                    "judul" => "Materi " . ($index + 1),
                ])->save();
            });

        foreach ($materis as $materi) {
            factory(App\SubMateri::class, self::N_SUB_MATERI_PER_MATERI)
                ->make([
                    "materi_id" => $materi->id,
                ])
                ->each(function (SubMateri $sub_materi, $index) {
                    $sub_materi->forceFill([
                        "judul" => "Sub Materi " . ($index + 1),
                        "urutan" => ($index + 1),
                    ])->save();
                });

            $soals = factory(Soal::class, self::N_SOAL_PER_MATERI)
                ->make([
                    "materi_id" => $materi->id,
                ])
                ->each(function (Soal $soal, $index) {
                    $soal->forceFill([
                        "urutan" => ($index + 1),
                    ])->save();
                });

            foreach ($soals as $soal) {
                $pilihan_jawabans = factory(PilihanJawaban::class, self::N_PILIHAN_JAWABAN_PER_SOAL)
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
