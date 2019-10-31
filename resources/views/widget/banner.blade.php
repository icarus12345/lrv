<!--Banner Area Start-->
<div class="banner-area section-padding pt-0">
	<div class="container-fluid">
		<div class="row mb-n30">
			<div class="col-md-3 col-12 mb-30">
				<div class="banner-image">
					@if($banners[0])
					   	<a href="{{$banners[0]->link}}"><img src="{{$banners[0]->image}}" alt="{{$banners[0]->name}}"/></a>
				   	@endif
				</div>
			</div>
			<div class="col-md-6 col-12 mb-30">
				<div class="banner-image mb-30">
					@if($banners[1])
					   	<a href="{{$banners[1]->link}}"><img src="{{$banners[1]->image}}" alt="{{$banners[1]->name}}"/></a>
				   	@endif
				</div>
				<div class="row mb-n30">
					<div class="col-md-6 col-12 mb-30"> 
						<div class="banner-image">
							@if($banners[3])
							   	<a href="{{$banners[3]->link}}"><img src="{{$banners[3]->image}}" alt="{{$banners[3]->name}}"/></a>
						   	@endif
						</div>
					</div>
					<div class="col-md-6 col-12 mb-30"> 
						@if($banners[4])
						   	<a href="{{$banners[4]->link}}"><img src="{{$banners[4]->image}}" alt="{{$banners[4]->name}}"/></a>
					   	@endif
					</div>
				</div>
			</div>
			<div class="col-md-3 col-12 mb-30">
				<div class="banner-image">
					@if($banners[2])
					   	<a href="{{$banners[2]->link}}"><img src="{{$banners[2]->image}}" alt="{{$banners[2]->name}}"/></a>
				   	@endif
				</div>
			</div>			
		</div>
	</div>
</div>
<!--Banner Area End-->