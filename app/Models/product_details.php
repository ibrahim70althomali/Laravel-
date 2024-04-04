<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_details extends Model
{
 
    protected $fillable = ['color', 'price', 'qty', 'description', 'product_id'];
        


    use HasFactory;
}
