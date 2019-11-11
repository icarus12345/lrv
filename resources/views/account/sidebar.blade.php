<!-- My Account Tab Menu Start -->
<div class="col-lg-3 col-12 mb-30">
	<div class="myaccount-tab-menu nav" >
		<a href="/account"><i class="fa fa-user"></i> Profile</a>
		<div >
			<a href="/account/transaction"><i class="fa fa-cart-arrow-down"></i> All Orders</a>
			<a href="/account/transaction/requested" style="padding-left: 60px"><i class="fa fa-cart-arrow-down"></i> Requested</a>
			<a href="/account/transaction/pending" style="padding-left: 60px"><i class="fa fa-cart-arrow-down"></i> Pending</a>
			<a href="/account/transaction/done" style="padding-left: 60px"><i class="fa fa-cart-arrow-down"></i> Done</a>
			<a href="/account/transaction/canceled" style="padding-left: 60px"><i class="fa fa-cart-arrow-down"></i> Canceled</a>
		</div>
		<a href="/account/payment-method"><i class="fa fa-credit-card"></i> Payment Method</a>
		<a href="/account/address"><i class="fa fa-map-marker"></i> Address</a>
		<a href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
	</div>
</div>
<!-- My Account Tab Menu End -->