@extends('layouts.master.master')
@section('content')


<!-- Account Area Start -->
<div class="section-padding-sm">
	<div class="container">
		<div class=" mb-n30">
			<div class=" mb-30" style="margin: auto; max-width: 480px">
				<div class="block-title">
					<h5 class="title">{{ __('Reset Password') }}</h5>
				</div>
				@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
				@endif
				<form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate>
					@csrf
					<div class="row mb-n20">
						<div class="col-md-12 col-12 mb-20">
							<label>{{ __('E-Mail Address') }}</label>
							<input 
								id="email" 
								type="email" 
								class="form-control @error('email') is-invalid @enderror" 
								name="email" 
								value="{{ old('email') }}" 
								required 
								autocomplete="email" 
								autofocus>
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="col-12 mb-50">					
							<button type="submit" class="btn">{{ __('Send Password Reset Link') }}</button>
						</div>
						
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
<!-- Account Area End -->
@endsection

