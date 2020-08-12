<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTermasukQuizAndPembahasanFieldToSoal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soal', function (Blueprint $table) {
            $table->boolean('termasuk_latihan')->default(0)->index();
            $table->text('pembahasan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soal', function (Blueprint $table) {
            $table->dropColumn('termasuk_latihan');
            $table->dropColumn('pembahasan');
        });
    }
}
