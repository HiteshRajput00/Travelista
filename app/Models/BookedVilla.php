<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedVilla extends Model
{
    use HasFactory;

    protected $fillable =[
        'booking_status'
    ];

    public function guest()
    {
        return $this->belongsTo(BillingDetails::class,'billing_details_id', 'id');
    }
}
