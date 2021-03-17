<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

     public static function getSalesLog()
     {
        
        $date = \Carbon\Carbon::today()->subDays(30);

        $data = DB :: table('physical_store_channels')->whereDate('created_at', '>=', $date)->where('status','Sold')->get()->toArray();
          return $data;
     }

     public static function getPendingLog()
     {
        
        $date = \Carbon\Carbon::today()->subDays(30);

        $data = DB :: table('physical_store_channels')->whereDate('created_at', '>=', $date)->where('status','Pending')->get()->toArray();
          return $data;
     }



}
