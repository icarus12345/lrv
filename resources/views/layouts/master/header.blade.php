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
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							{{__("common.locales")[\Session::get('locale')]}}
							</a>
							<ul class="dropdown-menu header-top-dropdown">
								<li><a href="/locale/en">English</a></li>
								<li><a href="/locale/vi">Ti·∫øng Vi·ªát</a></li>
							</ul>
						</li>
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
							<li><a href="home.html">{{__('common.home')}}</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="shop.html">Shop</a>
								<ul class="mega-menu">
									<li>
										<a class="mega-title" href="#">Categories</a>
										<ul>
											<li><a href="office-building.html">Office Building</a></li>
											<li><a href="coffee-house.html">Coffee House</a></li>
											<li><a href="home-decor.html">Home Decor</a></li>
										</ul>
									</li>
									<li>
										<a class="mega-title" href="#">Product Design</a>
										<ul>
											<li><a href="chair.html">Chair Design</a></li>
											<li><a href="table.html">Table Design</a></li>
											<li><a href="set.html">Set Design</a></li>
										</ul>
									</li>
									<li class="mega-menu-img w-50">
										<a href="#"><img src="/assets/themes/gid/img/news-letter.jpg" alt=""></a>
									</li>
								</ul>
							</li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
				<!--Main Menu Start-->
				<!--Header Bottom Right Start-->
				<div class="col-auto d-flex">   
					<!--Header Mini Cart Start-->
					<div class="header-cart dropdown">
						<button data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-shopping-cart"></i><span class="num">2</span></button>
						<div class="header-cart-dropdown dropdown-menu dropdown-menu-right">
							<ul class="header-cart-product">
								<li>
									<a href="product-details.html" class="image"><img src="/assets/themes/gid/img/img-cart/1.jpg" alt=""></a>
									<div class="content">
										<a href="product-details.html" class="title">Printed Dress</a>
										<span class="details">S, Orange</span>
										<span class="price">1 x Åí 16.00</span>
										<a href="#" class="remove"><i class="fa fa-close"></i></a>
									</div>
								</li>
								<li>
									<a href="product-details.html" class="image"><img src="/assets/themes/gid/img/img-cart/2.jpg" alt=""></a>
									<div class="content">
										<a href="product-details.html" class="title">Printed Summer Dress</a>
										<span class="details">S, Orange</span>
										<span class="price">2 x Åí 36.00</span>
										<a href="#" class="remove"><i class="fa fa-close"></i></a>
									</div>
								</li>
							</ul>
							<div class="header-cart-total">
								<h6 class="total">Total: <span class="total">Åí 86.00</span></h6>
							</div>
							<div class="header-cart-buttons">
								<a class="button" href="shopping_cart.html">Checkout<i class="fa fa-angle-right"></i></a>
							</div>
						</div>
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