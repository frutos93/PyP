$(document).ready(function(){
    
    var validator = $("#registration-form").bootstrapValidator({
        feedbackIcons : {
            valid : "glyphicon glyphicon-ok",
            invalid : "glyphicon glyphicon-remove",
            validating : "glyphicon glyphicon-refresh"
        },
        fields : {
            Nombre : {
                message : "El nombre del proyecto es requerido.",
                validators : {
                    notEmpty : {
                        message : "Porfavor proporcione un nombre de proyecto."
                    },
                    stringLength : {
                        min : 8,
                        message : "El nombre del proyecto tiene que tener minimo 8 caracteres"
                    }
                }
            },
            CupoLimite : {
                validators : {
                    notEmpty : {
                        message : "Porfavor proporcione un cupo limite."
                    }
                }
            },
            Descripcion : {
                message : "La descripcion del proyecto es requerido",
                validators : {
                    notEmpty : {
                        message : "Porfavor proporcione su nombre."
                    }
                }
            }
        }
    });
    
    validator.on("success.form.bv", function(e){
        e.preventDefault();
        var proyID = localStorage.getItem('proyID');
        
            var jsonObject = {
                "action" : "UPDATE_PROY",
                "id": proyID,
                "nombre": $("#proyNombre").val(),
                "cupo": $("#proyCupo").val(),
                "estado": $('#proyEstado').val(),
                "descripcion": $("#proyDescripcion").val(),

            };
            $.ajax({
                type: "POST",
                url: "data/applicationLayer.php",
                data : jsonObject,
                dataType : "json",
                success: function(jsonData) {
                    alert(jsonData.message);
                    $("#registration-form").addClass("hidden");
                    $("#confirmation").removeClass("hidden");
                },
                error: function(errorMsg){
                    console.log(errorMsg);
                }
            });

    });
});