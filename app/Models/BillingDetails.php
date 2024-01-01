<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingDetails extends Model
{
    use HasFactory;

    protected $fillable = [
     'name',
     'email',
     'Contact_number'
    ];

    public function bookedvillas()
    {
        return $this->hasMany(BookedVilla::class,'billing_details_id','id');
    }
}
