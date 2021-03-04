@extends('admin.master')
@section('content')

<form method="post" >
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label >Product ID</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="id" value="id" placeholder="product id">
       
        @if ($errors->has('id'))
        <span class="text-danger">{{ $errors->first('id') }}</span> 
         @endif

      </div>



      <div class="form-group">
        <label for="exampleInputPassword1">Product Name</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="product_name" value="product_name" placeholder="product name">
        
        @if ($errors->has('product_name'))
        <span class="text-danger">{{ $errors->first('product_name') }}</span>   {{-- bootstrap--}}
         @endif
     
      </div>

      <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category">
          <option >Grocery</option>
          <option >Medical</option>
          <option >Stationary</option>
          <option >Beverage</option>
          <option >Cosmetics</option>
          <option >Others</option>
        </select>
      </div>

      <div class="form-group">
        <label for="">Unit Price</label>
        <input type="text" class="form-control" id="" name="unit_price" value="unit_price"placeholder="unit price">
     
        @if ($errors->has('unit_price'))
        <span class="text-danger">{{ $errors->first('unit_price') }}</span>
         @endif
     
      </div>

      <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
          <option>upcoming</option>
          <option>existing</option>

        </select>
      </div>


    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save Product</button>
    </div>
  </form>
    
@endsection
