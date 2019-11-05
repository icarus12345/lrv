<div class="container">

<!--Featured Area Start-->
<div class="featured-area section-padding">
	<div class="-container-fluid">
	
		<div class="section-title title-shape text-center">
			<h4 class="title">Featured products</h4>
		</div>
	
		<div class="row">
			<!--Product Slider Start-->
			<div class="product-slider indicator-style">
				@foreach( $products as $item )
				<!--Single Product -->
				<div class="col-12">
					<div class="single-product">
						<!--product Content-->
						<div class="product-img-content">
							<!--Product Image-->
							<div class="product-img">
								<a href="product/detail/{{$item->id}}" title="{{$item->name}}">
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
			<!--Product Slider End-->
		</div>
	</div>
</div>
</div>
<!--Featured Area End-->