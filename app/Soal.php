<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Soal extends Model
{
    protected $table = "soal";
    protected $guarded = [];

    public function materi(): BelongsTo
    {
        return $this->belongsTo(Materi::class);
    }

    public function pilihan_jawaban(): HasMany
    {
        return $this->hasMany(PilihanJawaban::class);
    }

    public function jawaban_benar(): BelongsTo
    {
        return $this->belongsTo(PilihanJawaban::class);
    }
}
