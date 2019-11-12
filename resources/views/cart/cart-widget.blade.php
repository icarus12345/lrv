<?php $cart = new \App\Services\Cart() ?>
<button 
	data-toggle="dropdown" class="dropdown-toggle"
	id="cart-btn"
	>
	<i class="fa fa-shopping-cart"></i>
	<span class="num">{{$cart->total_item}}</span>
</button>
<div class="header-cart-dropdown dropdown-menu dropdown-menu-right">
	<ul class="header-cart-product">
		@if(count($cart->items))
		@foreach($cart->items as $key=>$item)
		<li> 
			<a href="/product/detail/{{ $item['id']}}" class="image"><img src="{{ $item['image_path']}}" alt=""></a>
			<div class="content">
				<a href="/product/detail/{{ $item['id']}}" class="title">{{ $item['name']}}</a>
				@if($item['size'] || $item['color'])
				<span class="details">
				@if($item['size']){{$item['size']}}, @endif
				@if($item['color']){{$item['color']}}@endif
				</span>
				@endif
				<span class="price">{{ $item['quanlity']}} x 
					<span class="new-price">{!! \App\Helpers::formatPrice($item['price_with_discount'])!!}</span>
					@if($item['discount'])
					<span class="old-price">{!! \App\Helpers::formatPrice($item['price'])!!}</span>
					@endif
				</span>
				<a href="JavaScript:Helper.Cart.removeAndShow('{{$key}}')" class="remove"><i class="fa fa-close"></i></a>
			</div>
		</li>
		@endforeach
		@else
			<li class="no-data">{{__('common.no_data')}}</li>
		@endif
	</ul>
	<div class="header-cart-total">
		<h6 class="total">{{__('checkout.total')}}: <span class="total">{!! \App\Helpers::formatPrice($cart->total_amount)!!}</span></h6>
	</div>
	<div class="header-cart-buttons">
		<a class="button" href="/shop/cart">{{__('cart.checkout')}}<i class="fa fa-angle-right"></i></a>
	</div>
</div>