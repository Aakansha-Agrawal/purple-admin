<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['renter_id', 'total_price', 'quantity', 'status'];

    public function renter()
    {
        return $this->belongsTo(User::class, 'renter_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
