<!--Blog Area Start-->
<div class="blog-area section-padding pt-0">
	<div class="container">
	
		<div class="section-title title-shape text-center">
			<h4 class="title">{{__('common.from_the_blog')}}</h4>
		</div>
		
		<div class="row">
			<div class="blog-slider indicator-style">
			    @foreach(\App\Models\Post::newest()->limit(9)->get() as $item)
				<div class="col-12">
					<div class="blog">
						<div class="image">
							<a href="/blog/detail/{{$item->id}}">
								<div class="cover blog-thumb2" style="background-image:url('{{$item->image_path}}')" ></div>
							</a>
						</div>
						<div class="content">
							<h5 class="title"><a href="/blog/detail/{{$item->id}}" class="line-clamp-1">{{$item->title}}</a></h5>
							<span class="date">{{ \Carbon\Carbon::parse($item->created_at)->format('M, d Y') }}</span>
							<div class="desc line-clamp-2">
								<p>{{$item->desc}}</p>
							</div>
						</div>
					</div>
				</div>
				
				@endforeach
				
			</div>
		</div>	
				
	</div>
</div>
<!--Blog Area End-->