<?php

namespace App\Exports;

use App\Models\PhysicalStoreChannel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PendingLogs implements FromCollection,WithHeadings
{
    
    
    public function headings():array
    {
        return [
            'id',
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
             'created_at',
             'updated_at',
        ];
    }
    
    
    
    
    
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       // return PhysicalStoreChannel::all();
       return  collect(PhysicalStoreChannel:: getPendingLog());
    }
}
