<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Villas extends Model
{
    use Searchable;
    use HasFactory;

    public function Location()
    {
        return $this->hasOne(VillaLocation::class,'villa_id','id');
    }
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($model) {
            $model->searchable();
        });

        static::deleted(function ($model) {
            $model->unsearchable();
        });
    }

    public function bookings()
{
    return $this->hasMany(BookedVilla::class,'villa_id','id');
}
}
