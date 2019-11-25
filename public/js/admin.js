
$.fn.wasValidate = function() {
    $(this).on('submit',(event)=>{
        $(event.target).addClass('was-validated');
        if (event.target.checkValidity() === false) {
                
            event.preventDefault();
            event.stopPropagation();
        }
    })
    $(this).find('[type="submit"]').click((e)=>{
        $(e.target).parents('form').addClass('was-validated')
    })
    // var validation = Array.prototype.filter.call(this, function(form) {
        
    //     form.addEventListener('submit', function(event) {
    //         if (form.checkValidity() === false) {
                
    //             event.preventDefault();
    //             event.stopPropagation();
    //         }
    //         form.classList.add('was-validated');
    //     }, false);
    // });
    
};
var Helper = (function(){
	var self = {};
    var actionResolver = function (data) {

        var response = data;
            
        if (typeof response !== 'object') {
            return $.admin.swal({type: 'error', title: 'Oops!'});
        }
        var then = function (then) {
            if (then.action == 'refresh') {
                $.admin.reload();
            }
            
            if (then.action == 'download') {
                window.open(then.value, '_blank');
            }
            
            if (then.action == 'redirect') {
                $.admin.redirect(then.value);
            }
            
            if (then.action == 'location') {
                window.location = then.value;
            }
        };
        
        if(response.status){
            toastr.success(response.message)
        }else if(response.errors){
            let messages = []
            for (var key in response.errors) {
                messages.push(response.errors[key])
            }
            toastr.error(messages.join('<br/>'))
        }else if(response.message){
            toastr.warning(response.message)
        }else{

        }
        if (response.then) {
            then(response.then);
        }
        
    };
    self.Resolver = actionResolver;
    
    var actionCatcher = function (request) {
        if (request && typeof request.responseJSON === 'object') {
            actionResolver(request.responseJSON)
        }
    };
	self.Catcher = actionCatcher;
	
	self.Encore_Admin_Grid_Actions_Delete = (props, callback) => {
        var data = {_key:props.id}
        Object.assign(data, {"_model":"App_Models_"+props.model});
        var process = $.admin.swal({
            "type": "question",
            "showCancelButton": true,
            "showLoaderOnConfirm": true,
            "confirmButtonText": "Submit",
            "cancelButtonText": "Cancel",
            "title": "Are you sure to delete this item ?",
            "text": "",
            "confirmButtonColor": "#d33",
            preConfirm: function(input) {
                return new Promise(function(resolve, reject) {
                    Object.assign(data, {
                        _token: $.admin.token,
                        _action: 'Encore_Admin_Grid_Actions_Delete',
                        _input: input,
                    });

                    $.ajax({
                        method: 'POST',
                        url: '/admin/_handle_action_',
                        data: data,
                        success: function (data) {
                            resolve(data);
                            if(callback) callback(data)
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

            return [response];
        });
        process.then(actionResolver).catch(actionCatcher);
    }
	return self
}())