@extends('layouts.master.master')

@section('content')
<?php $cart = new \App\Services\Cart() ?>
		<!-- Breadcrumbs Area Start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/"><i class="fa fa-home"></i>{{__('common.home')}}</a></li>
                    <li class="active">{{__('cart.checkout')}}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs Area End -->	
        <form id="checkout-form" name="checkout-form" class="needs-validation" novalidate>
            <!-- Check Out Area start -->
    		<div class="check-out-area section-padding-sm">
    			<div class="container">
                    <div class="block-title">
                        <h4 class="title">{{__('checkout.processd_to_check')}}</h4>
                    </div>
    				<div class="row">
                        
                        <!--Login & Coupon Start-->
    					<!--
                        <div class="col-12 mb-20">
                            <div id="login-coupon" class="login-coupon-accordion">
                                <div class="card">
                                    <h6 class="card-header">Returning customer? <a data-toggle="collapse" href="#login">Click here to login</a></h6>
                                    <div id="login" class="collapse">
                                        <div class="card-body">
                                            <div class="login-coupon-info mt-20">
                                                <p>Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                                                <form action="#">
                                                    <div class="row mb-n20">
                                                        <div class="col-12 mb-20">
                                                            <label>Username or email <span class="required">*</span></label>
                                                            <input type="text" class="form-control"/>
                                                        </div>
                                                        <div class="col-12 mb-20">
                                                            <label>Password  <span class="required">*</span></label>
                                                            <input type="text" class="form-control"/>
                                                        </div>
                                                        <div class="d-flex flex-wrap align-items-center col-12 mb-20">
                                                            <input type="submit" value="Login" class="mr-4" />
                                                            <label class="checkbox my-auto"><input type="checkbox" />Remember me</label>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="mt-3 d-inline-block">Lost your password?</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <h6 class="card-header">Have a coupon? <a data-toggle="collapse" href="#coupon">Click here to enter your code</a></h6>
                                    <div id="coupon" class="collapse">
                                        <div class="card-body">
                                            <div class="login-coupon-info mt-20">
                                                <form action="#">
                                                    <div class="row mb-n20">
                                                        <div class="col-lg-4 col-md-6 col-12 mb-20">
                                                            <input type="text" placeholder="Coupon code" class="form-control"/>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 mb-20">
                                                            <input type="submit" value="Apply Coupon" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    					-->
    					<!--Login & Coupon End-->
                        
    					<div class="col-lg-6 col-12 mb-40">
                            <div class="block-title w-100">
                                <h5 class="title">{{__('checkout.billing_details')}}</h5>
                            </div>
    							
                            <div class="row mb-n20">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{__('validation.attributes.full_name')}}<span class="required">*</span></label>
                                    <input
                                        name="name" 
                                        type="text" 
										placeholder="{{__('validation.attributes.full_name')}}" 
										class="form-control" 
										value="{{\Auth::user()->name??''}}"
										required 
                                        />
                                </div>
                                
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{__('validation.attributes.company')}}</label>
                                    <input type="text" name="company" placeholder="{{__('validation.attributes.company')}}" class="form-control"/>
                                </div>
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{__('validation.attributes.address')}}<span class="required">*</span></label>
                                    <input type="text" name="street_address" placeholder="{{__('validation.attributes.street_address')}}" class="form-control mb-20" required />
                                    <input type="text" name="other_address" placeholder="{{__('checkout.other_address')}}" class="form-control" />
                                </div>
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{__('validation.attributes.city')}}<span class="required">*</span></label>
                                    <input type="text" name="city" placeholder="{{__('validation.attributes.city')}}" class="form-control" required />
                                </div>
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{__('validation.attributes.country')}} <span class="required">*</span></label>
                                    <select class="form-control" required name="country">
                                        <option value="vn">Viet Nam</option>
                                    </select>								
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>{{__('validation.attributes.state_city')}}</label>
                                    <input type="text" name="state_city" placeholder="{{__('validation.attributes.state_city')}}" class="form-control" />
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>{{__('validation.attributes.postcode_zip')}}<span class="required">*</span></label>
                                    <input type="text" name="postcode_zip" placeholder="{{__('validation.attributes.postcode_zip')}}" class="form-control" required />
                                </div>
                                <div class="col-md-8 col-12 mb-20">
                                    <label>{{__('validation.attributes.email')}}<span class="required">*</span></label>
                                    <input 
										type="email" name="email" 
										placeholder="{{__('validation.attributes.email')}}" 
										class="form-control" 
										value="{{\Auth::user()->email??''}}"
										required 
										/>
                                </div>
                                <div class="col-md-4 col-12 mb-20">
                                    <label>{{__('validation.attributes.phone')}}<span class="required">*</span></label>
                                    <input type="phone" name="phone" placeholder="{{__('validation.attributes.phone')}}" class="form-control" required />
                                </div>
    							<!--
                                <div class="col-md-12 col-12 mb-20">
                                    <label class="checkbox"><input class="toggle-btn" type="checkbox" data-target="#create-account">Create an account?</label>
                                    <div id="create-account" class="el-hidden">
                                        <p class="mt-3">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                        <div class="d-flex flex-wrap">
                                            <label>Phone<span class="required">*</span></label>
                                            <input type="text" placeholder="Phone"/>
                                        </div>
                                    </div>
                                </div>
    							-->
                            </div>
                            <!--
                            <div class="block-title border-bottom-0 pb-0 w-100 mt-20">
                                <h5 class="title"><label class="checkbox m-0">Ship to a different address? <input class="toggle-btn" type="checkbox" data-target="#shipping-address"/></label></h5>
                            </div>
                            
                            <div id="shipping-address" class="el-hidden w-100">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>First Name<span class="required">*</span></label>
                                        <input type="text" placeholder="First Name" />
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Last Name<span class="required">*</span></label>
                                        <input type="text" placeholder="Last Name" />
                                    </div>
                                    <div class="col-md-12 col-12 mb-20">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="Company Name" />
                                    </div>
                                    <div class="col-md-12 col-12 mb-20">
                                        <label>Address<span class="required">*</span></label>
                                        <input type="text" placeholder="Street address"/>
                                        <input type="text" placeholder="Apartment, suite, unit etc. (optional)"/>
                                    </div>
                                    <div class="col-md-12 col-12 mb-20">
                                        <label>Town / City<span class="required">*</span></label>
                                        <input type="text" placeholder="Town / City"/>
                                    </div>
                                    <div class="col-md-12 col-12 mb-20">
                                        <label>Country <span class="required">*</span></label>
                                        <select>
                                            <option value="volvo">Bangladesh</option>
                                            <option value="saab">Algeria</option>
                                            <option value="mercedes">Afghanistan</option>
                                            <option value="audi">Ghana</option>
                                            <option value="audi2">Albania</option>
                                            <option value="audi3">Bahrain</option>
                                            <option value="audi4">Colombia</option>
                                            <option value="audi5">Dominican Republic</option>
                                        </select>								
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>State / County<span class="required">*</span></label>
                                        <input type="text" placeholder="State / County" />
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Postcode / Zip<span class="required">*</span></label>
                                        <input type="text" placeholder="Postcode / Zip"/>
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Email Address<span class="required">*</span></label>
                                        <input type="email" placeholder="Email Address" />
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Phone<span class="required">*</span></label>
                                        <input type="text" placeholder="Phone"/>
                                    </div>
                                </div>
                            </div>
    						-->	
    					</div>
    					
    					<div class="col-lg-6 col-12 mb-40">
    						<div class="place-order bg-light">
                               
                                <div class="block-title w-100">
                                    <h5 class="title">{{__('checkout.your_order')}}</h5>
                                </div>
                                
    							<div class="table-responsive">
    								<table class="table m-0">
    									<thead>
    										<tr>
    											<th colspan="2" class="pt-0 border-top-0">{{__('checkout.product')}}</th>
    											<th width="100" class="pt-0 border-top-0 text-right text-nowrap">{{__('checkout.total')}}</th>
    										</tr>							
    									</thead>
    									<tbody>
    										@if(count($cart->items))
    										@foreach($cart->items as $key=>$item)
    										<tr>
    											<td>
    											 <img src="{{$item['image_path']}}" width="60" alt="" />
    											</td>
    											<td>
    												<div><strong>{{ $item['name']}}</strong></div>
    												@if($item['size'] || $item['color'])
    												<span class="details">
    												@if($item['size']){{$item['size']}}, @endif
    												@if($item['color']){{$item['color']}}@endif
    												</span>
    												@endif
                                                    <div>{{$item['quanlity']}} x {!!\App\Helpers::formatPrice($item['price_with_discount'])!!}</div>
    											</td>
    											<td class="text-right text-nowrap">{!! \App\Helpers::formatPrice($item['price_with_discount'] * $item['quanlity'])!!}</td>
    										</tr>
    										@endforeach
    										@else
    										<tr>
    											<td colspan="3">{{__('common.no_data')}}</td>
    										</tr>
    										@endif
    										
    									</tbody>
    									<tfoot>
    										<tr style="border-top: 3px double #dee2e6;">
    											<th colspan="2">{{__('checkout.cart_subtotal')}}</th>
    											<td class="text-right text-nowrap"><strong>{!! \App\Helpers::formatPrice($cart->total_amount)!!}</strong></td>
    										</tr>
    										<tr>
    											<th colspan="">{{__('checkout.shipping')}}</th>
    											<td colspan="">
    												@if($cart->flat_rate)
                                                        {{__('checkout.flat_rate')}}
                                                    @else
                                                        {{__('checkout.free_shipping')}}
                                                    @endif
    											</td>
                                                <td class="text-right text-nowrap">
                                                    @if($cart->flat_rate)
                                                    {!! \App\Helpers::formatPrice(\App\Helpers::getFlatRate())!!}
                                                    @else
                                                    {!! \App\Helpers::formatPrice(0) !!}
                                                    @endif
                                                </td>
    										</tr>
                                            <tr>
                                                <th colspan="2">Tax ({!! \App\Helpers::getTax()!!}%)</th>
                                                <td class="text-right text-nowrap">
                                                    {!! \App\Helpers::formatPrice($cart->getTaxAmount())!!}
                                                </td>
                                            </tr>
    										<tr>
    											<th colspan="2">{{__('checkout.order_total')}}</th>
    											<td class="h5 text-right text-nowrap">
                                                    <strong>
                                                        {!! \App\Helpers::formatPrice($cart->getBillingAmount())!!}
                                                    </strong>
                                                </td>
    										</tr>								
    									</tfoot>
    								</table>
    							</div>
    							
    							<div class="payment-method mt-20">
    								<div class="payment-accordion mb-4">
    									<!-- ACCORDION START -->
    									<h3>Direct Bank Transfer</h3>
    									<div class="payment-content">
    										<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
    									</div>
    									<!-- ACCORDION END -->	
    									<!-- ACCORDION START -->
    									<h3>Cheque Payment</h3>
    									<div class="payment-content">
    										<p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
    									</div>
    									<!-- ACCORDION END -->	
    									<!-- ACCORDION START -->
    									<h3>PayPal <img src="/assets/themes/gid/img/payment.png" alt="" /></h3>
    									<div class="payment-content">
    										<p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
    									</div>
    									<!-- ACCORDION END -->									
    								</div>
    								<input id="place_order" type="submit" value="{{__('checkout.place_order')}}" class="w-100" />
    							</div>	
    													
    						</div>
    					</div>
    					
    				</div>
    			</div>
    		</div>
            <!-- Check Out Area End -->
        </form>
	@include('widget.brand')
