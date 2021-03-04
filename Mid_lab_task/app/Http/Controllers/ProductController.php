<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;




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
       $product_list= Product:: all()->where('status','existing');
       //$product_list= Product:: latest()->get();
        
        return view('admin.product.existing_producttable')->with('product_list',$product_list);
    } 


    public function upcoming_products()
    {
       $product_list= Product:: all()->where('status','upcoming');
       //$product_list= Product:: latest()->get();
        
        return view('admin.product.upcoming_producttable')->with('product_list',$product_list);
    } 


   public function all_products()
    {
       //$product_list= Product:: all();
       $product_list= Product:: latest()->get();
        
        return view('admin.product.all_producttable')->with('product_list',$product_list);
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


    public function edit_existing(Product $product,$id)
    {
        $product_id= Product :: find($id);
        return view('admin.product.editproduct')->with('product_id', $product_id);
    }


    public function update_existing(Request $request, $id)     //Product $product
    {
           
        $request->validate([
            'id' => 'required|numeric',
            'product_name' => 'required|alpha|min:5|max:30',
            'category' => 'required',
            'unit_price' => 'required|numeric|min:1',
            'status' => 'required',
        ]);

/*         $validator = Validator::make($request->all(), [
            'id' => 'required',
            'product_name' => 'required|alpha|min:5|max:30',
            'category' => 'required',
            'unit_price' => 'required|numeric|min:1',
            'status' => 'required',
        ])->validate(); */

       /*  $validator = Validator::make($request->all(), [
            'id' => 'required',
            'product_name' => 'required|alpha|min:5|max:30',
            'category' => 'required',
            'unit_price' => 'required|numeric|min:1',
            'status' => 'required',
        ]);
       
        $errors = $validator->errors();

        foreach ($errors->all() as $message) {

            Toastr::error($message, 'Error');
        } */
           
           $product= Product :: find($id);

           $product->id = $request->id;
           $product->product_name=$request->product_name;
           $product->category=$request->category;
           $product->unit_price=$request->unit_price;
           $product->status=$request->status;
           
           $product->save();
           $msg='Product Added Successfully';
           Toastr::success($msg, 'Success.!'); 

           return redirect('/system/product_management/existing_products');

           
    }

    
    public function destroy_existing(Product $product,$id)
    {
       //return $id;
        Product :: find($id)->delete();
        $msg='Deleted Successfully';
        Toastr::success($msg, 'Success.!'); 

        return redirect()->back();
    }

//Upcoming section


public function edit_upcoming(Product $product,$id)
{
    $product_id= Product :: find($id);
    return view('admin.product.editproduct')->with('product_id', $product_id);
}


public function update_upcoming(Request $request, $id)     //Product $product
{
       
    $request->validate([
        'id' => 'required|numeric',
        'product_name' => 'required|alpha|min:5|max:30',
        'category' => 'required',
        'unit_price' => 'required|numeric|min:1',
        'status' => 'required',
    ]);

/*         $validator = Validator::make($request->all(), [
        'id' => 'required',
        'product_name' => 'required|alpha|min:5|max:30',
        'category' => 'required',
        'unit_price' => 'required|numeric|min:1',
        'status' => 'required',
    ])->validate(); */

   /*  $validator = Validator::make($request->all(), [
        'id' => 'required',
        'product_name' => 'required|alpha|min:5|max:30',
        'category' => 'required',
        'unit_price' => 'required|numeric|min:1',
        'status' => 'required',
    ]);
   
    $errors = $validator->errors();

    foreach ($errors->all() as $message) {

        Toastr::error($message, 'Error');
    } */
       
       $product= Product :: find($id);

       $product->id = $request->id;
       $product->product_name=$request->product_name;
       $product->category=$request->category;
       $product->unit_price=$request->unit_price;
       $product->status=$request->status;
       
       $product->save();
       $msg='Product Added Successfully';
       Toastr::success($msg, 'Success.!'); 

       return redirect('/system/product_management/upcoming_products');

       
}


public function destroy_upcoming(Product $product,$id)
{
   //return $id;
    Product :: find($id)->delete();
    $msg='Deleted Successfully';
    Toastr::success($msg, 'Success.!'); 

    return redirect()->back();
}


//All Product section



public function edit_all(Product $product,$id)
{
    $product_id= Product :: find($id);
    return view('admin.product.editproduct')->with('product_id', $product_id);
}


public function update_all(Request $request, $id)     //Product $product
{
       
    $request->validate([
        'id' => 'required|numeric',
        'product_name' => 'required|alpha|min:5|max:30',
        'category' => 'required',
        'unit_price' => 'required|numeric|min:1',
        'status' => 'required',
    ]);

   
       $product= Product :: find($id);

       $product->id = $request->id;
       $product->product_name=$request->product_name;
       $product->category=$request->category;
       $product->unit_price=$request->unit_price;
       $product->status=$request->status;
       
       $product->save();
       $msg='Product Added Successfully';
       Toastr::success($msg, 'Success.!'); 

       return redirect('/system/product_management/existing_products');

       
}


public function destroy_all(Product $product,$id)
{
   //return $id;
    Product :: find($id)->delete();
    $msg='Deleted Successfully';
    Toastr::success($msg, 'Success.!'); 

    return redirect()->back();
}


}
