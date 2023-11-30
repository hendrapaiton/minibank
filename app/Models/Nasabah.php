<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nasabah extends Model
{
    protected $table = "nasabah";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        "nama",
        "ibu",
        "lahir",
        "email",
        "handphone"
    ];

    public function rekening(): BelongsTo
    {
        return $this->belongsTo(Rekening::class, 'rekening_id', 'id');
    }
}
