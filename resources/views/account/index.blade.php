@extends('layouts.master.master')

@section('content')
	<!-- Breadcrumbs Area Start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="index.html"><i class="fa fa-home"></i>@lang('Home')</a></li>
                    <li class="active">@lang('My account')</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs Area End -->
        	
		<!-- Account Area Start -->
		<div class="account-area section-padding-sm">
			<div class="container">
                <div class="row mb-n30">

                    @include('account.sidebar')

                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12 mb-30">
                        @include('account.profile')
                    </div>
                    <!-- My Account Tab Content End -->
                    
                </div>
			</div>
		</div>
		<!-- Account Area End -->
	@include('widget.brand')
@endsection
