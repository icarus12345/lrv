<!--Brand Area Start-->
<div class="brand-area section-padding-sm">
	<div class="container">
		<div class="row">		            
			<div class="brand-slider">
				@foreach(\App\Models\Banner::where('type','brand')->get() as $item)
				<div class="col-md-12">
					<div class="single-brand">
						<a href="{{$item->link}}">
							<div class="cover blog-thumb2" style="background-image:url('{{$item->image_path}}')" ></div>
						</a>
					</div>
				</div>
				@endforeach                    
			</div>
		</div>
	</div>
</div>
<!--Brand Area End-->