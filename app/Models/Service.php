<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'full_name', 'email', 'phone','profile_pic'
    ];

    protected $dates = ['deleted_at'];

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }

}
