@extends('layouts.master.master')

@section('content')
	<!-- Breadcrumbs Area Start -->
	<div class="breadcrumbs-area">
		<div class="container">
			<ul class="breadcrumbs">
				<li><a href="index.html"><i class="fa fa-home"></i>Home</a></li>
				<li class="active">{{$product->name}}</li>
			</ul>
		</div>
	</div>
	<!-- Breadcrumbs Area End -->
	
	<!-- Product Simple Area Start -->
        <div class="single-product-area section-padding-sm pb-0">
            <div class="container">
            
                <div class="row mb-n30">
                
                    <div class="col-lg-4 col-md-5 col-12 mb-30">
                        <div class="single-product-image tab-content">
							@if($product->pictures)
							@foreach($product->pictures as $i=>$image)
                            <div class="tab-pane @if($i==0) active @endif" id="view{{$i}}">
                                <a class="venobox" href="/storage/{{$image}}" data-gall="gallery" title="">
									<img src="/storage/{{$image}}" alt="">
									<span>View larger<i class="fa fa-search-plus"></i></span>
								</a>
                            </div>
							@endforeach
							@else
							<div class="tab-pane active" id="view1">
                                <a class="venobox" href="{{$product->image}}" data-gall="gallery" title="">
									<img src="{{$product->image}}" alt="">
									<span>View larger<i class="fa fa-search-plus"></i></span>
								</a>
                            </div>
							@endif
                        </div>
                        <div class="single-product-thumb">
                            <div class="thumb-slider">
								@if($product->pictures)
								@foreach($product->pictures as $i=>$image)
                                <a href="#view{{$i}}"><img src="/storage/{{$image}}" alt=""></a>
								@endforeach
								@else
                                <a href="#view1"><img src="{{$product->image}}" alt=""></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-5 col-md-7 col-12 mb-30">
                        <div class="single-product-content">
                            <h4 class="title">{{$product->name}}</h4>
                            <div class="clearfix">
                                <div class="rating-icon mb-2">
                                    {!!$product->star!!}
                                </div>
                            </div>
                            <div class="other-info">
                                <div class="-product-price">
                                    <span class="new-price">{!!$product->price_with_discount_format!!}</span>
                                    @if($product->discount)
                                    <span class="old-price">{!!$product->price_with_format!!}</span>
                                    @endif
                                </div>
                                
                                <p class="reference"><label>Reference: </label> <span>{{$product->category->name}}</span></p>
                                <p class="condition"><label>Condition: </label> <span>{{$product->label}}</span></p>
                            </div>
                            <div class="description">
                                <p>{{$product->desc}}</p>
                            </div>
                            <div class="stock-info">
                                <p>{{$product->instock}} Items <span class="badge badge-success">In stock</span></p>
                            </div>
                            <div class="size-color-options">
                                <div class="option">
                                    <label>Size</label>
                                    <select>
                                        @if($product->sizes)
                                        @foreach($product->sizes as $size)
                                        <option value="{{$size->id}}">{{$size->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="option">
                                    <label>Color</label>
                                    <select>
                                        @if($product->colors)
                                        @foreach($product->colors as $color)
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>                                       
                                </div>
                            </div>
                            <div class="actions">
                                <div class="action single-product-quantity product-quantity">
                                    <button class="dec qtybtn">-</button>
                                    <input type="text" value="1">
                                    <button class="inc qtybtn">+</button>   
                                </div>
                                <a href="cart.html" class="action btn add-to-cart-btn"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></a>
                                <a href="#" class="action btn box"><i class="fa fa-envelope"></i></a>
                                <a href="#" class="action btn box"><i class="fa fa-print"></i></a>
                            </div>
                            <div class="social-sharing">
                                <a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i>Tweet</a>
                                <a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i> Share</a>
                                <a href="#" class="btn btn-google-plus"><i class="fa fa-google-plus"></i> Google+</a>
                                <a href="#" class="btn btn-pinterest"><i class="fa fa-pinterest"></i> Pinterest</a>
                            </div>
                        </div>
                        
                    </div>
                
                    <div class="col-lg-3 col-md-12 col-12 mb-30">
                    
                        <div class="block-title"><h5 class="title">Top sellers</h5></div>
                       
                        <div class="product-slider-5">
                            @for ($i = 0; $i < $top_sales->count(); $i+=3)
                            <div class="single-p-item mb-n25">
                                @for ($j = $i;$j<$i+3 && $j <= $top_sales->count(); $j++)
                                <?php $product = $top_sales[$j]; ?>
                                <!-- Single Product -->
                                <div class="single-product row mb-3">
                                    <div class="col-lg-6 col-md-4 col-4 mb-2">
                                        <div class="product-img">
                                            <a href="/product/detail/{{$product->id}}" title="{{$product->name}}">
                                                <div class="cover prod-thumb" style="background-image:url('{{$product->image_path}}')" ></div>
                                            </a>                                            
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-8 mb-2">
                                        <div class="product-content d-flex flex-column">
                                            <h5><a href="/product/detail/{{$product->id}}" title="{{$product->name}}">{{$product->name}}</a></h5>
                                            <!--Product Rating-->
                                            <div class="rating-icon mb-2">
                                                {!!$product->star!!}
                                            </div>
                                            <!--Product Price-->
                                            <div class="product-price">
                                                <span class="new-price">{!!$product->price_with_discount_format!!}</span>
                                                @if($product->discount)
                                                <span class="old-price">{!!$product->price_with_format!!}</span>
                                                @endif
                                            </div>  
                                        </div>
                                    </div>
                                </div>  
                                @endfor                             
                            </div>
                            @endfor
                                                         
                        </div>
                        
                    </div>
                    
                    <div class="col-md-12 mb-30 mt-3">
                        <ul class="nav product-details-tab-list">
                            <li><a class="active" href="#more-info" data-toggle="tab">MORE INFO</a></li>
                            <li><a href="#data" data-toggle="tab">DATA SHEET</a></li>
                            <li><a href="#reviews" data-toggle="tab">REVIEWS</a></li>
                        </ul>
                        <div class="tab-content product-details-tab-content">
                            <div class="tab-pane active" id="more-info">
                                <div class="product-details-description">
                                    {!!$product->content!!}
                                </div>
                            </div>
                            <div class="tab-pane" id="data">
                                {!!$product->data_set!!}
                            </div>
                            <div class="tab-pane" id="reviews">
                                <a href="#" class="comment-btn"><span>Be the first to write your review!</span></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Product Simple Area End -->

        @include('widget.similar')
        @include('widget.brand')
@endsection
