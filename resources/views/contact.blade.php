@extends('layouts.master.master')

@section('content')
		<!-- Breadcrumbs Area Start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/"><i class="fa fa-home"></i>{{__('common.home')}}</a></li>
                    <li class="active">{{__('common.contact')}}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs Area End -->
                
        <!-- Contact Area Area Start -->
        <div class="section-padding-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="contact-wrap">
                            <h5 class="title">{{__('common.send_a_message')}}</h5>
                            <form action="" method="post" id="contact-form" class="needs-validation" novalidate>
                                <div class="row mb-n20">
                                    
                                    <div class="col-md-4 col-12 mb-20">
                                        <div class="row mb-n20">
                                            
                                            <div class="col-12 mb-20">
                                                <label>{{__('validation.attributes.full_name')}}</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                            
                                            <div class="col-12 mb-20">
                                                <label>{{__('validation.attributes.email')}}</label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                            
                                            <div class="col-12 mb-20">
                                                <label>{{__('validation.attributes.subject')}}</label>
                                                <select name="subject" class="form-control" required>
                                                    <option value="">-- Choose --</option>
                                                    <option value="Customer service">Customer service</option>
                                                    <option value="Webmaster">Webmaster</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-12 mb-20">
                                        <label>{{__('validation.attributes.message')}}</label>
                                        <textarea name="message" class="form-control" rows="4" required></textarea>
                                        <div class="col-12 mb-50">
                                        
                                    </div>
                                        <button class="btn" type="submit" >{{__('common.send_message')}}</button>
                                    </div>
                                    
                                    
                                    
                                </div>
                            </form>
                            <p class="form-message"></p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Area Area End -->
	@include('widget.brand')
@endsection
@section('js')
<script src="/assets/lib/serializeJSON/jquery.serializeJSON.min.js"></script>
<script type="text/javascript">
    $(document).ready(()=>{
		document.getElementById('contact-form').addEventListener('submit', (e)=>{
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
                "title": Lang.get('common.send_request_confirm_message'),
                "text": "",
                "confirmButtonColor": "#a2c147",
                preConfirm: function(input) {
                    let params = $(e.target).serializeJSON();
                    console.log(params)
                    return new Promise(function(resolve, reject) {
                        $.ajax({
                            url : "/send-request",
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
                    Swal.fire(Lang.get('common.system_notification'), response.message, 'success');
                    e.target.reset();
                    
                } else {
                  Swal.fire(Lang.get('common.system_error'), response.message, 'error');
                }
            });
        });
    })
</script>
@endsection