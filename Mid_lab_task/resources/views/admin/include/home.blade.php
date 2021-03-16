@extends('admin.master')

@section('title')
    Admin || Dashboard
@endsection

@section('content_header_name')
      Deshboard
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
                  <h6>Today Sold: {{$today_sold}}</h6>
                  <h6>Last Week Sold:{{$last_7_day_sold}}</h6>
  
                  <p>Physical Store</p>
                </div>
                <div class="icon">
                  <i class="fas fa-store"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h6>Today Sold: {{$smc_today_sold}}</h6>
                  <h6>Last Week Sold: {{$smc_last_7_day_sold}}</h6>
  
                  <p>Social Media Store</p>
                </div>
                <div class="icon">
                  <i class="fab fa-facebook-square"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
                 <!-- ./col -->
            <div class="col-lg-3 col-6">
                          <!-- small box -->
                    <div class="small-box bg-secondary ">
                            <div class="inner">
                              <h6>Today Sold: {{$ec_today_sold}}</h6>
                              <h6>Last Week Sold: {{$ec_last_7_day_sold}}</h6>
              
                              <p>Ecommerce Store</p>
                            </div>
                            <div class="icon">
                              <i class="fab fa-aws"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
             </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-info">
                            <div class="inner">
                              <h3>{{$existing_total_product}}</h3>
              
                              <p>Existing products</p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-cubes"></i>
                            </div>
                            <a href="{{route('ProductController.existing_products')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$upcoming_total_product}}</h3>
              
                              <p>Upcoming products</p>
                            </div>
                            <div class="icon">
                              <!--<i class="ion ion-stats-bars"></i>-->
                              <i class="fas fa-people-carry"></i>
                            </div>
                            <a href="{{route('ProductController.upcoming_products')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>


              
          </div>

    </div><!-- /.container-fluid -->
</div>



@endsection
