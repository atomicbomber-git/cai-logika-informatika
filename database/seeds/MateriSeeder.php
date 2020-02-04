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

        factory(App\Materi::class, 10)
            ->create();

        DB::commit();
    }
}
