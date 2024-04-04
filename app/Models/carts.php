<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    protected $fillable = [
        'product_id',
        'price',
        'qty',
        'tax',
        'total',
        'discount',
        'Net',
        'user_id',
    ];



    use HasFactory;
}
