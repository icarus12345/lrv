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
                            <form action="php/mail.php" method="post" id="contact-form">
                                <div class="row mb-n20">
                                    
                                    <div class="col-md-4 col-12 mb-20">
                                        <div class="row mb-n20">
                                            
                                            <div class="col-12 mb-20">
                                                <label>{{__('validation.attributes.full_name')}}</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            
                                            <div class="col-12 mb-20">
                                                <label>{{__('validation.attributes.email')}}</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                            
                                            <div class="col-12 mb-20">
                                                <label>{{__('validation.attributes.subject')}}</label>
                                                <select name="subject" class="form-control">
                                                    <option selected="selected">-- Choose --</option>
                                                    <option value="Customer service">Customer service</option>
                                                    <option value="Webmaster">Webmaster</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-12 mb-20">
                                        <label>{{__('validation.attributes.message')}}</label>
                                        <textarea name="message" class="form-control" rows="4"></textarea>
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
