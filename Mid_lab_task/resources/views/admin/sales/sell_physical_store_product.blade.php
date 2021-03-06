@extends('admin.master')

@section('style')

<link rel="stylesheet" href="{{ asset('product/product_style.css') }}">
    
@endsection


@section('content')


<div class="row" >

  <form method="post" >
    @csrf
    <div  class="" > 
      <div class="col-md-12 ">

        <div class="form-group ">
          <label >Customer Name</label>
          <input type="text" class="form-control" name="customer_name" value="{{old('customer_name')}}" placeholder="e.g Mr. Rahim">
         
          @if ($errors->has('customer_name'))
          <span class="text-danger">{{ $errors->first('customer_name') }}</span> 
           @endif
  
        </div>
  
  
  
        <div class="form-group ">
          <label for="exampleInputPassword1">Customer Phone</label>
          <input type="text" class="form-control"  name="phone" value="{{old('phone')}}" placeholder="e.g +88018********">
          
          @if ($errors->has('phone'))
          <span class="text-danger">{{ $errors->first('phone') }}</span>   {{-- bootstrap--}}
           @endif
       
        </div>
  
  
        <div class="form-group ">
          <label for="exampleInputPassword1">Address</label>
          <input type="text" class="form-control" name="address" value="{{old('address')}}" placeholder="e.g mirpur 10,dhaka">
          
          @if ($errors->has('address'))
          <span class="text-danger">{{ $errors->first('address') }}</span>   {{-- bootstrap--}}
           @endif
       
        </div>
      </div>

    </div>

    <div class="row" >
      <div class="col-md-12" >
        <div class="card-body">
          <div class="form-group">
            <label >Product ID</label>
            <input type="text" class="form-control"  name="product_id" value="{{$product_id['id']}}" placeholder="product id">
           
            @if ($errors->has('id'))
            <span class="text-danger">{{ $errors->first('id') }}</span> 
             @endif
    
          </div>
    
    
    
          <div class="form-group">
            <label for="exampleInputPassword1">Product Name</label>
            <input type="text" class="form-control"  name="product_name" value="{{$product_id['product_name']}}" placeholder="product name">
            
            @if ($errors->has('product_name'))
            <span class="text-danger">{{ $errors->first('product_name') }}</span>   {{-- bootstrap--}}
             @endif
         
          </div>
    
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category">
              <option  value="grocery" @if($product_id['category'] == 'grocery') selected @endif >Grocery</option>
              <option  value="medical" @if($product_id['category'] == 'medical') selected @endif >Medical</option>
              <option  value="stationary" @if($product_id['category'] == 'stationary') selected @endif>Stationary</option>
              <option  value="beverage" @if($product_id['category'] == 'beverage') selected @endif>Beverage</option>
              <option  value="cosmetics" @if($product_id['category'] == 'cosmetics') selected @endif>Cosmetics</option>
              <option  value="others" @if($product_id['category'] == 'others') selected @endif>Others</option>
            </select>
          </div>
    
          <div class="form-group">
            <label for="">Unit Price</label>
            <input type="text" class="form-control"  value="{{$product_id['unit_price']}}"placeholder="unit price">
         
            @if ($errors->has('unit_price'))
            <span class="text-danger">{{ $errors->first('unit_price') }}</span>
             @endif
         
          </div>
  
          <div class="form-group">
            <label >Quantity</label>
            <input type="text" class="form-control" name="quantity" value="{{old('quantity')}}" placeholder="e.g 1,2,3">
           
            @if ($errors->has('quantity'))
            <span class="text-danger">{{ $errors->first('quantity') }}</span> 
             @endif
    
          </div>
  
          <div class="form-group">
            <label >Total Price</label>
            <input type="text" class="form-control"  name="total_price" value="{{old('total_price')}}" placeholder="quantity*unit_price">
           
            @if ($errors->has('total_price'))
            <span class="text-danger">{{ $errors->first('total_price') }}</span> 
             @endif
    
          </div>
  
          <div class="form-group">
            <label>Payment Type</label>
            <select class="form-control" name="payment_type">
              <option >Cash</option>
              <option >Card</option>
              <option >Online</option>
    
            </select>
          </div>
    
    
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status">
              <option >Sold</option>
              <option >Pending</option>
    
            </select>
          </div>
    
    
        </div>
        <!-- /.card-body -->
    
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Sell Product</button>
        </div>
  
      </div>
      

    </div>



    
  </form>

</div>
    
@endsection
