var Helper = (function(){
	var self = {};
    let showErrors = (xhr)=>{
        let errors = xhr.responseJSON.errors;
        let message = xhr.responseJSON.message;
        let messages = []
        for(let field in errors) {
            messages.push(errors[field])
        }
        toastr.error(messages.join('\r\n'), message,{"timeOut": "0",});
        // setTimeout(()=>{
        //     Swal.fire(message, messages.join('\r\n'), 'error');
        // }, 150)
    }
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    beforeSend: function(xhr) {
            
        },
        complete: function(xhr, stat) {
            console.log(xhr, stat)
            console.log(xhr.status)
            console.log(xhr.statusText)
            Swal.close()
            switch(xhr.status){
                case 419:
                    // CSRF token mismatch.
                    setTimeout(()=>{
                        Swal.fire(xhr.statusText, xhr.responseJSON.message, 'error');
                    }, 150)
                    break;
                case 401:
                    // Unauthenticated
                    setTimeout(()=>{
                        Swal.fire({
                          title: xhr.statusText,
                          text: xhr.responseJSON.message,
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, Login!'
                        }).then((result) => {
                          if (result.value) {
                            window.location = '/login'
                          }
                        })
                    }, 150)
                    break;
                case 403:
                case 404:
                case 500:
                    toastr.error(xhr.responseJSON.message||'',xhr.statusText,{"timeOut": "0",});
                    // setTimeout(()=>{
                    //     Swal.fire(xhr.statusText, xhr.responseJSON.message, 'error');
                    // }, 150)
                    break;
                case 422:
                    showErrors(xhr)
                    break;
            }
        }
	});
	window.addEventListener('load', function() {
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.getElementsByClassName('needs-validation');
		// Loop over them and prevent submission
		var validation = Array.prototype.filter.call(forms, function(form) {
			form.addEventListener('submit', function(event) {
				if (form.checkValidity() === false) {
					
					event.preventDefault();
					event.stopPropagation();
				}
				form.classList.add('was-validated');
			}, false);
		});
	}, false);
	self.Cart = {
        add: function(product_id, quanlity, size_id, color_id) {
            Swal.fire({
                "type": "question",
                "showCancelButton": true,
                "showLoaderOnConfirm": true,
                "confirmButtonText": Lang.get('cart.add_to_cart'),
                "cancelButtonText": Lang.get('common.cancel'),
                "title": Lang.get('cart.add_to_cart_confirm_message'),
                "text": "",
                "confirmButtonColor": "#a2c147",
                preConfirm: function(input) {
                    return new Promise(function(resolve, reject) {
                        $.ajax({
    			            url : "/shop/add-to-cart",
    			            type : "POST",
    			            data : {
    			              product_id: product_id,
    			              quanlity: quanlity || 1,
    			              size_id: size_id || null,
    			              color_id: color_id || null,
    			            },
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
                  $('.header-cart').html(response.view)
                } else {
                  Swal.fire(Lang.get('common.system_error'), response.message, 'error');
                }
            });
        },
        updateAjaxs: {},
        update: function(key, quanlity) {
            if(self.Cart.updateAjaxs[key]) self.Cart.updateAjaxs[key].abort();
            self.Cart.updateAjaxs[key] = $.ajax({
	            url : "/shop/update-to-cart",
	            type : "POST",
	            data : {
                  key: key,
	              quanlity: quanlity,
	            },
	            success: function (response) {
                    if(response.code == 1) {
                      //Swal.fire(Lang.get('common.system_notification'), response.message, 'success');
                      $('.header-cart').html(response.view)
                      $('#cart-sumary').html(response.form)
                    } else {
                      Swal.fire(Lang.get('common.system_error'), response.message, 'error');
                    }
                },
                error:function(request){
                    //reject(request);
                }
	        });
		},
        remove: function(key) {
            Swal.fire({
                "type": "question",
                "showCancelButton": true,
                "showLoaderOnConfirm": true,
                "confirmButtonText": Lang.get('cart.remove'),
                "cancelButtonText": Lang.get('common.cancel'),
                "title": Lang.get('cart.remove_from_cart_confirm_message'),
                "text": "",
                "confirmButtonColor": "rgb(221, 51, 51)",
                preConfirm: function(input) {
                    return new Promise(function(resolve, reject) {
                        $.ajax({
                            url : "/shop/remove-from-cart",
                            type : "POST",
                            data : {
                              key: key
                            },
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
                    $('.header-cart').html(response.view)
                    $('#cart-sumary').html(response.form)

                } else {
                    Swal.fire(Lang.get('common.system_error'), response.message, 'error');
                }
            });
        },
        updateShipingType: function(flat_rate) {
            $.ajax({
                url : "/shop/update-shiping-type",
                type : "POST",
                data : {
                  flat_rate: flat_rate,
                },
                success: function (response) {
                    if(response.code == 1) {
                      //Swal.fire(Lang.get('common.system_notification'), response.message, 'success');
                      $('#cart-sumary').html(response.form)
                    } else {
                      Swal.fire(Lang.get('common.system_error'), response.message, 'error');
                    }
                },
                error:function(request){
                    //reject(request);
                }
            });
        },

	}
	return self
}())