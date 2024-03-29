<aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{asset('storage/'. $toko->logo)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{$toko->name}}</span>
      </a>
      
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
          </div>
        </div>
  
        <!-- SidebarSearch Form -->
        {{--  <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>  --}}
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="{{route('dashboard.index')}}" class="nav-link {{ Request::routeIs('dashboard.index') ? 'active' : '' }}"" >
                <i class="fas fa-tachometer-alt" style="color:#7579e7; margin-right: 10px"></i>
                <p>
                  Dashboard
                  {{--  <span class="right badge badge-danger">New</span>  --}}
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('user.index')}}" class="nav-link {{ Request::routeIs('user.index') ? 'active' : '' }}" >
                <i class="fas fa-users" style="color: orange; margin-right: 10px"></i>
                <p>
                  User
                  {{--  <span class="right badge badge-danger">New</span>  --}}
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('product.index')}}" class="nav-link {{ Request::routeIs('product.index') ? 'active' : '' }}">
                <i class="fas fa-box-open" style="color: #cc0e74;margin-right: 10px"></i>
                <p>
                  Product
                  {{--  <span class="right badge badge-danger">New</span>  --}}
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('category.index')}}" class="nav-link {{ Request::routeIs('category.index') ? 'active' : '' }}">
                <i class="fas fa-align-left" style="color: #19d3da;margin-right: 10px"></i>
                <p>
                  Category
                  {{--  <span class="right badge badge-danger">New</span>  --}}
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('order.index')}}" class="nav-link {{ Request::routeIs('order.index') ? 'active' : '' }}">
                <i class="fas fa-luggage-cart" style="color: #7039ee;margin-right: 10px"></i>
                <p>
                  Order
                  {{--  <span class="right badge badge-danger">New</span>  --}}
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('toko')}}" class="nav-link {{ Request::routeIs('toko') ? 'active' : '' }}">
                <i class="fas fa-laptop-house" style="color: #39ee81;margin-right: 10px"></i>
                <p>
                  Toko
                  {{--  <span class="right badge badge-danger">New</span>  --}}
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('bank.index')}}" class="nav-link {{ Request::routeIs('bank.index') ? 'active' : '' }}">
                <i class="fas fa-money-check-alt" style="color: #da19d0; margin-right: 10px"></i>
                <p>
                   Bank
                  {{--  <span class="right badge badge-danger">New</span>  --}}
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('auth.logout')}}" onclick="return confirm('Logout Sekarang?')" class="nav-link ">
                <i class="fas fa-sign-out-alt" style="color: #94b4a4;margin-right: 10px"></i>
                <p>
                  Log Out
                  {{--  <span class="right badge badge-danger">New</span>  --}}
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>