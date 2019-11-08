@extends('layouts.master.master')

@section('content')
<?php $cart = new \App\Services\Cart() ?>
		<!-- Breadcrumbs Area Start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/"><i class="fa fa-home"></i>{{__('common.home')}}</a></li>
                    <li class="active">{{__('cart.shoping_cart')}}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs Area End -->
        
		<!--Cart Main Area Start-->	
		<div class="section-padding-sm">
			<div class="container" id="cart-sumary">
                @include('cart.cart-form')
                
			</div>
		</div>
		<!--Cart Main Area End-->
	@include('widget.brand')
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(()=>{
		$('body').on('change','.qtyinput', (e)=>{
			let quanlity  = $(e.target).val();
            let key  = $(e.target).parents('tr').data('key');
			Helper.Cart.update(key, quanlity);
		})
        $('body').on('click','.qtybtn', (e)=>{
            let quanlity  = $(e.target).parent().find("input").val();
            let key  = $(e.target).parents('tr').data('key');

            //Helper.Cart.update(key, quanlity);
        })
    })
</script>
@endsection
