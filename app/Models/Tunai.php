<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tunai extends Model
{
    protected $table = "tunai";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = true;

    public function rekening(): BelongsTo
    {
        return $this->belongsTo(Rekening::class, 'rekening_id', 'id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teller_id', 'id');
    }
}
