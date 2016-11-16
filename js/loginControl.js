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
        var jsonData = {
            "action" : "LOGIN",
            "username" : $('#loginUsername').val(),
            "passwrd" : $("#loginPasswrd").val(),
        };

        $.ajax({
            url: "data/applicationLayer.php",
            type: "POST",
            data: jsonData,
            dataType: "json",
            contentType: "application/x-www-form-urlencoded",
            success: function(jsonResponse){
                alert(jsonData.message);
                $("#login-form").addClass("hidden");
                $("#confirmation").removeClass("hidden");

            },
            error: function(errorMessage) {
                alert(errorMessage.responseText);
            }
        })
        
    });
});