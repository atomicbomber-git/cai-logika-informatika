<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = "soal";
    protected $guarded = [];

    public function pilihan_jawaban()
    {
        return $this->hasMany(PilihanJawaban::class);
    }
}
