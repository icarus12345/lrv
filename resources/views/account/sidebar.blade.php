<!-- My Account Tab Menu Start -->
<div class="col-lg-3 col-12 mb-30">
	<div class="myaccount-tab-menu nav" >
		<a href="/account"><i class="fa fa-user"></i> @lang('Profile')</a>
		<div >
			<a href="/account/transaction"><i class="fa fa-cart-arrow-down"></i> @lang('All Orders')</a>
			<a href="/account/transaction/requested" style="padding-left: 60px"><i class="fa fa-cart-arrow-down"></i> @lang('Requested Orders')</a>
			<a href="/account/transaction/pending" style="padding-left: 60px"><i class="fa fa-cart-arrow-down"></i> @lang('Pending Orders')</a>
			<a href="/account/transaction/done" style="padding-left: 60px"><i class="fa fa-cart-arrow-down"></i> @lang('Done Orders')</a>
			<a href="/account/transaction/canceled" style="padding-left: 60px"><i class="fa fa-cart-arrow-down"></i> @lang('Canceled Orders')</a>
		</div>
		<a href="/account/payment-method"><i class="fa fa-credit-card"></i> @lang('Payment Method')</a>
		<a href="/account/address"><i class="fa fa-map-marker"></i> @lang('Address')</a>
		<a href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> @lang('Logout')</a>
	</div>
</div>
<!-- My Account Tab Menu End -->