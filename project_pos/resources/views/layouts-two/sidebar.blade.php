<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{ url('admin/') }}" class="{{ Request::is('admin') ? 'active' : '' }}"><i class="fa fa-home"></i> <span>Home</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-product-hunt"></i> <span>Products</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="{{ route('categories.index') }}" class="{{ Request::is('admin/categories') || Request::is('admin/categories/*') ? 'active' : '' }}">Categories</a></li>
									<li><a href="{{ route('products.index') }}" class="{{ Request::is('admin/products') || Request::is('admin/products/*') ? 'active' : '' }}">Items</a></li>
								</ul>
							</div>
						</li>
						<li><a href="{{ route('orders.index') }}" class="{{ Request::is('admin/orders') || Request::is('admin/orders/*') ? 'active' : '' }}"><i class="fa fa-shopping-cart"></i> <span>Orders</span></a></li>
						<li><a href="{{ route('payments.index') }}" class="{{ Request::is('admin/payments') || Request::is('admin/payments/*') ? 'active' : '' }}"><i class="fa fa-credit-card"></i> <span>Payments</span></a></li>
						<li><a href="{{ route('users.index') }}" class="{{ Request::is('admin/users') || Request::is('admin/users/*') ? 'active' : '' }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
					</ul>
				</nav>
			</div>
		</div>