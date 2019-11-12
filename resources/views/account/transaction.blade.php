@extends('layouts.master.master')

@section('content')
	<!-- Breadcrumbs Area Start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="index.html"><i class="fa fa-home"></i>@lang('Home')</a></li>
                    <li class="active">@lang('Orders History')</li>
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
                        <div class="myaccount-content">
							<h5>@lang('Orders History')</h5>
							<div class="account-details-form">
								<div class="-table-responsive">
    								<table class="table m-0">
    									<thead>
    										<tr>
    											<th class="pt-0 border-top-0">{{__('validation.attributes.date')}}</th>
    											<th class="pt-0 border-top-0">No</th>
    											<th class="pt-0 border-top-0 text-right text-nowrap">{{__('cart.total')}}</th>
    											<th class="pt-0 border-top-0 text-right text-nowrap">{{__('validation.attributes.status')}}</th>
    										</tr>							
    									</thead>
    									<tbody>
											@if($orders->count())
											@foreach($orders as $item)
												<tr>
													<td><a href="/order/{{$item->no}}?token={{$item->token}}">{{ \Carbon\Carbon::parse($item->created_at)->format('M, d Y') }}</a></td>
													<td><a href="/order/{{$item->no}}?token={{$item->token}}">{{$item->no}}</a></td>
													<td class="text-right text-nowrap"><a href="/order/{{$item->no}}?token={{$item->token}}">{!! \App\Helpers::formatPrice($item->total_amount, $item->currency)!!}</a></td>
													<td class="text-right text-nowrap"><a href="/order/{{$item->no}}?token={{$item->token}}">{{__("order.status.{$item->status}")}}</a></td>
												</tr>
											@endforeach
											@else
												<tr><td colspan="4" class="no-data">{{__('common.no_data')}}</td></tr>
											@endif
										</tbody>
									</table>
									<div class="col-md-12 mb-40">
										<div class="justify-content-between row mb-n3">
											
											{{$orders->links('widget.paginator')}}
											
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <!-- My Account Tab Content End -->
                    
                </div>
			</div>
		</div>
		<!-- Account Area End -->
	@include('widget.brand')
@endsection
