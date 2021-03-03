<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function existing_products()
    {
       $product_list= Product:: all();
        
        return view('admin.product.producttable')->with('product_list',$product_list);
    }


    public function create()
    {
        //get method to view form
    }

    public function store(Request $request)
    {
        //post method to submit form
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
