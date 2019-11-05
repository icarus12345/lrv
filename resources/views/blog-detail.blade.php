@extends('layouts.master.master')

@section('content')
		<!-- Breadcrumbs Area Start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/"><i class="fa fa-home"></i>{{__('common.home')}}</a></li>
                    
                    <li ><a href="/blog">{{__('common.blog')}}</a></li>
                    <li class="active">{{$post->title}}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs Area End -->
		
		<!-- Blog Page Start -->
        <div class="section-padding-sm">
            <div class="container">
                <div class="row mb-n40">
                    
                    <div class="col-12 col-lg-9 order-lg-2 mb-40">
                        <div class="row mb-n40">

                            <div class="single-blog col-12 mb-40">
                                <div class="thumbnail">
                                    <div class="cover blog-thumb" style="background-image:url('{{$post->image_path}}')" ></div>
                                </div>
                                <div class="content">
                                    <div class="date">
                                        <span class="day">{{ \Carbon\Carbon::parse($post->created_at)->format('d') }}</span>
                                        <span class="month">{{ \Carbon\Carbon::parse($post->created_at)->format('M') }}</span>
                                    </div>
                                    <h2 class="title">
                                        {{$post->title}}
                                    </h2>
                                    <div class="entry-meta">
                                        Posted by
                                        <span class="author vcard">
                                            <a href="#" class="url fn n" title="View all posts by admin">admin</a>
                                        </span> 
                                        /
                                        <a href="/blog/category/{{$post->category_id}}">{{$post->category->name}}</a>                                 
                                    </div>
                                    <div class="summary">
                                        {!!$post->content!!}
                                    </div>
                                    <!--
                                    <div class="entry-meta">
                                        <a href="#">3 comments </a>
                                        <span class="author vcard">/ Tags:</span>
                                         / 
                                         <a href="#">fashion</a>
                                         ,
                                         <a href="#">t-shirt</a>
                                         ,
                                         <a href="#">white</a>
                                    </div>
                                    -->
                                    <!--
                                    <div class="blog-share">
                                        <h6>Share this post</h6>
                                        <ul>
                                            <li>
                                                <a href="#" class="facebook" target="_blank">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="twitter" target="_blank">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="pinterest" target="_blank">
                                                    <i class="fa fa-pinterest"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="google-plus" target="_blank">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="linkedin" target="_blank">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                -->
                                </div>
                            </div>
                            <!--
                            <div class="author-info col-12 mb-40">
                                <div class="author-avatar">
                                    <img src="img/avatar.png" alt="">
                                </div>
                                <div class="author-description">
                                    <h5 class="title">About the Author: <a href="#">Admin</a></h5>
                                    <p>Cras id nulla at metus congue auctor. Suspendisse auctor dictum orci quis interdum. Nullam et eleifend metus. Integer in est orci. Duis hendrerit ex metus, vel tempor sem aliquet nec. Donec ornare hendrerit bibendum. Nullam dui erat, tempus eu nisl vitae, venenatis gravida ipsum. Suspendisse potenti.</p>
                                </div>
                            </div>
                            -->
                            <div class="col-12 mb-40">
                                <div class="comment-list">
                                    <h5>3 comments</h5>
                                    <div class="single-reply">
                                        <div class="comment-author">
                                            <img src="/assets/themes/gid/img/testimonial/1.jpg" alt="">
                                        </div>
                                        <div class="comment-info">
                                            <div class="comment-author-info">
                                                <a href="#">
                                                    <b>admin</b>
                                                </a>
                                                Post author
                                                <span>October 6, 2014 at 1:38 am</span>
                                                <a href="#">Reply</a>
                                            </div>
                                            <p>just a nice post</p>
                                        </div>
                                    </div>
                                    <div class="single-reply user-comment">
                                        <div class="comment-author">
                                            <img src="/assets/themes/gid/img/testimonial/2.jpg" alt="">
                                        </div>
                                        <div class="comment-info">
                                            <div class="comment-author-info">
                                                <a href="#">
                                                    <b>admin</b>
                                                </a>
                                                Post author
                                                <span>October 6, 2014 at 1:38 am</span>
                                                <a href="#">Reply</a>
                                            </div>
                                            <p>just a nice post</p>
                                        </div>
                                    </div>
                                    <div class="single-reply">
                                        <div class="comment-author">
                                            <img src="/assets/themes/gid/img/testimonial/1.jpg" alt="">
                                        </div>
                                        <div class="comment-info">
                                            <div class="comment-author-info">
                                                <a href="#">
                                                    <b>admin</b>
                                                </a>
                                                Post author
                                                <span>October 6, 2014 at 1:38 am</span>
                                                <a href="#">Reply</a>
                                            </div>
                                            <p>just a nice post</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-form">
                                    <h5>Leave a Reply</h5>
                                    <form action="#">
                                        <p>Your email address will not be published. Required fields are marked <span class="required">*</span></p>
                                        <div class="row mb-n20">
                                            <div class="col-md-4 col-12 mb-20">
                                                <label>Name<span class="required">*</span></label>
                                                <input type="text">
                                            </div>
                                            <div class="col-md-4 col-12 mb-20">
                                                <label>Email<span class="required">*</span></label>
                                                <input type="text">
                                            </div>
                                            <!-- <div class="col-md-4 col-12 mb-20">
                                                <label>Website<span class="required">*</span></label>
                                                <input type="text">
                                            </div> -->
                                            <div class="col-12 mb-20">
                                                <label>Comment</label>
                                                <textarea></textarea>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <input type="submit" value="Leave a Comment">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
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
