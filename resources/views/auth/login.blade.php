@extends('layouts.master.master')

@section('content')


<!-- Account Area Start -->
<div class="section-padding-sm">
	<div class="container">
		<div class=" mb-n30">
			<div class=" mb-30" style="margin: auto; max-width: 480px">
				<div class="block-title">
					<h5 class="title">Already registered?</h5>
				</div>
				<form action="{{ route('login') }}" method="POST" class="needs-validation" novalidate>
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
								autocomplete="email" autofocus
								>

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="col-md-12 col-12 mb-20">
							<label>{{ __('Password') }}</label>
							<input 
								id="password" 
								type="password" 
								class="form-control @error('password') is-invalid @enderror" 
								name="password" 
								required 
								autocomplete="current-password"
								>

							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="col-md-12 col-12 mb-20">
							<div class="form-group">
								<div class="">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

										<label class="form-check-label" for="remember">
											{{ __('Remember Me') }}
										</label>
									</div>
								</div>
							</div>
                        </div>
						<div class="col-12 mb-50">					
							<button type="submit" class="btn">{{ __('Login') }}</button>
						</div>
						@if (Route::has('password.request'))
						<div class="col-12 align-self-end mb-20">
							<a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
						</div>
						@endif
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
<!-- Account Area End -->
@endsection
