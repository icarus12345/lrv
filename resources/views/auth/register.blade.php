@extends('layouts.master.master')

@section('content')


<!-- Account Area Start -->
<div class="section-padding-sm">
	<div class="container">
		<div class="mb-n30">

			<div class="mb-30" style="margin: auto; max-width: 480px">
				<div class="block-title">
					<h5 class="title">@lang('Create an account')</h5>
				</div>
				<form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
					@csrf
					<div class="row mb-n20">
						<div class="col-md-12 col-12 mb-20">
							<label>{{ __('Full name') }}</label>
							<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="col-md-12 col-12 mb-20">
							<label>{{ __('E-Mail Address') }}</label>
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="col-md-12 col-12 mb-20">
							<label>{{ __('Password') }}</label>
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="col-md-12 col-12 mb-20">
							<label>{{ __('Confirm Password') }}</label>
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
						</div>
						<div class="col-12 mb-50">					
							<button class="btn" type="submit">{{ __('Register') }}</button>
						</div>
					</div>
				</form>
			</div>
			
			
			
		</div>
	</div>
</div>
<!-- Account Area End -->
@endsection
