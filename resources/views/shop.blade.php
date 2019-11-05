@extends('layouts.master.master')

@section('content')
		<div class="breadcrumbs-area">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/"><i class="fa fa-home"></i>{{__('common.home')}}</a></li>
					@if(isset($category))
                    <li><a href="/shop">{{__('common.shop')}}</a></li>
                    <li class="active">{{$category->name}}</li>
					@else
					<li class="active">{{__('common.shop')}}</li>
					@endif
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs Area End -->

        <!-- All Product Side Bar Area Start -->
        <div class="section-padding-sm">
            <div class="container">
                <div class="row mb-n30">
                    
                    <div class="col-lg-9 col-12 mb-30">
                    
                        <div class="page-category-banner mb-30"><img src="/assets/themes/gid/img/bedroom.jpg" alt="" /></div>
                        
                        <!--Shop Toolbar Start-->
                        <div class="shop-toolbar">
                               
                            <!-- Nav tabs -->
                            <ul class="shop-tab-list nav">
                                <li><a href="#grid" data-toggle="tab" class="active"><i class="fa fa-th-large"></i></a></li>
                                <li><a href="#list" data-toggle="tab" class="#"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                                
                            <!--Shop Filters-->
                            <div class="shop-filters">
                                <div class="filter">
                                    <label>Sort by</label>
                                    <select>
                                        <option selected="selected">By Latest</option>
                                        <option>Price: Lowest first</option>
                                        <option>Price: Highest first</option>
                                        <option>Product Name: A to Z</option>
                                        <option>Product Name: Z to A</option>
                                        <option>In stock</option>
                                        <option>Reference: Lowest first</option>
                                        <option>Reference: Highest first</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div><!--Shop Toolbar End-->
                        
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="grid">
                            	@if($products->count())
                                <div class="row mb-n30">
                                	@foreach($products as $item)
                                    <div class="col-md-4 col-12 mb-30">
                                        <div class="single-product">
                                            <!--product Content-->
                                            <div class="product-img-content">
                                                <!--Product Image-->
                                                <div class="product-img">
                                                    <a href="/product/detail/{{$item->id}}" title="{{$item->name}}">
                                                        <div class="cover prod-thumb" style="background-image:url('{{$item->image_path}}')" ></div>
                                                    </a>                                            
                                                </div>
                                                @if($item->labels)
													<span class="product-labels">
													@foreach($item->labels as $label) 
													<span class="{{$label}}-label">{{$label}}</span>
													@endforeach
													</span>
												@endif
                                                <!--Product Action-->
                                                <div class="product-action">
                                                    <a href="JavaScript:Helper.Cart.add({{$item->id}})" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                                    <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal"><i class="fa fa-expand"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h5>
													<a href="/product/detail/{{$item->id}}" title="{{$item->name}}">
													{{$item->name}}
													</a>
												</h5>
                                                <!--Product Rating-->
                                                <div class="rating-icon">
                                                    {!!$item->star!!}
                                                </div>
                                                <!--Product Price-->
                                                <div class="product-price">
                                                    <span class="new-price">{!!$item->price_with_discount_format!!}</span>
					                                @if($item->discount)
					                                <span class="old-price">{!!$item->price_with_format!!}</span>
					                                @endif
                                                </div>
                                            </div>
                                        </div>                                  
                                    </div>
                                    @endforeach
                                </div>
                                @else
	                            <div class="no-data">{{__('common.no_data')}}</div>
	                            @endif
                            </div>
                            <div role="tabpanel" class="tab-pane" id="list">
                            	@if($products->count())
                                <div class="row mb-n30">
                                	@foreach($products as $item)
                                    <div class="single-shop-product col-12 mb-30">
                                        <div class="row mb-n20">
                                            <div class="col-md-4 col-12 mb-20">
                                               <div class="left-item">
                                                    <!--Product Image-->
                                                    <a href="/product/detail/{{$item->id}}" title="{{$item->name}}">
                                                        <div class="cover prod-thumb" style="background-image:url('{{$item->image_path}}')" ></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-12 mb-20">
                                                <div class="deal-product-content ">
                                                    <h5><a href="/product/detail/{{$item->id}}" title="{{$item->name}}">{{$item->name}}</a></h5>
                                                    <!--Product Price-->
                                                    <div class="product-price">
                                                        <span class="new-price">{!!$item->price_with_discount_format!!}</span>
						                                @if($item->discount)
						                                <span class="old-price">{!!$item->price_with_format!!}</span>
						                                @endif
                                                    </div>
                                                    <!--Product Rating-->
                                                    <div class="rating-icon">
                                                        {!!$item->star!!}
                                                    </div>
                                                    <!--Product Action-->
                                                    <p>{{$item->desc}}</p>
                                                    <div class="deal-product-action">
                                                        <a href="JavaScript:Helper.Cart.add({{$item->id}})" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                                        <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal"><i class="fa fa-expand"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                          
                                    </div>
                                    @endforeach
                                </div>
                                @else
	                            <div class="no-data">{{__('common.no_data')}}</div>
	                            @endif
                            </div>
                        </div>
                        @if($products->count())
                        <div class="shop-toolbar mt-30">
                            {{$products->links('widget.paginator')}}
                        </div>
                        @endif
                    </div>
                   
                    <!--Shop Sidebar Start-->
                    <div class="col-lg-3 col-12 mb-30">
                        
                        <!--Sidebar Wrap Start-->
                        <div class="sidebar-wrap border p-3">
                       
                            <!--Sidebar Area Title Start-->
							<form method="POST" id="search">                            
                          		@csrf
								<!--Category Start-->
	                            <div class="sidebar" @if($category??null) style="display:none" @endif>
	                               
	                                <h6 class="sidebar-title">{{__('common.category')}}</h6>
	                                
	                                <div class="sidebar-selects">
	                                    <ul>
	                                    	@foreach($categories as $item)
	                                        <li>
												<label>
													<input 
														type="checkbox" 
														name="categories[]" 
														value="{{$item->id}}" 
														@if(in_array($item->id,\Session::get('categories')??[])) checked @endif>
													<span> {{$item->name}}</span>
												</label>
												<ul style="padding-left: 24px">
													@foreach($item->children as $subitem)
													<li>
														<label>
															<input 
																type="checkbox" 
																name="categories[]" 
																value="{{$subitem->id}}" 
																@if(in_array($subitem->id,\Session::get('categories')??[])) checked @endif>
															<span> {{$subitem->name}}</span>
														</label>
													</li>
													@endforeach
												</ul>
											</li>
	                                        @endforeach
	                                    </ul>
	                                </div>
	                                
	                            </div>
								
								
	                            <!--Sidebar Start-->
	                            <div class="sidebar">
	                               
	                                <h6 class="sidebar-title">{{__('common.price')}}</h6>
	                                
	                                <div class="sidebar-price">
	                                    <span class="price-label">{{__('common.range')}}: <span class="price-amount"></span></span>
	                                    <div class="price-range-wrap">
	                                        <div id="price-range"></div>
	                                        <input type="hidden" id="min_price" name="min_price" value="{{\Session::get('min_price')}}">
	                                        <input type="hidden" id="max_price" name="max_price" value="{{\Session::get('max_price')}}">
	                                    </div>
	                                </div>
	                                
	                            </div><!--Sidebar End-->
	                            
	                            <!--Sidebar Start-->
	                            <div class="sidebar">
	                               
	                                <h6 class="sidebar-title">{{__('common.size')}}</h6>
	                                
	                                <div class="sidebar-selects">
	                                    <ul>
	                                    	@foreach(\App\Models\Size::countProduct()->get() as $size)
	                                        <li>
												<label>
													<input 
														type="checkbox" 
														name="size[]" 
														value="{{$size->id}}" 
														@if(in_array($size->id,\Session::get('size')??[])) checked @endif>
													<span> {{$size->name}} ( {{$size->total}} )</span>
												</label>
											</li>
	                                        @endforeach
	                                    </ul>
	                                </div>
	                                
	                            </div><!--Sidebar End-->
	                            
	                            <!--Sidebar Start-->
	                            <div class="sidebar">
	                               
	                                <h6 class="sidebar-title">{{__('common.color')}}</h6>
	                                
	                                <div class="sidebar-selects">
	                                    <ul>
	                                        @foreach(\App\Models\Color::countProduct()->get() as $color)
	                                        <li>
												<label>
													<input 
														type="checkbox" 
														name="color[]" 
														value="{{$color->id}}" 
														@if(in_array($color->id,\Session::get('color')??[])) checked @endif>
													<span> {{$color->name}} ( {{$color->total}} )</span>
												</label>
											</li>
	                                        @endforeach
	                                    </ul>
	                                </div>
	                                
	                            </div><!--Sidebar End-->

	                            <button type="submit" class="btn btn-sm btn-block">{{__('common.search')}}</button>
	                        </form>
                            
                        </div><!--Sidebar Wrap End-->
                        
                        <div class="banner-image">
                            <a href="#"><img alt="" src="img/banner/28.jpg"></a>
                        </div>
                        
                    </div><!--Shop Sidebar End-->
               
                </div>
            </div>
        </div>
        <!-- All Product Side Bar Area End -->
	@include('widget.brand')
