@extends('layouts.master.master')

@section('content')
	<!-- Breadcrumbs Area Start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/"><i class="fa fa-home"></i>{{__('common.home')}}</a></li>
                    <li class="active">{{__('common.about')}}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs Area End -->   
        
        <div class="section-padding">
            <div class="container">
                <div class="section-title text-center">
                    <h3 class="title">{{__('common.about')}}</h3>
                </div>
                <div class="row mb-n25">
                
                    <div class="col-lg-5 col-12 mb-25 order-lg-2">
                        <img src="{{$content->image??'/assets/themes/gid/img/about/ab.jpg'}}" alt="" />
                    </div>
                    
                    <div class="col-lg-7 col-12 mb-25">
                        <h4>{{$content->title}}</h4>
                        <div>
                            {!!$content->content!!}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
       
        <!-- Our Team Start -->     
        <div class="section-padding pt-0">
            <div class="container">
                <div class="section-title text-center">
                    <h3 class="title">{{__('common.meet_the_team')}}</h3>
                </div>
                <div class="row">
					@foreach(\App\Models\Team::all() as $item)
                    <div class="col-md-3 col-sm-4">
                        <div class="team">
                            <div class="team-image">
                                <img width="250" height="250" src="{{$item->image_path}}" class="img-responsive" alt="team4">
                                <div class="mask">
                                    <div class="mask-inner">
                                        <a href="{{$item->fb_link}}"><i class="fa fa-facebook"></i></a>
                                        <a href="{{$item->tw_link}}"><i class="fa fa-twitter"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-info">
                                <h5>{{$item->name}}</h5>
                                <h6>{{$item->position}}</h6>
                            </div>
                        </div>
                    </div>
					@endforeach
                    
                </div>
            </div>
        </div>
        <!-- Our Team Start --> 
	@include('widget.brand')
@endsection
