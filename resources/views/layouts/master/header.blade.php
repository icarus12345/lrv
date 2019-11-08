<!-- Header Area Start -->
<div class="header-area">

	<!-- Header Top Start -->
	<div class="header-top">
		<div class="container">
			<div class="row justify-content-lg-between">
			
				<!--Left Start-->
				<div class="col-lg-auto d-none d-lg-block">
					<div class="header-text">
						<p>Default Welcome GID!</p>
					</div>
				</div><!--Left End-->
				
				<!--Right Start-->
				<div class="col-lg-auto col-12 d-flex justify-content-center">
					<ul class="header-top-menu">
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">VND</a>
							<ul class="dropdown-menu header-top-dropdown">
								<li><a href="#">Dollar (USD)</a></li>
								<li><a href="#">Việt Nam Đồng (VND)</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							{{__("common.locales")[\Session::get('locale')]}}
							</a>
							<ul class="dropdown-menu header-top-dropdown">
								<li><a href="/locale/en">English</a></li>
								<li><a href="/locale/vi">Tiếng Việt</a></li>
							</ul>
							
						</li>
						
						<!--<li><a href="wishlist.html"><i class="fa fa-heart"></i>My wishlist</a></li>-->
						@auth
						<li><a href="/account"><i class="fa fa-user"></i>My account</a></li>
						@else
							<li><a href="{{ route('login') }}"><i class="fa fa-unlock-alt"></i>Login</a></li>
							@if (Route::has('register'))
							<li><a href="{{ route('register') }}"><i class="fa fa-unlock-alt"></i>Register</a></li>
							@endif
						@endauth
						<li><a href="checkout.html"><i class="fa fa-share-square-o"></i>Check out</a></li>
					</ul>
				</div><!--Right End-->
				
			</div>
		</div>
	</div>
	<!-- Header Top End -->
	
	<!-- Header Bottom Start -->
	<div class="header-bottom">
		<div class="container">
			<div class="row position-relative justify-content-between align-items-center">
				<!--Logo Start-->
				<div class="header-logo col-auto">
					<a href="home.html"><img src="/assets/themes/gid/img/logo.png" alt=""></a>
				</div>
				<!--Logo End-->
				<!--Main Menu Start-->
				<div class="position-static col-auto d-none d-lg-block">
					<nav class="main-menu">
						<ul>
							<li><a href="/home">{{__('common.home')}}</a></li>
							<li><a href="/about">{{__('common.about')}}</a></li>
							<li><a href="/shop">{{__('common.shop')}}</a>
								<ul class="mega-menu">
									@foreach($categories as $item)
									<li>
										<a class="mega-title" href="/shop/category/{{$item->id}}">{{$item->name}}</a>
										
										<ul>
											@foreach($item->children as $subitem)
											<li><a href="/shop/category/{{$subitem->id}}">{{$subitem->name}}</a></li>
											@endforeach
										</ul>
									</li>
									@endforeach
									<li class="mega-menu-img w-50">
										<a href="#"><img src="/assets/themes/gid/img/news-letter.jpg" alt=""></a>
									</li>
								</ul>
							</li>
							<li><a href="/blog">{{__('common.blog')}}</a></li>
							<li><a href="/contact">{{__('common.contact')}}</a></li>
						</ul>
					</nav>
				</div>
				<!--Main Menu Start-->
				<!--Header Bottom Right Start-->
				<div class="col-auto d-flex">   
					<!--Header Mini Cart Start-->
					<div class="header-cart dropdown">
						@include('cart.cart-widget')
					</div>
					<!--Header Mini Cart End-->
				</div>
				<!--Mobile Menu Start-->
				<div class="mobile-menu col-12 d-lg-none"></div>
				<!--Mobile Menu End-->
			</div>
		</div>
	</div>
	<!--Header Bottom End-->
</div>
<!-- Header Area End -->