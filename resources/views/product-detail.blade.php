@extends('layouts.master.master')

@section('content')
	<!-- Breadcrumbs Area Start -->
	<div class="breadcrumbs-area">
		<div class="container">
			<ul class="breadcrumbs">
				<li><a href="index.html"><i class="fa fa-home"></i>{{__('common.home')}}</a></li>
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
                                <a class="venobox" href="{{$image}}" data-gall="gallery" title="">
									<div class="cover prod-thumb" style="background-image:url('{{$image}}')" ></div>
									<span>View larger<i class="fa fa-search-plus"></i></span>
								</a>
                            </div>
							@endforeach
							@else
							<div class="tab-pane active" id="view1">
                                <a class="venobox" href="{{$product->image}}" data-gall="gallery" title="">
									<div class="cover prod-thumb" style="background-image:url('{{$product->image_path}}')" ></div>
									<span>View larger<i class="fa fa-search-plus"></i></span>
								</a>
                            </div>
							@endif
                        </div>
                        <div class="single-product-thumb">
                            <div class="thumb-slider">
								@if($product->pictures)
								@foreach($product->pictures as $i=>$image)
                                <a href="#view{{$i}}">
                                    <div class="cover prod-thumb" style="background-image:url('{{$image}}')" ></div>
                                </a>
								@endforeach
								@else
                                <a href="#view1">
                                    <div class="cover prod-thumb" style="background-image:url('{{$product->image_path}}')" ></div>
                                </a>
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
                                
                                <p class="reference"><label>{{__('common.category')}}: </label> <span>{{$product->category->name}}</span></p>
                            </div>
                            <div class="description">
                                <p>{{$product->desc}}</p>
                            </div>
                            <div class="stock-info">
                                <p>{{$product->instock}} {{__('cart.items')}} <span class="badge badge-success">{{__('cart.instock')}}</span></p>
                            </div>
                            <div class="size-color-options">
								@if($product->sizes->count())
                                <div class="option">
                                    <label>Size</label>
                                    <select id="size">
                                        @foreach($product->sizes as $size)
                                        <option value="{{$size->id}}">{{$size->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
								@endif
								@if($product->colors->count())
                                <div class="option">
                                    <label>Color</label>
                                    <select id="color">
                                        @foreach($product->colors as $color)
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                        @endforeach
                                    </select>                                       
                                </div>
								@endif
                            </div>
                            <div class="actions">
                                <div class="action single-product-quantity product-quantity">
                                    <button class="dec qtybtn">-</button>
                                    <input type="text" value="1" id="quanlity" max="{{$product->instock??0}}" min="1">
                                    <button class="inc qtybtn">+</button>   
                                </div>
                                <a href="JavaScript:addTocart()" class="action btn add-to-cart-btn"><i class="fa fa-shopping-cart"></i><span>{{__('cart.add_to_cart')}}</span></a>
                            </div>
                            <div class="social-sharing">
                                <a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i>Tweet</a>
                                <a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i> Share</a>
                                <a href="#" class="btn btn-google-plus"><i class="fa fa-google-plus"></i> Google+</a>
                            </div>
                        </div>
                        
                    </div>
                
                    <div class="col-lg-3 col-md-12 col-12 mb-30">
                    
                        <div class="block-title"><h5 class="title">{{__('common.top_sale')}}</h5></div>
                       
                        <div class="product-slider-5">
                            @for ($i = 0; $i < $top_sales->count(); $i+=3)
                            <div class="single-p-item mb-n25">
                                @for ($j = $i;$j<$i+3 && $j <= $top_sales->count(); $j++)
                                <?php $item = $top_sales[$j]; ?>
                                <!-- Single Product -->
                                <div class="single-product row mb-3">
                                    <div class="col-lg-6 col-md-4 col-4 mb-2">
                                        <div class="product-img">
                                            <a href="/product/detail/{{$item->id}}" title="{{$item->name}}">
                                                <div class="cover prod-thumb" style="background-image:url('{{$item->image_path}}')" ></div>
                                            </a>                                            
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-8 mb-2">
                                        <div class="product-content d-flex flex-column">
                                            <h5><a href="/product/detail/{{$item->id}}" title="{{$item->name}}">{{$item->name}}</a></h5>
                                            <!--Product Rating-->
                                            <div class="rating-icon mb-2">
                                                {!!$item->star!!}
                                            </div>
                                            <!--Product Price-->
                                            <div class="product-price">
                                                <span class="new-price">{!!$item->price_with_discount_format!!}</span>
                                                @if($product->discount)
                                                <span class="old-price">{!!$item->price_with_format!!}</span>
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
                            <li><a class="active" href="#more-info" data-toggle="tab">{{__('common.more_info')}}</a></li>
                            <li><a href="#data" data-toggle="tab">{{__('common.data_set')}}</a></li>
                            <li><a href="#reviews" data-toggle="tab">{{__('common.reviews')}}</a></li>
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
                                @include('widget.comment.home',[
									'topic_type'=>'product', 
									'topic_id'=>$product->id
									])
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
@section('js')
<script type="text/javascript">
	function addTocart(){
		var size = $('#size').val();
		var color = $('#color').val();
		var quanlity = $('#quanlity').val();
		Helper.Cart.add({{$product->id}}, quanlity, size, color)
	}
</script>
@endsection