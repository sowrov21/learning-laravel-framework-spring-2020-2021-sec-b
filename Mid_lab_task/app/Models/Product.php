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
        'vendor_id',
    ];



    public function vendors()
    {
        return $this->belongsTo('App\Models\Vendor');
    }
}
