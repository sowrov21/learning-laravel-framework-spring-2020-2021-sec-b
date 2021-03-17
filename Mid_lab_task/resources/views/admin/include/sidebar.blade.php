<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{-- {{ route('admin.dashboard') }} --}}" class="brand-link">
    <img src="{{ asset('source/back') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">Admin Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('source/back/default.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{'Hi !'}} {{ Auth::user()->full_name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon text-primary class
            with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon text-primary fas fa-th"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-hand-holding-usd"></i>
                <p>
                  Sales Management
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-store-alt"></i>
                    <p>
                      Physical Store
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>

                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="{{route('PhysicalStoreChannelController.viewSalesLog')}}" class="nav-link">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Sales Log</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/flot.html" class="nav-link">
                    <i class="fas fa-bullhorn"></i>
                    <p>Social Media</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/inline.html" class="nav-link">
                    <i class="fab fa-opencart"></i>
                    <p>Ecommerce Web App</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-sitemap"></i>
                  <p>
                    Product Management
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('ProductController.add_product_form')}}" class="nav-link">
                      <i class="far fa-plus-square"></i>
                      <p>Add Product</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('ProductController.existing_products')}}" class="nav-link">
                      <i class="fas fa-landmark"></i>
                      <p>Existing Products</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('ProductController.upcoming_products')}}" class="nav-link">
                      <i class="fas fa-spinner fa-spin"></i>
                      <p>Upcoming Products</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('ProductController.all_products')}}" class="nav-link">
                      <i class="far fa-list-alt"></i>
                      <p>All Products</p>
                    </a>
                  </li>

                </ul>
              </li>


              <li class="nav-item">
              
                  <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                        {{ __('Signout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
