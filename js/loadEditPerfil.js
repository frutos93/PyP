$(document).ready(function () {
    var dataToSend = {
        "action": "LOAD_PROFILE_SESSION"  
    }
    $.ajax({
        url: "data/applicationLayer.php"
        , type: "POST"
        , data: dataToSend
        , dataType: "json"
        , success: function (jsonResponse) {
            $.each(jsonResponse, function (index) {
                $('#profNombre').val(jsonResponse[index].nombre);
                $('#profOficina').val(jsonResponse[index].oficina);
                $('#profTel').val(jsonResponse[index].telefono);
                $('#profCorreo').val(jsonResponse[index].correo);
            });
        }
        , error: function (errorMsg) {
            console.log(errorMsg);
        }
    });
});