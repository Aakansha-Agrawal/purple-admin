<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'service_provider_id', 'product_id', 'rating', 'review'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_provider_id');
    }

}
