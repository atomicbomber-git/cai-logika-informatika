<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Materi extends Model
{
    protected $table = "materi";
    protected $guarded = [];

    public function sub_materi()
    {
        return $this->hasMany(SubMateri::class);
    }

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function first_sub_materi(): HasOne
    {
        return $this->hasOne(SubMateri::class)
            ->orderBy("urutan");
    }

    public function latihan_soals(): HasMany
    {
        return $this->hasMany(Soal::class)
            ->where("termasuk_quiz", 0)
            ->orderBy("urutan");
    }

    public function quiz_soals(): HasMany
    {
        return $this->hasMany(Soal::class)
            ->where("termasuk_quiz", 1)
            ->orderBy("urutan");
    }

    public function first_soal(): HasOne
    {
        return $this->hasOne(Soal::class)
            ->orderBy("urutan");
    }
}
