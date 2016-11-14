$(document).ready(function () {
    if (localStorage.getItem('teachID') == null) {
        alert('There was an error loading the page');
        window.location.replace('index.html');
    }
    else {
        var idTeach = localStorage.getItem('teachID');
        var dataToSend = {
            "action": "LOAD_PROFILE"
            , "id": idTeach
        }
        $.ajax({
            url: "data/applicationLayer.php"
            , type: "POST"
            , data: dataToSend
            , dataType: "json"
            , success: function (jsonResponse) {
            $.each(jsonResponse, function (index) {
                $('#nombreProf').append(jsonResponse[index].nombre);
                $('#oficinaProf').append(jsonResponse[index].oficina);
                $('#telProf').append(jsonResponse[index].telefono);
                $('#correoProf').append(jsonResponse[index].correo);
            });
            }
            , error: function (errorMsg) {
                console.log(errorMsg);
            }
        });
    }
});