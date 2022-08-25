<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_email',
        'product_id',
        'quantity',
        'rent',
        'rent_price',
        'package',
        'package_price',
        'delivery',
    ];
    
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
