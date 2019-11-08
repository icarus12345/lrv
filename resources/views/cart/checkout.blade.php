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
        
        <!-- Check Out Area start -->
		<div class="check-out-area section-padding-sm">
			<div class="container">
                <div class="block-title">
                    <h4 class="title">Procced to Checkout </h4>
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
                    
					<div class="col-lg-6 col-12">
                        <div class="block-title w-100">
                            <h5 class="title">Billing Details</h5>
                        </div>
							
                        <div class="row mb-n20">
                            <div class="col-md-6 col-12 mb-20">
                                <label>First Name<span class="required">*</span></label>
                                <input type="text" placeholder="First Name" class="form-control"/>
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Last Name<span class="required">*</span></label>
                                <input type="text" placeholder="Last Name" class="form-control"/>
                            </div>
                            <div class="col-md-12 col-12 mb-20">
                                <label>Company Name</label>
                                <input type="text" placeholder="Company Name" class="form-control"/>
                            </div>
                            <div class="col-md-12 col-12 mb-20">
                                <label>Address<span class="required">*</span></label>
                                <input type="text" placeholder="Street address" class="form-control"/>
                                <input type="text" placeholder="Apartment, suite, unit etc. (optional)" class="form-control"/>
                            </div>
                            <div class="col-md-12 col-12 mb-20">
                                <label>Town / City<span class="required">*</span></label>
                                <input type="text" placeholder="Town / City" class="form-control"/>
                            </div>
                            <div class="col-md-12 col-12 mb-20">
                                <label>Country <span class="required">*</span></label>
                                <select class="form-control">
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
                                <input type="text" placeholder="State / County" class="form-control"/>
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Postcode / Zip<span class="required">*</span></label>
                                <input type="text" placeholder="Postcode / Zip" class="form-control"/>
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Email Address<span class="required">*</span></label>
                                <input type="email" placeholder="Email Address" class="form-control"/>
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Phone<span class="required">*</span></label>
                                <input type="text" placeholder="Phone" class="form-control"/>
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
					
					<div class="col-lg-6 col-12">
						<div class="place-order bg-light">
                           
                            <div class="block-title w-100">
                                <h5 class="title">Your order</h5>
                            </div>
                            
							<div class="table-responsive">
								<table class="table m-0">
									<thead>
										<tr>
											<th colspan="2" class="pt-0 border-top-0">Product</th>
											<th class="pt-0 border-top-0">Total</th>
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
											</td>
											<td>{!! \App\Helpers::formatPrice($item['price_with_discount'] * $item['quanlity'])!!}</td>
										</tr>
										@endforeach
										@else
										<tr>
											<td colspan="3">{{__('common.no_data')}}</td>
										</tr>
										@endif
										
									</tbody>
									<tfoot>
										<tr>
											<th colspan="2">Cart Subtotal</th>
											<td><strong>{!! \App\Helpers::formatPrice($cart->total_amount)!!}</strong></td>
										</tr>
										<tr>
											<th colspan="2">Shipping</th>
											<td>
												<div class="custom-control custom-radio">
													<input type="radio" 
														disabled
														class="custom-control-input" 
														id="flatShip" 
														name="shiping_type" required
														-onclick="Helper.Cart.updateShipingType(1)"
														@if($cart->flat_rate) checked @endif 
														>
													<label class="custom-control-label" for="flatShip">
														Flat Rate: <strong>{!! \App\Helpers::formatPrice(\App\Helpers::getFlatRate())!!}</strong>
													</label>
												</div>
												<div class="custom-control custom-radio mb-3">
													<input type="radio"  
														disabled
														class="custom-control-input" 
														id="freeShip" 
														name="shiping_type" required
														-onclick="Helper.Cart.updateShipingType(0)"
														@if(!$cart->flat_rate) checked @endif 
														>
													<label class="custom-control-label" for="freeShip">
														Free Shipping
													</label>
												</div>
											</td>
										</tr>
										<tr>
											<th colspan="2">Order Total</th>
											<td class="h5"><strong>{!! \App\Helpers::formatPrice($cart->getTotalAmountWithShiping())!!}</strong></td>
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
								<input type="submit" value="Place order" class="w-100" />
							</div>	
													
						</div>
					</div>
					
					<div class="col-lg-6 col-12 d-none">
						<div class="your-order">
						    <h5 class="checkbox-title">Your order</h5>
							<div class="your-order-table table-responsive">
								<table>
									<thead>
										<tr>
											<th class="c-product-name">Product</th>
											<th class="c-product-total">Total</th>
										</tr>							
									</thead>
									<tbody>
										<tr class="cart_item">
											<td class="c-product-name">
												Vestibulum suscipit <strong class="product-quantity"> × 1</strong>
											</td>
											<td class="c-product-total">
												<span class="amount">£165.00</span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="c-product-name">
												Vestibulum dictum magna	<strong class="product-quantity"> × 1</strong>
											</td>
											<td class="c-product-total">
												<span class="amount">£50.00</span>
											</td>
										</tr>
									</tbody>
									<tfoot>
										<tr class="cart-subtotal">
											<th>Cart Subtotal</th>
											<td><span class="amount">£215.00</span></td>
										</tr>
										<tr class="shipping">
											<th>Shipping</th>
											<td>
												<div class="custom-control custom-radio">
													<input type="radio"  
														class="custom-control-input" 
														id="flatShip2" 
														name="shiping_type2" required
														-onclick="Helper.Cart.updateShipingType(1)"
														@if($cart->flat_rate) checked @endif 
														>
													<label class="custom-control-label" for="flatShip2">
														Flat Rate: <strong>{!! \App\Helpers::formatPrice(\App\Helpers::getFlatRate())!!}</strong>
													</label>
												</div>
												<div class="custom-control custom-radio mb-3">
													<input type="radio"  
														class="custom-control-input" 
														id="freeShip2" 
														name="shiping_type2" required
														-onclick="Helper.Cart.updateShipingType(0)"
														@if(!$cart->flat_rate) checked @endif 
														>
													<label class="custom-control-label" for="freeShip2">
														Free Shipping
													</label>
												</div>
											</td>
										</tr>
										<tr class="order-total">
											<th>Order Total</th>
											<td><strong><span class="amount">£215.00</span></strong>
											</td>
										</tr>								
									</tfoot>
								</table>
							</div>
							<div class="payment-method">
								<div class="payment-accordion">
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
								<div class="order-button-payment">
									<input type="submit" value="Place order" />
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- Check Out Area End -->
	@include('widget.brand')
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(()=>{
		
    })
</script>
@endsection
