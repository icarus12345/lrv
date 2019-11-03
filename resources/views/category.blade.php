@extends('layouts.master.master')

@section('content')
		<div class="breadcrumbs-area">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="index.html"><i class="fa fa-home"></i>Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li class="active">{{$category->name}}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs Area End -->

        <!-- All Product Side Bar Area Start -->
        <div class="section-padding-sm">
            <div class="container">
                <div class="row mb-n30">
                    
                    <div class="col-lg-9 col-12 mb-30">
                    
                        <div class="page-category-banner mb-30"><img src="img/bedroom.jpg" alt="" /></div>
                        
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
                                <div class="row mb-n30">
                                	@foreach($products as $item)
                                    <div class="col-md-4 col-12 mb-30">
                                        <div class="single-product">
                                            <!--product Content-->
                                            <div class="product-img-content">
                                                <!--Product Image-->
                                                <div class="product-img">
                                                    <a href="product-details.html" title="{{$item->name}}">
                                                        <div class="cover prod-thumb" style="background-image:url('{{$item->image_path}}')" ></div>
                                                    </a>                                            
                                                </div>
                                                @if($item->label)
												<span class="new-label">{{$item->label}}</span>
												@endif
                                                <!--Product Action-->
                                                <div class="product-action">
                                                    <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                                    <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal"><i class="fa fa-expand"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h5><a href="product-details.html" title="{{$item->name}}">{{$item->name}}</a></h5>
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
                            </div>
                            <div role="tabpanel" class="tab-pane" id="list">
                                <div class="row mb-n30">
                                	@foreach($products as $item)
                                    <div class="single-shop-product col-12 mb-30">
                                        <div class="row mb-n20">
                                            <div class="col-md-4 col-12 mb-20">
                                               <div class="left-item">
                                                    <!--Product Image-->
                                                    <a href="product-details.html" title="{{$item->name}}">
                                                        <div class="cover prod-thumb" style="background-image:url('{{$item->image_path}}')" ></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-12 mb-20">
                                                <div class="deal-product-content ">
                                                    <h5><a href="product-details.html" title="{{$item->name}}">{{$item->name}}</a></h5>
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
                                                        <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                                        <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal"><i class="fa fa-expand"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                          
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <div class="shop-toolbar mt-30">
                            
                            {{$products->links('widget.paginator')}}
                        </div>
                        
                    </div>
                   
                    <!--Shop Sidebar Start-->
                    <div class="col-lg-3 col-12 mb-30">
                        
                        <!--Sidebar Wrap Start-->
                        <div class="sidebar-wrap border p-3">
                       
                            <!--Sidebar Area Title Start-->
							<form method="POST" id="search">                            
                          		@csrf
                            
	                            <!--Sidebar Start-->
	                            <div class="sidebar">
	                               
	                                <h6 class="sidebar-title">Price</h6>
	                                
	                                <div class="sidebar-price">
	                                    <span class="price-label">Range: <span class="price-amount"></span></span>
	                                    <div class="price-range-wrap">
	                                        <div id="price-range"></div>
	                                        <input type="hidden" id="min_price" name="min_price" value="{{\Session::get('min_price')}}">
	                                        <input type="hidden" id="max_price" name="max_price" value="{{\Session::get('max_price')}}">
	                                    </div>
	                                </div>
	                                
	                            </div><!--Sidebar End-->
	                            
	                            <!--Sidebar Start-->
	                            <div class="sidebar">
	                               
	                                <h6 class="sidebar-title">Size</h6>
	                                
	                                <div class="sidebar-selects">
	                                    <ul>
	                                    	@foreach(\App\Models\Size::countProduct()->get() as $size)
	                                        <li><label><input type="checkbox" name="size[]" value="{{$size->id}}" @if(in_array($size->id,\Session::get('size'))) checked @endif><span> {{$size->name}} ( {{$size->total}} )</span></label></li>
	                                        @endforeach
	                                    </ul>
	                                </div>
	                                
	                            </div><!--Sidebar End-->
	                            
	                            <!--Sidebar Start-->
	                            <div class="sidebar">
	                               
	                                <h6 class="sidebar-title">Color</h6>
	                                
	                                <div class="sidebar-selects">
	                                    <ul>
	                                        @foreach(\App\Models\Color::countProduct()->get() as $color)
	                                        <li><label><input type="checkbox" name="color[]" value="{{$color->id}}" @if(in_array($color->id,\Session::get('color'))) checked @endif><span> {{$color->name}} ( {{$color->total}} )</span></label></li>
	                                        @endforeach
	                                    </ul>
	                                </div>
	                                
	                            </div><!--Sidebar End-->

	                            <button type="submit" class="btn btn-sm btn-block">Search</button>
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
		$("#price-range").slider({
	        range: true,
	        min: 0,
	        max: {{App\Models\Product::max('price')}},
	        values: [ $('#min_price').val(), $('#max_price').val() ],
	        slide: function( event, ui ) {
	            $(".price-amount").text("$"+ui.values[0]+" - $"+ui.values[1]);
	            $('#min_price').val(ui.values[0])
	            $('#max_price').val(ui.values[1])
	        }
	    });
	    $(".price-amount").text("$"+$("#price-range").slider("values", 0)+" - $"+$("#price-range").slider("values", 1));
	})
</script>
@endsection
