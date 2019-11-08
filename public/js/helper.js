var Helper = (function(){
	var self = {};
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
        }
	});
	self.Cart = {
        add: function(product_id, quanlity, size_id, color_id) {
            Swal.fire({
                "type": "question",
                "showCancelButton": true,
                "showLoaderOnConfirm": true,
                "confirmButtonText": "Add To Cart",
                "cancelButtonText": "Cancel",
                "title": "Are you sure to add this item to your cart?",
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
                  Swal.fire('System Notification', response.message, 'success');
                  $('.header-cart').html(response.view)
                } else {
                  Swal.fire('System Error', response.message, 'error');
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
                      //Swal.fire('System Notification', response.message, 'success');
                      $('.header-cart').html(response.view)
                      $('#cart-sumary').html(response.form)
                    } else {
                      Swal.fire('System Error', response.message, 'error');
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
                "confirmButtonText": "Remove this",
                "cancelButtonText": "Cancel",
                "title": "Are you sure to remove this item from your cart?",
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
                    Swal.fire('System Notification', response.message, 'success');
                    $('.header-cart').html(response.view)
                    $('#cart-sumary').html(response.form)

                } else {
                    Swal.fire('System Error', response.message, 'error');
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
                      //Swal.fire('System Notification', response.message, 'success');
                      $('#cart-sumary').html(response.form)
                    } else {
                      Swal.fire('System Error', response.message, 'error');
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