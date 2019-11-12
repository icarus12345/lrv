@extends('layouts.master.master')

@section('content')
		<!-- Breadcrumbs Area Start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/"><i class="fa fa-home"></i>{{__('common.home')}}</a></li>
                    
                    @if(isset($category))
                    <li ><a href="/blog">{{__('common.blog')}}</a></li>
                    <li class="active">{{$category->name}}</li>
                    @else
                    <li class="active">{{__('common.blog')}}</li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs Area End -->
		
		<!-- Blog Page Start -->
        <div class="section-padding-sm">
            <div class="container">
                <div class="row mb-n40">
                    
                    <div class="col-12 col-lg-9 order-lg-2 mb-40">
                        @if($posts->count())
                        <div class="row mb-n40">
                            @foreach($posts as $item)
                            <div class="single-blog col-12 mb-40">
                                <div class="thumbnail">
                                    <a href="/blog/detail/{{$item->id}}">
                                        <div class="cover blog-thumb" style="background-image:url('{{$item->image_path}}')" ></div>
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="date">
                                        <span class="day">{{ \Carbon\Carbon::parse($item->created_at)->format('d') }}</span>
                                        <span class="month">{{ \Carbon\Carbon::parse($item->created_at)->format('M') }}</span>
                                    </div>
                                    <h2 class="title">
                                        <a href="/blog/detail/{{$item->id}}">{{$item->title}}</a>
                                    </h2>
                                    <div class="entry-meta">
                                        @lang('Posted by')
                                        <span class="author vcard">
                                            <a href="#" class="url fn n" title="View all posts by admin">admin</a>
                                        </span> 
                                        /
                                        <a href="/blog/category/{{$item->category_id}}">{{$item->category->name}}</a>                               
                                    </div>
                                    <div class="summary">
                                        <p>{!!$item->desc!!}</p>
                                    </div>
                                    <a href="/blog/detail/{{$item->id}}" class="readmore">@lang('Read more')</a>
                                </div>
                            </div>

                            @endforeach
                                
                            
                            <div class="col-md-12 mb-40">
                                <div class="justify-content-between row mb-n3">
                                    
                                    {{$posts->links('widget.paginator')}}
                                    
                                </div>
                            </div>
                            
                        </div>
                        @else
                        <div class="no-data">{{__('common.no_data')}}</div>
                        @endif
                    </div>
                   
                    <div class="col-12 col-lg-3 mb-40">
						
                        <!--Blog Sidebar Start-->
                        <div class="blog-sidebar">
                            
                            <h6 class="blog-sidebar-title"><span>{{__('common.category')}}</span></h6>
                            
							
							<ul class="blog-sidebar-list">
								@foreach($categories as $item)
								<li>
									<a href="/blog/category/{{$item->id}}">{{$item->name}}</a>
									<ul style="padding-left: 24px">
										@foreach($item->children as $subitem)
											<a href="/blog/category/{{$subitem->id}}">{{$subitem->name}}</a>
										@endforeach
									</ul>
								</li>
								@endforeach
							</ul>
                            
                        </div><!--Blog Sidebar End-->
                    
                        @include('widget.recent-blog')
                    
                        <!--Blog Sidebar Start-->
                        <div class="blog-sidebar">
                            
                            <h6 class="blog-sidebar-title"><span>{{__('common.popular_tags')}}</span></h6>
                            
                            <div class="blog-sidebar-tags">
                                <a href="#">Clothing</a>
                                <a href="#">Accessories</a>
                                <a href="#">Fashion</a>
                                <a href="#">Footwear</a>
                                <a href="#">Good</a>
                                <a href="#">Kid</a>
                                <a href="#">Men</a>
                                <a href="#">Women</a>
                            </div>
                            
                        </div><!--Blog Sidebar End-->
                        
                        @include('widget.archive-blog')
                        
                    </div>
               
                </div>
            </div>
        </div>
        <!-- Blog Page End -->
		
		@include('widget.brand')
@endsection
