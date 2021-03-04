@extends('admin.master')
@section('content')

<form method="post" >
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label >Product ID</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="id" value="{{$product_id['id']}}" placeholder="product id">
       
        @if ($errors->has('id'))
        <span class="text-danger">{{ $errors->first('id') }}</span> 
         @endif

      </div>



      <div class="form-group">
        <label for="exampleInputPassword1">Product Name</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="product_name" value="{{$product_id['product_name']}}" placeholder="product name">
        
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
        <input type="text" class="form-control" id="" name="unit_price" value="{{$product_id['unit_price']}}"placeholder="unit price">
     
        @if ($errors->has('unit_price'))
        <span class="text-danger">{{ $errors->first('unit_price') }}</span>
         @endif
     
      </div>

      <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
          <option value="upcoming" @if($product_id['status'] == 'upcoming') selected @endif>upcoming</option>
          <option value="existing" @if($product_id['status'] == 'existing') selected @endif>existing</option>

        </select>
      </div>


    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Update Product</button>
    </div>
  </form>
    
@endsection
