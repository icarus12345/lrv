			<?php $cart = new \App\Services\Cart() ?>
<button data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-shopping-cart"></i><span class="num">{{$cart->total_item}}</span></button>
	<div class="header-cart-dropdown dropdown-menu dropdown-menu-right">
		<ul class="header-cart-product">
			
			@foreach($cart->items as $item)
			<li> 
				<a href="/product/detail/{{ $item['id']}}" class="image"><img src="{{ $item['image_path']}}" alt=""></a>
				<div class="content">
					<a href="/product/detail/{{ $item['id']}}" class="title">{{ $item['name']}}</a>
					<span class="details">S, Orange</span>
					<span class="price">{{ $item['quanlity']}} x {!! \App\Helpers::formatPrice($item['price'])!!}</span>
					<a href="JavaScript:Helper.Cart.remove({{ $item['id']}})" class="remove"><i class="fa fa-close"></i></a>
				</div>
			</li>
			@endforeach
		</ul>
		<div class="header-cart-total">
			<h6 class="total">Total: <span class="total">{!! \App\Helpers::formatPrice($cart->total_amount)!!}</span></h6>
		</div>
		<div class="header-cart-buttons">
			<a class="button" href="shopping_cart.html">Checkout<i class="fa fa-angle-right"></i></a>
		</div>
	</div>