@endsection

@section('js')
<script src="/assets/lib/serializeJSON/jquery.serializeJSON.min.js"></script>
<script type="text/javascript">
    $(document).ready(()=>{
		document.getElementById('checkout-form').addEventListener('submit', (e)=>{
            if(e.target.checkValidity() === false){
                return false;
            }
            e.preventDefault();
            e.stopPropagation();
            Swal.fire({
                "type": "question",
                "showCancelButton": true,
                "showLoaderOnConfirm": true,
                "confirmButtonText": Lang.get('cart.checkout'),
                "cancelButtonText": Lang.get('common.cancel'),
                "title": Lang.get('cart.checkout_confirm_message'),
                "text": "",
                "confirmButtonColor": "#a2c147",
                preConfirm: function(input) {
                    let params = $(e.target).serializeJSON();
                    console.log(params)
                    return new Promise(function(resolve, reject) {
                        $.ajax({
                            url : "/shop/checkout",
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
                    .then((result)=>{
                        window.location.href = "/order/"+response.data.no + '?token=' + response.data.token 
                    });
                    // e.target.reset();
                    $('#place_order').remove();
                    $('.header-cart-product .remove').remove();
                } else {
                  Swal.fire(Lang.get('common.system_error'), response.message, 'error');
                }
            });
        });
    })
</script>
@endsection
