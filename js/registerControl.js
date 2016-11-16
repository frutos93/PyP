$(document).ready(function(){
    var dataToSend = {
    "action": "LOAD_GRUPO_OPCION"
    }
    
    $.ajax({
        url: "data/applicationLayer.php",
        type: "POST",
        data: dataToSend,
        dataType: "json",
        success: function (jsonResponse){
            var newHTMLContent = '';
            $.each(jsonResponse, function(index){
                newHTMLContent += "<option value='" + jsonResponse[index].id + "'>" + jsonResponse[index].nombre + "</option>";
            });
            $('#registerGrupoInvestigacion').append(newHTMLContent);
        }, error:function(errorMsg){
            console.log(errorMsg);
        }
    });
    
    var validator = $("#registration-form").bootstrapValidator({
        feedbackIcons : {
            valid : "glyphicon glyphicon-ok",
            invalid : "glyphicon glyphicon-remove",
            validating : "glyphicon glyphicon-refresh"
        },
        fields : {
            Username : {
                message : "El nombre de usuario es requerido.",
                validators : {
                    notEmpty : {
                        message : "Porfavor proporcione un nombre de usuario."
                    },
                    stringLength : {
                        min : 8,
                        message : "El nombre de usuario tiene que tener minimo 8 caracteres"
                    }
                }
            },
            Passwrd : {
                validators : {
                    notEmpty : {
                        message : "Porfavor proporcione una contraseña."
                    },
                    stringLength : {
                        min : 8,
                        message : "La contraseña tiene que tener minimo 8 caracteres"
                    },
                    different : {
                        field : "Username",
                        message : "El usuario y contraseña tienen que ser diferentes"
                    } 
                }
            },
            Passwrdcheck : {
                validators : {
                    notEmpty : {
                        message : "Porfavor confirme su contraseña."
                    },
                    identical : {
                        field : "Passwrd",
                        message : "La contraseña escrita no es la misma que proporcionaste anteriormente."
                    }
                }
            },
            Nombre : {
                message : "Su nombre completo es requerido.",
                validators : {
                    notEmpty : {
                        message : "Porfavor proporcione su nombre."
                    }
                }
            },
            Oficina : {
                message : "Su numero de oficina dentro del campus es requerido.",
                validators : {
                    notEmpty : {
                        message : "Porfavor proporcione su numero de oficina dentro del campus."
                    }
                }
            },
            Telefono : {
                message : "Su telefono celular o de oficina es requerido.",
                validators : {
                    notEmpty : {
                        message : "Porfavor proporcione su numero de telefono."
                    }
                }
            },
            Correo : {
                message : "Su direccion de correo electronico es requerido.",
                validators : {
                    notEmpty : {
                        message : "Porfavor proporcione su correo."
                    },
                    emailAddress : {
                        message : "Correo electronico invalido."
                    }
                }
            },
            GrupoInvestigacion : {
                validators : {
                    greaterThan : {
                        value : 1,
                        message : "Porfavor eliga su Grupo de Investigacion."
                    }
                }
            }
        }
    });
    
    validator.on("success.form.bv", function(e){
        e.preventDefault();
        $("#registration-form").addClass("hidden");
        $("#confirmation").removeClass("hidden");
    });
});