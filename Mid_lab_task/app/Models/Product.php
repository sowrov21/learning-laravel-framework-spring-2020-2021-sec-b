<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;



    protected $fillable = [
       'product_name',
        'category',
        'unit_price',
        'status',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];
}
