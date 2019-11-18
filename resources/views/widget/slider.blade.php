<div class="-container">

<!-- Slider With Banner Area -->
<div class="slider-with-banner-area">
	<div class="row no-gutters">
		<div class="col-md-6 col-12">
			<!--Slider Area Start-->
			<div class="slider-area">
				<div class="bend niceties preview-1">
					<div id="ensign-nivoslider-3" class="slides"> 
						@if($sliders[0])
					   	<a href="{{$sliders[0]->link}}" style="display: block;">
							<div class="cover cell-1x1" style="background-image:url('{{$sliders[0]->image_path}}');"></div>
						</a>
					   	@endif
						@if($sliders[1])
					   	<a href="{{$sliders[1]->link}}" style="display: block;">
							<div class="cover cell-1x1" style="background-image:url('{{$sliders[1]->image_path}}');"></div>
						</a>
					  	 @endif
					</div>
				</div>
			</div>
			<!--Slider Area End-->                 
		</div>  
		<div class="col-md-6 col-12">
			<!--Banner Area Start-->
			<div class="banner-area row">
				<div class="col-12">
					<div class="banner-image">
						@if($sliders[2])
					   	<a href="{{$sliders[2]->link}}">
							<div class="cover cell-2x1" style="background-image:url('{{$sliders[2]->image_path}}');"></div>
						</a>
					   	@endif
					</div>
				</div>
				<div class="col-12">
					<div class="row no-gutters">
						<div class="col-6">
							<div class="banner-image">
								@if($sliders[3])
							   	<a href="{{$sliders[3]->link}}">
									<div class="cover cell-1x1" style="background-image:url('{{$sliders[3]->image_path}}');"></div>
								</a>
							   	@endif
							</div>                            
						</div>
						<div class="col-6">
							<div class="banner-image">
								@if($sliders[4])
							   	<a href="{{$sliders[4]->link}}">
									<div class="cover cell-1x1" style="background-image:url('{{$sliders[4]->image_path}}');"></div>
								</a>
							   	@endif
							</div>                            
						</div>
					</div> 
				</div> 
			</div>
			<!--Banner Area End-->                  
		</div>         
	</div>
</div>
</div>
<!-- Slider With Banner Area End -->