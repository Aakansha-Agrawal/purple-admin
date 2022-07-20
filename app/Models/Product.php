<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'service_provider_id', 'one_day_price', 'two_day_price', 'three_day_price', 'weekly_price', 'package_1', 'package_2', 'package_1_price', 'package_2_price', 'inventory', 'delivery', 'shipping_cost', 'more_info', 'terms_conditions', 'category_id'];

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

    public function pickup_address()
    {
        return $this->hasOne(PickupAddress::class, 'product_id');
    }
}
