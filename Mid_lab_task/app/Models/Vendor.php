<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;



    protected $fillable = [
        'vendor_name',

     ];
 
 
     protected $hidden = [
         'password',
         'remember_token',
     ];

     public function products()
     {
         return $this->hasMany('App\Models\Product');
     }
}
