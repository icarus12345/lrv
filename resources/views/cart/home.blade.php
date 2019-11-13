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
<script src="/assets/lib/serializeJSON/jquery.serializeJSON.min.js"></script>
<script type="text/javascript">
    $(document).ready(()=>{
		$('body').on('change','.qtyinput', (e)=>{
			let quanlity  = $(e.target).val();
            let key  = $(e.target).parents('tr').data('key');
			Helper.Cart.update(key, quanlity);
		});
        $('body').on('click','.qtybtn', (e)=>{
            let quanlity  = $(e.target).parent().find("input").val();
            let key  = $(e.target).parents('tr').data('key');

            //Helper.Cart.update(key, quanlity);
        });
		$('body').on('click','#apply-coupon', function(event) {
			$('#coupon-form').unbind('submit')
				.on('submit',(e)=>{					
					e.preventDefault();
					e.stopPropagation();
					console.log(e.target.checkValidity());
					if (e.target.checkValidity()) {
						Swal.fire({
							"type": "question",
							"showCancelButton": true,
							"showLoaderOnConfirm": true,
							"confirmButtonText": "@lang('OK')",
							"cancelButtonText": "@lang('Cancel')",
							"title": "@lang('Do you want use this coupon ?')",
							"text": "",
							"confirmButtonColor": "#a2c147",
							preConfirm: function(input) {
								let params = $(e.target).serializeJSON();
								console.log(params)
								return new Promise(function(resolve, reject) {
									$.ajax({
										url : "/shop/apply-coupon",
										type : "POST",
										data : params,
										success: function (data) {
											resolve(data);
										},
										error:function(request){
											reject(request);
										}
									});
								});
							}
						}).then(function(result) {
							if (typeof result.dismiss !== 'undefined') {
								return Promise.reject();
							}
							
							if (typeof result.status === "boolean") {
								var response = result;
							} else {
								var response = result.value;
							}
							console.log(response)
							if(response.code == 1) {
								Swal.fire(Lang.get('common.system_notification'), response.message, 'success')
								$('#cart-sumary').html(response.form)
							} else {
							  Swal.fire(Lang.get('common.system_error'), response.message, 'error');
							}
						});
					}
					e.target.classList.add('was-validated');
				})
			$('#coupon-form').trigger('submit');
		});
		
		
    })
</script>
@endsection
