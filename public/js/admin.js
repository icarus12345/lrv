$.fn.wasValidate = function() {
    console.log(this,'FFF')
    var validation = Array.prototype.filter.call(this, function(form) {
        console.log(form,'form')
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
    
};
var Helper = (function(){
	var self = {};
    
	
		
	
	self.Cart = {
        
	}
	return self
}())