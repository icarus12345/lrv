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
    
	
		
	
	self.Cart = {
        
	}
	return self
}())