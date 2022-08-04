<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'booking_id',
        'product_id',
        'renter_id',
        'service_provider_id',
        'total_amount',
        'admin_amount',
        'service_provider_amount',
        'payment_mode',
        'end_user_status',
        'service_provider_status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function renter()
    {
        return $this->belongsTo(User::class, 'renter_id');
    }

    public function service_provider()
    {
        return $this->belongsTo(User::class, 'service_provider_id');
    }
}