@endsection
@section('js')
<script type="text/javascript">
	$(document).ready(()=>{
		var max = {{App\Models\Product::max('price')}};
		var min_price = {{\Session::get('min_price')??0}};
		var max_price = {{\Session::get('max_price')??0}} || max;
		var unit = 1000;
		function format(num){
			var unit = '';
			if(num >= 1000) {
				unit = "K";
				num = (num/1000).toFixed(0)
			}
			if(num >= 1000) {
				unit = "M";
				num = (num/1000).toFixed(1)
			}
			return num + unit;
		}
		function slide(){
			var min_price = $("#price-range").slider("values", 0);
			var max_price = $("#price-range").slider("values", 1);
			$(".price-amount").text(format(min_price) + '-' + format(max_price))
			$('#min_price').val(min_price)
			$('#max_price').val(max_price)
		}
		$("#price-range").slider({
	        range: true,
	        min: 0,
	        max: max,
			step: unit,
	        values: [ min_price, max_price ],
	        slide: slide
	    });
		slide();
	    //$(".price-amount").text("$"+$("#price-range").slider("values", 0)+" - $"+$("#price-range").slider("values", 1));
		$('[name="categories[]"]').change(function(){
			console.log(this.checked)
			$(this).parent().next().find('[name="categories[]"]').prop("checked", this.checked)
		})
		$('.deal-product-action a').click(function(event){
			event.preventDefault()
		})
	})
</script>
@endsection
