@extends('admin.master')

@section('title')
    Admin || Product Management
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Show all Upcoming inventory</h3>
  </div>
   

    <button type="button" class="btn btn-block btn-primary">Add Product</button>


  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Unit Price</th>
       <!-- <th>Status</th>-->
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
       <!--<td>{{$value['status']}}</td>-->
       <td>{{$value['created_at']}}</td>
       <td>{{$value['updated_at']}}</td>
       <td class="text-centre">
          <a href="{{ route('ProductController.edit_upcoming', [$value['id']]) }}" class='btn btn-success' data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
          
          <button class="btn btn-danger waves-effect" type="button" onclick="deleteFunc({{$value['id']}})">
            
            <i class="fas fa-trash-alt"></i> 
            
          </button>

          <form method="post" id="delete-form-{{$value['id']}}" action="{{route('ProductController.destroy_upcoming',[$value['id']])}}" 
          
          style="display: none;">
          
          @csrf

          @method('DELETE')

          </form>
          
           <a href="{{ route('ProductController.show', [$value['id']]) }}" class='btn btn-info' data-toggle="tooltip" data-placement="top" title="Details"><i class="fas fa-info-circle"></i></a>
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
