<?php

namespace App\Http\Controllers;

use Excel;
use Carbon\Carbon;
use App\Models\Product;
use App\Exports\PendingLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Exports\PhysicaStoreReport;
use App\Models\PhysicalStoreChannel;
use Brian2694\Toastr\Facades\Toastr;



class PhysicalStoreChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewSalesLog()
    {
        
        $today_sold=DB :: table('physical_store_channels')->whereDate('created_at', Carbon::today())->get()->count();

        $date = \Carbon\Carbon::today()->subDays(7);
        $last_7_day_sold = DB:: table('physical_store_channels')->whereDate('created_at', '>=', $date)->get()->count();

        $sell_each_months = DB:: table('physical_store_channels')->whereDate('created_at', '>=', $date)->sum('total_price');
       // return dd($avg_sell_by_months/30);
            $avg_sell_by_months= $sell_each_months/30;
        $product_list= Product:: all()->where('status','existing');
        $all_logs = PhysicalStoreChannel :: all();
        $sold_logs = PhysicalStoreChannel :: all()->where('status','Sold');
        $pending_logs = PhysicalStoreChannel :: all()->where('status','Pending');
         return view('admin.sales.view_physical_store')->with('product_list',$product_list)
                                                       ->with('today_sold', $today_sold)
                                                       ->with('last_7_day_sold', $last_7_day_sold)
                                                       ->with('avg_sell_by_months',  $avg_sell_by_months)
                                                       ->with('all_logs',  $all_logs)
                                                       ->with('sold_logs',  $sold_logs)
                                                       ->with('pending_logs',  $pending_logs);
    }


    public function salesLogData($id)
    {
        $product_id= Product :: find($id);
        return view('admin.sales.sell_physical_store_product')->with('product_id', $product_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveSalesLogData(Request $request,$id)
    {
               //submit form validation

               $request->validate([
                'customer_name'=> 'required|regex:/^[a-zA-Z\s]*$/|min:5|max:30',
                'phone'=> 'required|numeric|min:11|max:15',
                'address'=> 'required|max:50|min:3',
                'product_id'=> 'required',
                'product_name'=> 'required',
                 'category'=> 'required',
                 'unit_price'=> 'required|numeric|min:1',
                 'quantity'=> 'required|numeric|min:1|max:20',
                 'total_price'=> 'required|numeric|min:1',
            ]);
   
  
            //post method to submit form
            $psc= PhysicalStoreChannel :: find($id);

            $psc->customer_name=$request->customer_name;
            $psc->phone=$request->phone;
            $psc->address=$request->address;
            $psc->product_id=$request->product_id;
            $psc->product_name=$request->product_name;
            $psc->category=$request->category;
            $psc->unit_price=$request->unit_price;
            $psc->quantity=$request->quantity;
            $psc->total_price=$request->total_price;
            $psc->payment_type=$request->payment_type;
            $psc->status=$request->status;
            $psc->save();

            $msg='New Product Sold Successfully';
            Toastr::success($msg, 'Success.!'); 
    
            return redirect()->route('ProductController.all_products');
    }


    public function excel_report()
    {
        return Excel :: download( new PhysicaStoreReport,'SalesLog.xlsx');
    }
   
   
    public function pending_excel_report()
    {
       return Excel :: download( new PendingLogs,'PendingLog.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhysicalStoreChannel  $physicalStoreChannel
     * @return \Illuminate\Http\Response
     */
    public function edit(PhysicalStoreChannel $physicalStoreChannel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhysicalStoreChannel  $physicalStoreChannel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhysicalStoreChannel $physicalStoreChannel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhysicalStoreChannel  $physicalStoreChannel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhysicalStoreChannel $physicalStoreChannel)
    {
        //
    }
}
