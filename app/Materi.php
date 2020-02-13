<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = "materi";
    protected $guarded = [];

    public function sub_materi()
    {
        return $this->hasMany(SubMateri::class);
    }
}
