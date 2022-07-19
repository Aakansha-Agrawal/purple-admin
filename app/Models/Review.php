<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['renter_id', 'service_provider_id', 'product_id', 'rating', 'review'];

    public function service()
    {
        return $this->belongsTo(User::class, 'service_provider_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function renter()
    {
        return $this->belongsTo(User::class, 'renter_id');
    }

}
