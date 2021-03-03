@extends('admin.master')

@section('title')
    Admin || Product Management
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Show all existing inventory</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Unit Price</th>
        <th>Product Added</th>
        <th>Product Updated</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>

         {{--@for($i=0; $i< count($list);$i++)--}}
    
    @foreach ($product_list as $value) 
    <tr>
       <td>{{$value['id']}}</td>
       <td>{{$value['product_name']}}</td>
       <td>{{$value['category']}}</td>
       <td>{{$value['unit_price']}}</td>
       <td>{{$value['created_at']}}</td>
       <td>{{$value['updated_at']}}</td>
       <td>
          <a href="{{ route('ProductController.edit', [$value['id']]) }}" class='btn btn-success'>Edit</a>
          <a href="{{ route('ProductController.destroy', [$value['id']]) }}" class='btn btn-danger'>Delete</a>
           <a href="{{ route('ProductController.show', [$value['id']]) }}" class='btn btn-info'>Details</a>
        </td>
    </tr>
    {{-- @endfor--}}
    @endforeach

      </tbody>
     
    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection
