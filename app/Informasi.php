<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Informasi extends Model
{
    protected $table = "informasi";
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $guarded = [];

    const RINGKASAN = "RINGKASAN";
    const KONTAK = "KONTAK";
    const BANTUAN = "BANTUAN";
    const TENTANG_APLIKASI = "TENTANG_APLIKASI";
    const PENUTUP = "PENUTUP";

    public function getNameAttribute()
    {
        return str_replace("_", " ",  Str::title($this->id));

    }
}
