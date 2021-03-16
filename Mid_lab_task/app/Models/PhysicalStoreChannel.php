<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalStoreChannel extends Model
{
    use HasFactory;


    protected $fillable = [
        
        'customer_name',
        'phone',
        'address',
        'product_id',
        'product_name',
         'category',
         'unit_price',
         'quantity',
         'total_price',
         'payment_type',
         'status',
     ];



}
