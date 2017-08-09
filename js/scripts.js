(function(){
    
    function Validator(form) {
        
        this.form = form;
        this.form.noValidate = true;
        this.fields = document.querySelectorAll('[required]');
        this.errors = [];
        this.invalidText = document.querySelectorAll('.invalid-text');
//        console.log(this.invalidText[0]);
        if(!this.fields.length) return;
        
        this.form.onsubmit = function(e) {
            e.preventDefault();
            var formValid = this.validate();
            
            if(formValid) {
                this.form.submit();
            } else {
                return false;
            }
        }.bind(this);
        
    }

Validator.prototype.validate = function() {
  
    for(var i = 0; i < this.fields.length; i++) {
        
        this.validateField(this.fields[i], this.invalidText[i]); 
        
    }
    
    if(!this.errors.length) {
        return true;
    } else {
        return false;
    }
    
};

Validator.prototype.validateField = function(field, invalidText) {
    
    var fieldValid = field.validity.valid;
    
    if(fieldValid) {
        this.markAsValid(field, invalidText);
    } else {
        this.errors.push(fieldValid);
        this.markAsInvalid(field, invalidText);
    }
    
};
    
Validator.prototype.markAsValid = function(field, invalidText) {
  
    field.classList.remove('invalid');
    field.classList.add('valid');
    
    invalidText.classList.add('hide');
    
};

Validator.prototype.markAsInvalid = function(field, invalidText) {
  
    field.classList.remove('valid');
    field.classList.add('invalid');
    
    invalidText.classList.remove('hide');
    
};
    
var validator1 = new Validator(document.querySelector('.form'));

})();

