<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Renter extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $fillable = [
        'full_name', 'email', 'phone', 'profile_pic', 'password', 'role', 'payment_status'
    ];

    protected $dates = ['deleted_at'];
}
