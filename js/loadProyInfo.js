$(document).ready(function () {
    if (localStorage.getItem('proyID') == null) {
        alert('There was an error loading the page');
        window.location.replace('index.html');
    }
    else {
        var proyID = localStorage.getItem('proyID');
        var dataToSend = {
            "action": "LOAD_PROY_INFO"
            , "id": proyID
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
    });
    }
});