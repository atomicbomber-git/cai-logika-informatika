<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PilihanJawaban extends Model
{
    protected $table = "pilihan_jawaban";
    protected $guarded = [];

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
}
