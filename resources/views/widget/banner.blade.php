<!--Banner Area Start-->
<div class="banner-area section-padding pt-0">
	<div class="container-fluid">
		<div class="row mb-n30">
			<div class="col-md-3 col-12 mb-30">
				<div class="banner-image">
					@if($banners[0])
					   	<a href="{{$banners[0]->link}}">
					   		<div class="cover h2x" style="background-image:url('{{$banners[0]->image}}')" ></div>
					   	</a>
				   	@endif
				</div>
			</div>
			<div class="col-md-6 col-12 mb-30">
				<div class="banner-image mb-30">
					@if($banners[1])
					   	<a href="{{$banners[1]->link}}">
					   		<div class="cover w2x" style="background-image:url('{{$banners[1]->image}}')"></div>
					   	</a>
				   	@endif
				</div>
				<div class="row mb-n30">
					<div class="col-md-6 col-12 mb-30"> 
						<div class="banner-image">
							@if($banners[3])
							   	<a href="{{$banners[3]->link}}">
							   		<div class="cover h1x" style="background-image:url('{{$banners[3]->image}}')"></div>
							   	</a>
						   	@endif
						</div>
					</div>
					<div class="col-md-6 col-12 mb-30"> 
						@if($banners[4])
						   	<a href="{{$banners[4]->link}}">
						   		<div class="cover h1x" style="background-image:url('{{$banners[4]->image}}')"></div>
						   	</a>
					   	@endif
					</div>
				</div>
			</div>
			<div class="col-md-3 col-12 mb-30">
				<div class="banner-image">
					@if($banners[2])
					   	<a href="{{$banners[2]->link}}">
					   		<div class="cover h2x" style="background-image:url('{{$banners[2]->image}}')" ></div>
				   	@endif
				</div>
			</div>			
		</div>
	</div>
</div>
<!--Banner Area End-->