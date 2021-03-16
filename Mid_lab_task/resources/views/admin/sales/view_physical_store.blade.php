@extends('admin.master')

@section('title')
    Admin || Product Management
@endsection

@section('content')

<div class="content">
  <div class="container-fluid">

      <div class="row">

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h6>Today Sold: 44</h6>
                <h6>Last Week Sold: 44</h6>

                <p>Physical Store</p>
              </div>
              <div class="icon">
                <i class="fas fa-store"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> 
        </div>

  </div><!-- /.container-fluid -->
</div>





<div class="card">
  <div class="card-header">
    <h2 class="card-title"> <span class="badge badge-info">Note:</span>  Please, click <span class="badge badge-success" >+</span>  icon to select and sell a product. Use search to find specific product. </h2>
  </div>
   

  <div class="text-right">
    <a href="{{route('ProductController.add_product_form')}}" ><button class="btn btn-primary waves-effect">Add New Product</button></a> 
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
          <a href="{{ route('PhysicalStoreChannelController.salesLogData', [$value['id']]) }}" class='btn btn-success' data-toggle="tooltip" data-placement="top" title="Add Product"><i class="fas fa-plus"></i></a>
          

          
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
