<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_materi', function (Blueprint $table) {
            $table->increments('id');
            $table->text('judul');
            $table->longText('konten');
            $table->unsignedInteger('materi_id');
            $table->foreign('materi_id')->references('id')->on('materi')
                ->onDelete("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_materi');
    }
}
