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
                                <td><a href="product-details.html"><img src="{{$item['image_path']}}" width="60" alt="" /></a></td>
                                <td><a href="product-details.html">{{$item['name']}}</a></td>
                                <td>
                                    {!! \App\Helpers::formatPrice($item['price'])!!}
                                </td>
                                <td>
                                    <div class="cart-quantity product-quantity">
                                        <button class="dec qtybtn">-</button>
                                        <input type="text" value="{{$item['quanlity']}}">
                                        <button class="inc qtybtn">+</button>	
                                    </div>
                                </td>
                                <td>{!! \App\Helpers::formatPrice($item['price'] * $item['quanlity'])!!}</td>
                                <td><a href="JavaScript:Helper.Cart.remove({{ $item['id']}})"><i class="fa fa-times"></i></a></td>
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
                                    <input type="text" placeholder="Coupon code">
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
                                            <td><strong>{!! \App\Helpers::formatPrice($cart->total_amount)!!}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <label class="checkbox" onclick="Helper.Cart.updateShipingType(1)">
                                                            <input type="radio" name="shiping_type" @if($cart->flat_rate) checked @endif value="1" />
                                                            Flat Rate: <strong>{!! \App\Helpers::formatPrice(\App\Helpers::getFlatRate())!!}</strong>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="checkbox" onclick="Helper.Cart.updateShipingType(0)">
                                                            <input type="radio" name="shiping_type" @if(!$cart->flat_rate) checked @endif value="0" />Free Shipping
                                                        </label>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="h5">Total</th>
                                            <td class="h5"><strong>{!! \App\Helpers::formatPrice($cart->getTotalAmountWithShiping())!!}</strong></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" class="pb-0"><a class="btn" href="checkout.html">Proceed to Checkout</a></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>