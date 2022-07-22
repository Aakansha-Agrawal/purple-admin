<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['renter_id', 'service_provider_id', 'equipment_name', 'purchase_date', 'expiry_date', 'price_type', 'total_price', 'package_taken', 'quantity', 'delivery_type', 'retun_date'];

    public function service()
    {
        return $this->belongsTo(User::class, 'service_provider_id');
    }

    public function renter()
    {
        return $this->belongsTo(User::class, 'renter_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
