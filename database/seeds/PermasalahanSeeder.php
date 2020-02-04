<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermasalahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        factory(\App\Permasalahan::class, 100)
            ->create();

        DB::commit();
    }
}
