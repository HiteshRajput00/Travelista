<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaLocation extends Model
{
    use HasFactory;
    public function villa()
    {
        return $this->belongsTo(Villas::class);
    }
}
