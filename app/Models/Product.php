<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'service_provider_id', 'rent_cost', 'stocks', 'manual_pdf', 'model', 'brand', 'pickup_address', 'shipping_cost', 'description', 'terms_conditions', 'per_day_price', 'per_hour_price', 'two_day_price', 'weekly_price', 'weekend_price', 'package_1', 'package_1', 'status', 'category_id'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_provider_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function product_images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
