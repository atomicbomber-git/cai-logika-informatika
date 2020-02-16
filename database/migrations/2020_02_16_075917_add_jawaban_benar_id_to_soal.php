<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJawabanBenarIdToSoal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soal', function (Blueprint $table) {
            $table->unsignedInteger('jawaban_benar_id')->nullable()->index();
            $table->foreign('jawaban_benar_id')->references('id')->on('pilihan_jawaban');
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
            $table->dropForeign(["jawaban_benar_id"]);
            $table->dropColumn("jawaban_benar_id");
        });
    }
}
