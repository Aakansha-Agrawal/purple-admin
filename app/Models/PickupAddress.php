<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupAddress extends Model
{
    use HasFactory; 

    protected $fillable = ['address', 'landmark','country','state','city','postal_code'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
