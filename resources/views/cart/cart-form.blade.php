<?php $cart = new \App\Services\Cart() ?>
                <div class="block-title">
                    <h1 class="title">Shopping Cart Summary</h1>
                </div>
                
                <div class="cart-wishlist-table table-responsive">
                    <table class="table table-bordered mb-30">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
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
                   
                    <div class="col-md-8 col-sm-7 col-xs-12 mb-30">
                        <div class="d-flex flex-wrap mb-n2">
                            <!-- <input type="submit" value="Update Cart" class="mr-2 mb-2"> -->
                            <a class="btn mb-2" href="/shop">Continue Shopping</a>
                        </div>
                        <div class="coupon mt-4">
                            <h6>Coupon</h6>
                            <p>Enter your coupon code if you have one.</p>
                            <div class="row mb-n20">
                                <div class="col-xl-4 col-lg-5 col-md-6 col-12 mb-20">
                                    <input type="text" placeholder="Coupon code" class="form-control">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <input type="submit" value="Apply Coupon">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-sm-5 col-xs-12 mb-30">
                        <div class="block-title text-right mb-2">
                            <h4 class="title">Cart Totals</h4>
                        </div>
                        <div class="cart-total-wrap">
                            <div class="table-responsive">
                                <table class="table table-borderless text-right mb-0">
                                    <tbody>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td -width="160"><strong>{!! \App\Helpers::formatPrice($cart->total_amount)!!}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td>
                                                
												<div class="custom-control custom-radio">
													<input type="radio"  
														class="custom-control-input" 
														id="flatShip" 
														name="shiping_type" required
														onclick="Helper.Cart.updateShipingType(1)"
														@if($cart->flat_rate) checked @endif 
														>
													<label class="custom-control-label" for="flatShip">
														Flat Rate: <strong>{!! \App\Helpers::formatPrice(\App\Helpers::getFlatRate())!!}</strong>
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
														Free Shipping
													</label>
												</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="h5">Total</th>
                                            <td class="h5"><strong>{!! \App\Helpers::formatPrice($cart->getTotalAmountWithShiping())!!}</strong></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" class="pb-0"><a class="btn" href="/shop/checkout">Proceed to Checkout</a></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>