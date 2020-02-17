<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubMateri extends Model
{
    protected $table = "sub_materi";
    protected $guarded = [];

    public function materi(): BelongsTo
    {
        return $this->belongsTo(Materi::class);
    }
}
