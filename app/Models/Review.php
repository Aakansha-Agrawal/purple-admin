<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['renter_id', 'service_provider_id', 'product_id', 'rating', 'review'];

    public function service_provider()
    {
        return $this->belongsTo(User::class, 'service_provider_id');
    }

    public function end_user()
    {
        return $this->belongsTo(User::class, 'renter_id');
    }

}
