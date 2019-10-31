<!--Featured Area Start-->
<div class="featured-area section-padding">
	<div class="container-fluid">
	
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
								<a href="product-details.html" title="{{$item->name}}">
									<img src="{{$item->image}}" alt="">
								</a>		                                    
							</div>
							<span class="new-label">New</span>
							<!--Product Action-->
							<div class="product-action">
								<a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
								<a href="#" title="Quick view" data-toggle="modal" data-target="#productModal"><i class="fa fa-expand"></i></a>
							</div>
						</div>
						<div class="product-content">
							<h5><a href="product-details.html" title="Printed Dress">{{$item->name}}</a></h5>
							<!--Product Rating-->
							<div class="rating-icon">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<!--Product Price-->
							<div class="product-price">
								<span class="new-price">{{$item->price}}</span>
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
<!--Featured Area End-->