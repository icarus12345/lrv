<?php $cart = new \App\Services\Cart() ?>
                <div class="block-title">
                    <h1 class="title">{{__('cart.shoping_cart_sumary')}}</h1>
                </div>
                
                <div class="cart-wishlist-table table-responsive">
                    <table class="table table-bordered mb-30">
                        <thead>
                            <tr>
                                <th colspan="2">{{__('cart.product')}}</th>
                                <th>{{__('cart.price')}}</th>
                                <th>{{__('cart.quanlity')}}</th>
                                <th>{{__('cart.total')}}</th>
                                <th>{{__('common.remove')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($cart->items))
                            @foreach($cart->items as $key=>$item)
                            <tr data-key="{{$key}}">
                                <td><a href="/product/detail/{{$item['id']}}"><img src="{{$item['image_path']}}" width="60" alt="" /></a></td>
                                <td>
									<a href="/product/detail/{{$item['id']}}">{{$item['name']}}</a>
									<div>
									@if($item['size']){{$item['size']}}, @endif
									@if($item['color']){{$item['color']}}@endif
									</div>
								</td>
                                <td>
									<span class="new-price">{!! \App\Helpers::formatPrice($item['price_with_discount'])!!}</span>
									@if($item['discount'])
									<span class="old-price">{!! \App\Helpers::formatPrice($item['price'])!!}</span>
									@endif
                                    
                                </td>
                                <td>
                                    <div class="cart-quantity product-quantity">
                                        <button class="dec qtybtn">-</button>
                                        <input type="text" value="{{$item['quanlity']}}" class="qtyinput">
                                        <button class="inc qtybtn">+</button>	
                                    </div>
                                </td>
                                <td>{!! \App\Helpers::formatPrice($item['price_with_discount'] * $item['quanlity'])!!}</td>
                                <td><a href="JavaScript:Helper.Cart.remove('{{ $key}}')"><i class="fa fa-times"></i></a></td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td class="no-data" colspan="6">{{__('common.no_data')}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <div class="row mb-n30">
                   
                    <div class="col-md-5 col-sm-5 col-xs-12 mb-30">
                        <div class="d-flex flex-wrap mb-n2">
                            <!-- <input type="submit" value="Update Cart" class="mr-2 mb-2"> -->
                            <a class="btn mb-2" href="/shop">{{__('cart.continue_shopping')}}</a>
                        </div>
                        <div class="coupon mt-4">
                            <h6>{{__('cart.coupon')}}</h6>
                            <p>{{__('cart.enter_coupon')}}</p>


							<form id="coupon-form" name="coupon-form" method="POST" class="needs-validation" novalidate>
								@csrf
								<div class="input-group mb-3" >
									<input 
										type="text" 
										class="form-control text-uppercase" 
										name="coupon_code"
										placeholder="{{__('cart.coupon_code')}}"
										required
										pattern="[0-9A-Za-z]{12,12}"
										value="{{$cart->coupon['code']??''}}"
										>
									<div class="input-group-append">
										<button id="apply-coupon" class="btn btn-outline-secondary" type="button">{{__('cart.apply_coupon')}}</button>
									</div>
								</div>
							</form>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-12"></div>
                    <div class="col-md-5 col-sm-5 col-xs-12 mb-30">
                        <div class="block-title text-right mb-2">
                            <h4 class="title">Cart Totals</h4>
                        </div>
                        <div class="cart-total-wrap mb-40">
                            <div class="table-responsive" style="overflow:hidden">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <th>{{__('checkout.cart_subtotal')}}</th>
                                            <td -width="160" class="text-right text-nowrap"><strong>{!! \App\Helpers::formatPrice($cart->total_amount)!!}</strong></td>
                                        </tr>
										@if($cart->coupon)
										<tr>
                                            <th>{{__('Coupon Discount')}}</th>
                                            <td -width="160" class="text-right text-nowrap">
											-{!! \App\Helpers::formatPrice($cart->getCouponDiscoutAmount())!!}
											<a href="JavaScript:Helper.Cart.removeCoupon('{{ $key}}')"><i class="fa fa-times"></i></a>
											</td>
                                        </tr>
										@endif
                                        <tr>
                                            <th>{{__('checkout.shipping')}}</th>
                                            <td class="text-right text-nowrap">
                                                
												<div class="custom-control custom-radio">
													<input type="radio"  
														class="custom-control-input" 
														id="flatShip" 
														name="shiping_type" required
														onclick="Helper.Cart.updateShipingType(1)"
														@if($cart->flat_rate) checked @endif 
														>
													<label class="custom-control-label" for="flatShip">
														{{__('checkout.flat_rate')}}: <strong>{!! \App\Helpers::formatPrice(\App\Helpers::getFlatRate())!!}</strong>
													</label>
												</div>
												<div class="custom-control custom-radio mb-3">
													<input type="radio"  
														class="custom-control-input" 
														id="freeShip" 
														name="shiping_type" required
														onclick="Helper.Cart.updateShipingType(0)"
														@if(!$cart->flat_rate) checked @endif 
														>
													<label class="custom-control-label" for="freeShip">
														{{__('checkout.free_shipping')}}
													</label>
												</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tax ({!! \App\Helpers::getTax()!!}%)</th>
                                            <td class="text-right text-nowrap">
                                                {!! \App\Helpers::formatPrice($cart->getTaxAmount())!!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="h5">{{__('checkout.order_total')}}</th>
                                            <td class="h5 text-right text-nowrap"><strong>{!! \App\Helpers::formatPrice($cart->getBillingAmount())!!}</strong></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" class="pb-0"><a class="btn w-100" href="/shop/checkout">{{__('checkout.place_order')}}</a></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>