<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Avatar::create( auth()->user()->name )->setDimension(100)->setFontSize(50)->toBase64() }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ Request::is('admin/home') ? 'active' : '' }}">
          <a href="{{ url('admin/home') }}">
            <i class="fa fa-home"></i> <span>Home</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>
        {{-- <li class="treeview {{ Request::is('admin/categories') || Request::is('admin/products') ? 'active menu-open' : '' }}">
          <a href="#">
            <i class="fa fa-tags"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('/admin/categories') ? 'active' : '' }}" ><a href="{{ route('categories.index') }}"><i class="fa fa-circle-o"></i> Categories</a></li>
            <li class="{{ Request::is('/admin/products') ? 'active' : '' }}"><a href="{{ route('products.index') }}"><i class="fa fa-circle-o"></i> Items</a></li>
          </ul>
        </li> --}}
        <li class="{{ Request::is('admin/categories') || Request::is('admin/categories/*') ? 'active' : '' }}">
          <a href="{{ route('categories.index') }}">
            <i class="fa fa-pie-chart"></i> <span>Categories</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        <li class="{{ Request::is('admin/products') || Request::is('admin/products/*') ? 'active' : '' }}">
          <a href="{{ route('products.index') }}">
            <i class="fa fa-folder-open"></i> <span>Items</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        <li class="{{ Request::is('admin/orders') || Request::is('admin/orders/*') ? 'active' : '' }}">
          <a href="{{ route('orders.index') }}">
            <i class="fa fa-shopping-cart"></i> <span>Orders</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        <li class="{{ Request::is('admin/payments') || Request::is('admin/payments/*') ? 'active' : '' }}">
          <a href="{{ route('payments.index') }}">
            <i class="fa fa-credit-card"></i> <span>Payments</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>
        <li class="{{ Request::is('admin/users') || Request::is('admin/users/*') ? 'active' : '' }}">
          <a href="{{ route('users.index') }}">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>
        <li class="{{ Request::is('admin/filters') || Request::is('admin/filters/*') ? 'active' : '' }}">
          <a href="{{ route('filters.index') }}">
            <i class="fa fa-book"></i> <span>Reports</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>