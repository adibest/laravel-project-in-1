<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{ url('admin/') }}" class=""><i class="fa fa-home"></i> <span>Home</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-product-hunt"></i> <span>Products</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="{{ route('categories.index') }}" class="">Categories</a></li>
									<li><a href="{{ route('products.index') }}" class="">Items</a></li>
								</ul>
							</div>
						</li>
						<li><a href="" class=""><i class="fa fa-shopping-cart"></i> <span>Orders</span></a></li>{{-- {{ route('orders.index') }} --}}
						<li><a href="{{ route('payments.index') }}" class=""><i class="fa fa-credit-card"></i> <span>Payments</span></a></li>
						<li><a href="{{ route('users.index') }}" class=""><i class="fa fa-users"></i> <span>Users</span></a></li>
					</ul>
				</nav>
			</div>
		</div>