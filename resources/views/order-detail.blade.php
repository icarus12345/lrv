@extends('layouts.master.master')

@section('content')

		<!-- Breadcrumbs Area Start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/"><i class="fa fa-home"></i>{{__('common.home')}}</a></li>
                    <li class="active">{{__('order.order_detail')}}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs Area End -->	
        <form id="checkout-form" name="checkout-form" class="needs-validation" novalidate>
            <!-- Check Out Area start -->
    		<div class="check-out-area section-padding-sm">
    			<div class="container">
                    <div class="block-title">
                        <h4 class="title">{{__('order.order_detail')}} #{{$order->no}}</h4>
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
                                <h5 class="title">{{__('checkout.billing_details')}} </h5>
                            </div>
    							
                            <div class="row mb-n20">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{__('validation.attributes.full_name')}}</label>
                                    <input type="text"  class="form-control" value="{{$order->full_name}}" disabled="" />
                                </div>
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{__('validation.attributes.company')}}</label>
                                    <input type="text"  class="form-control" value="{{$order->company}}" disabled="" />
                                </div>
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{__('validation.attributes.address')}}</label>
                                    <input type="text"  class="form-control mb-20" value="{{$order->street_address}}" disabled="" />
                                    <input type="text"  class="form-control" value="{{$order->other_address}}" disabled="" />
                                </div>
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{__('validation.attributes.city')}}</label>
                                    <input type="text" name="city" placeholder="{{__('validation.attributes.city')}}" class="form-control" required />
                                </div>
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{__('validation.attributes.country')}} </label>
                                    <select class="form-control" required name="country">
                                        <option value="vn" @if($order->country == 'vn') selected @endif>Viet Nam</option>
                                    </select>								
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>{{__('validation.attributes.state_city')}}</label>
                                    <input type="text"  class="form-control" value="{{$order->state_city}}" disabled="" />
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>{{__('validation.attributes.postcode_zip')}}</label>
                                    <input type="text"  class="form-control" value="{{$order->postcode_zip}}" disabled="" />
                                </div>
                                <div class="col-md-8 col-12 mb-20">
                                    <label>{{__('validation.attributes.email')}}</label>
                                    <input type="text"  class="form-control" value="{{$order->email}}" disabled="" />
                                </div>
                                <div class="col-md-4 col-12 mb-20">
                                    <label>{{__('validation.attributes.phone')}}</label>
                                    <input type="text"  class="form-control" value="{{$order->phone}}" disabled="" />
                                </div>
    							<!--
                                <div class="col-md-12 col-12 mb-20">
                                    <label class="checkbox"><input class="toggle-btn" type="checkbox" data-target="#create-account">Create an account?</label>
                                    <div id="create-account" class="el-hidden">
                                        <p class="mt-3">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                        <div class="d-flex flex-wrap">
                                            <label>Phone</label>
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
    										@foreach($order->order_details as $item)
    										<tr>
    											<td>
    											 <img src="{{$item->product->image_path}}" width="60" alt="" />
    											</td>
    											<td>
    												<div><strong>{{ $item->product->name}}</strong></div>
    												@if($item->size || $item->color)
    												<span class="details">
    												@if($item->size){{$item->size}}, @endif
    												@if($item->color){{$item->color}}@endif
    												</span>
    												@endif
                                                    <div>{{$item->qty}} x {!!\App\Helpers::formatPrice($item->price_with_discount)!!}</div>
    											</td>
    											<td class="text-right text-nowrap">{!! \App\Helpers::formatPrice($item->amount)!!}</td>
    										</tr>
    										@endforeach
    										
    									</tbody>
    									<tfoot>
    										<tr style="border-top: 3px double #dee2e6;">
    											<th colspan="2">{{__('checkout.cart_subtotal')}}</th>
    											<td class="text-right text-nowrap"><strong>{!! \App\Helpers::formatPrice($order->amount)!!}</strong></td>
    										</tr>
    										<tr>
    											<th colspan="">{{__('checkout.shipping')}}</th>
    											<td colspan="">
    												@if($order->flat_rate)
    													{{__('checkout.flat_rate')}}
    												@else
    												    {{__('checkout.free_shipping')}}
													@endif
    											</td>
                                                <td class="text-right text-nowrap">
                                                    @if($order->flat_rate)
                                                    {!! \App\Helpers::formatPrice($order->ship_amount)!!}
                                                    @else
                                                    {!! \App\Helpers::formatPrice(0) !!}
                                                    @endif
                                                </td>
    										</tr>
                                            <tr>
                                                <th colspan="2">Tax ({!! \App\Helpers::getTax()!!}%)</th>
                                                <td class="text-right text-nowrap">
                                                    {!! \App\Helpers::formatPrice($order->tax_amount)!!}
                                                </td>
                                            </tr>
    										<tr>
    											<th colspan="2">{{__('checkout.order_total')}}</th>
    											<td class="h5 text-right text-nowrap">
                                                    <strong>
                                                        {!! \App\Helpers::formatPrice($order->total_amount)!!}
                                                    </strong>
                                                </td>
    										</tr>								
    									</tfoot>
    								</table>
    							</div>
    							
    							
    													
    						</div>

                            <div class="login-coupon-accordion">
                                <div class="card">
                                    <h3 class="card-header text-center text-uppercase" style="font-size: 1.5rem">{{__("order.status.{$order->status}")}}</h3>
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
@endsection
