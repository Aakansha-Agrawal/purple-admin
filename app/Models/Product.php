<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'service_provider_id', 'rent_cost', 'stocks'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_provider_id');
    }
}
