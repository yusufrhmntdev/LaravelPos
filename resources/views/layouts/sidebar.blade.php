 <div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
       <img src="{{asset('assets/img/r1.png')}}" width="35%" class="img-circle">
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">YR <span>pos</span></a>
      </div>
      <ul class="sidebar-menu">
        <li class="@if(Request::segment(1) == 'dashboard') active @endif">
          <a class="nav-link" href="{{url('/dashboard')}}"><i class="fa fa-fire"></i> <span>Dashboard</span></a>
        </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Master Data</span></a>
            <ul class="dropdown-menu">
              <li class="@if(Request::segment(1) == 'customer') active @endif">
                <a class="nav-link" href="{{route('customer.index')}}"><i class="fa fa-users"></i> <span>Customer</span></a>
              </li>
              <li class="@if(Request::segment(1) == 'supplier') active @endif">
                <a class="nav-link" href="{{route('supplier.index')}}"><i class="fa fa-truck"></i> <span>Supplier</span></a>
              </li>
            
            
            </ul>
          </li>
        
      <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fab fa-product-hunt"></i> <span>Product</span></a>
            <ul class="dropdown-menu">
              <li class="@if(Request::segment(1) == 'unit') active @endif">
                <a class="nav-link" href="{{route('unit.index')}}"><i class="fab fa-osi"></i> <span>Unit</span></a>
              </li>
              <li class="@if(Request::segment(1) == 'category') active @endif">
                <a class="nav-link" href="{{route('category.index')}}"><i class="fab fa-osi"></i> <span>Category</span></a>
              </li>
              <li class="@if(Request::segment(1) == 'item') active @endif">
                <a class="nav-link" href="{{route('item.index')}}"><i class="fab fa-osi"></i> <span>Item</span></a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-comment-dollar"></i> <span>Transactions</span></a>
            <ul class="dropdown-menu">
              <li class="@if(Request::segment(1) == 'sale') active @endif">
                <a class="nav-link" href="{{route('sale.index')}}"><i class="fa fa-cart-plus"></i> <span>Sale</span></a>
              </li>
              <li class="@if(Request::segment(1) == 'stockIn') active @endif">
                <a class="nav-link" href="{{route('in.index')}}"><i class="fa fa-plus"></i> <span>Stock In</span></a>
              </li>
              <li class="@if(Request::segment(1) == 'stockOut') active @endif">
                <a class="nav-link" href="{{route('out.index')}}"><i class="fa fa-minus"></i> <span>Stock Out</span></a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fa fa-print"></i> <span>Report</span></a>
            <ul class="dropdown-menu">
              <li class="@if(Request::segment(1) == 'report') active @endif">
                <a class="nav-link" href="{{route('report.index')}}"><i class="fa fa-file-invoice"></i> <span>Cetak Invoice</span></a>
              </li>
            </ul>
          </li>
          <li class="menu-header">Stisla</li>
          
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fa fa-phone"></i>Whatsapp Me
            </a>
          </div>
        </ul>

        
    </aside>
  </div>