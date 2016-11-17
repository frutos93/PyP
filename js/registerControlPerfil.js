$(document).ready(function () {
    var validator = $("#registration-form").bootstrapValidator({
        feedbackIcons: {
            valid: "glyphicon glyphicon-ok"
            , invalid: "glyphicon glyphicon-remove"
            , validating: "glyphicon glyphicon-refresh"
        }
        , fields: {
            Nombre: {
                message: "Su nombre es requerido"
                , validators: {
                    notEmpty: {
                        message: "Porfavor proporcione su nombre."
                    }
                }
            }
            , Oficina: {
                message: "Su oficina es requerido"
                , validators: {
                    notEmpty: {
                        message: "Porfavor proporcione su oficina."
                    }
                }
            }
            , Telefono: {
                message: "Su telefono es requerido"
                , validators: {
                    notEmpty: {
                        message: "Porfavor proporcione su telefono."
                    }
                }
            }
            , Correo: {
                message: "Su correo es requerido"
                , validators: {
                    notEmpty: {
                        message: "Porfavor proporcione su correo."
                    }
                }
            }
        }
    });
    validator.on("success.form.bv", function (e) {
        e.preventDefault();
        var jsonObject = {
            "action": "REGISTRO_PROY"
            , "id": $("#userWelcomeID").text()
            , "nombre": $("#proyNombre").val()
            , "cupo": $("#proyCupo").val()
            , "descripcion": $("#proyDescripcion").val()
        , };
        $.ajax({
            type: "POST"
            , url: "data/applicationLayer.php"
            , data: jsonObject
            , dataType: "json"
            , success: function (jsonData) {
                alert(jsonData.message);
                $("#registration-form").addClass("hidden");
                $("#confirmation").removeClass("hidden");
            }
            , error: function (errorMsg) {
                console.log(errorMsg);
            }
        });
    });
});