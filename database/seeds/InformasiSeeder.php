<?php

use App\Informasi;
use Illuminate\Database\Seeder;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([Informasi::TENTANG_APLIKASI, Informasi::BANTUAN, Informasi::PENUTUP] as $informasiId) {
            Informasi::query()->firstOrCreate([ "id" => $informasiId,
            ], [
                "konten" => "",
            ]);
        }
    }
}
