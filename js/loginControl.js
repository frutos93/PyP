$(document).ready(function(){
    
    var validator = $("#login-form").bootstrapValidator({
        fields : {
            Username : {
                validators : {
                    notEmpty : {
                        message : "Te falta introductir tu nombre de usuario."
                    }
                }
            },
            Passwrd : {
                validators : {
                    notEmpty : {
                        message : "Te falta introducir tu contraseña."
                    } 
                }
            }
        }
    });
    
    validator.on("success.form.bv", function(e){
        e.preventDefault();
        $("#login-form").addClass("hidden");
        $("#confirmation").removeClass("hidden");
    });
});