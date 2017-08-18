(function(){

    function Validator(form) {
        
        this.form = form;
        this.form.noValidate = true;
        this.fields = document.querySelectorAll('[required]');
        this.fieldsStorage = document.querySelectorAll('input[name]:not([type="submit"])');
        this.formID = this.form.getAttribute('id');
        this.fieldsValues = {};
        this.errors = [];
        this.invalidText = document.querySelectorAll('.invalid-text');

        this.success = document.querySelector('.success');
        
        this.addSavingToFields();
        this.loadFieldsValues();
        
        if(!this.fields.length) return;
        
        this.form.onsubmit = function(e) {
            e.preventDefault();
            var formValid = this.validate();
            if(formValid) {
                
                this.clearLocalStorage();
//                this.form.submit();
                this.sendData();
                
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
        this.errors = [];
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

Validator.prototype.addSavingToFields = function() {
    
    for(var i = 0; i < this.fields.length; i++) {
        
        this.fields[i].onchange = this.saveField.bind(this);
        
    }
    
};

Validator.prototype.saveField = function(e) {
  
    var that = e.target;
    

    this.fieldsValues[that.getAttribute('name')] = that.value;
    this.saveToLocalStorage();

    
};

Validator.prototype.saveToLocalStorage = function() {
  
    window.localStorage.setItem(this.formID, JSON.stringify(this.fieldsValues));
    
};

Validator.prototype.loadFieldsValues = function() {
  
    var saveFields = window.localStorage[this.formID];
    console.log(saveFields);
    if(saveFields) {
        
        saveFields = JSON.parse(saveFields);
        
        for(var key in saveFields) {
            this.form.querySelector('[name="' + key + '"]').value = saveFields[key];
        }
        
    }
    
};
    
Validator.prototype.clearLocalStorage = function() {
    
    window.localStorage.removeItem(this.formID);
    
};

Validator.prototype.sendData = function() {
    
    var xhr = new XMLHttpRequest();
    var data = new FormData(this.form);

    xhr.open('POST', 'mail.php', true);

    xhr.onreadystatechange = function(e) {
        if(xhr.readyState === 4 && xhr.status === 200) {
            this.form.classList.add('hide');
            this.success.classList.remove('hide');
        }
    }.bind(this);

    console.log(data);
    xhr.send(data);
                    
};
    
var validator1 = new Validator(document.querySelector('.form'));

})();

