@extends('layouts.master.master')

@section('content')
<div class="section-padding-sm">
	<div class="container mb-50">
		<div class=" mb-n30">
			<div class=" mb-30" style="margin: auto; max-width: 480px">
				<div class="block-title">
					<h5 class="title">{{ __('Verify Your Email Address') }}</h5>
				</div>
				@if (session('resent'))
					<div class="alert alert-success" role="alert">
						{{ __('A fresh verification link has been sent to your email address.') }}
					</div>
				@endif
				<div>
				{{ __('Before proceeding, please check your email for a verification link.') }}
				{{ __('If you did not receive the email') }}.
				</div>
				<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
					@csrf
					<button type="submit" class="btn ">{{ __('click here to request another') }}</button>.
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
