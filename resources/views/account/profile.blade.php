
<div class="myaccount-content">
	<h5>@lang('Your Profile')</h5>
	<div class="account-details-form">
		<form id="profile-frm" action="/account/profile/update" class="needs-validation" novalidate>
			<div class="row">
				
				<div class="col-12 mb-30">
					<input name="name" placeholder="@lang('Full name')" type="text" class="form-control" required value="{{\Auth::user()->name}}">
				</div>

				<div class="col-12 mb-30">
					<input name="email" placeholder="@lang('E-Mail Address')" type="email" class="form-control" disabled value="{{\Auth::user()->email}}">
				</div>

				<div class="col-12 mb-30"><h6 class="mb-0">@lang('Password change')</h6></div>

				<div class="col-12 mb-30">
					<input name="current_pwd" placeholder="@lang('Current Password')" type="password" class="form-control">
				</div>

				<div class="col-lg-6 col-12 mb-30">
					<input name="new_pwd" placeholder="@lang('New Password')" type="password" class="form-control">
				</div>

				<div class="col-lg-6 col-12 mb-30">
					<input name="confirm_pwd" placeholder="@lang('Confirm Password')" type="password" class="form-control">
				</div>

				<div class="col-12">
					<button type="submit" class="btn btn-round btn-lg">@lang('Save Changes')</button>
				</div>

			</div>
		</form>
	</div>
</div>
@section('js')
<script src="/assets/lib/serializeJSON/jquery.serializeJSON.min.js"></script>
<script type="text/javascript">
    $(document).ready(()=>{
		document.getElementById('profile-frm').addEventListener('submit', (e)=>{
            if(e.target.checkValidity() === false){
                return false;
            }
            e.preventDefault();
            e.stopPropagation();
            Swal.fire({
                "type": "question",
                "showCancelButton": true,
                "showLoaderOnConfirm": true,
                "confirmButtonText": Lang.get('common.submit'),
                "cancelButtonText": Lang.get('common.cancel'),
                "title": Lang.get('account.update_profile_confirm_message'),
                "text": "",
                "confirmButtonColor": "#a2c147",
                preConfirm: function(input) {
                    let params = $(e.target).serializeJSON();
                    console.log(params)
                    return new Promise(function(resolve, reject) {
                        $.ajax({
                            url : "/account/profile/update",
                            type : "POST",
                            data : params,
                            success: function (data) {
                                resolve(data);
                            },
                            error:function(request){
                                reject(request);
                            }
                        });
                    });
                }
            }).then(function(result) {
                if (typeof result.dismiss !== 'undefined') {
                    return Promise.reject();
                }
                
                if (typeof result.status === "boolean") {
                    var response = result;
                } else {
                    var response = result.value;
                }
                console.log(response)
                if(response.code == 1) {
                    Swal.fire(Lang.get('common.system_notification'), response.message, 'success')
					.then((result)=>{
						//e.target.reset();
						location.reload()
					});
                    
                } else {
                  Swal.fire(Lang.get('common.system_error'), response.message, 'error');
                }
            });
        });
    })
</script>
@endsection