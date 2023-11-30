<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cabang extends Model
{
    protected $table = "cabang";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        "nama"
    ];

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }

    public function rekening(): HasMany {
        return $this->hasMany(Rekening::class);
    }
}
