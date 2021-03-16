<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PhysicalStoreChannel;

class PhysicalStoreChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewSalesLog()
    {
        $product_list= Product:: all()->where('status','existing');
        //$product_list= Product:: latest()->get();
         
         return view('admin.sales.view_physical_store')->with('product_list',$product_list);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhysicalStoreChannel  $physicalStoreChannel
     * @return \Illuminate\Http\Response
     */
    public function show(PhysicalStoreChannel $physicalStoreChannel)
    {
        //
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
