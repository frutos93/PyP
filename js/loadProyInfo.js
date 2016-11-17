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
                $('#nombreProy').append(jsonResponse[index].nombre);
                $('#profProy').append(jsonResponse[index].profesor);
                $('#estadoProy').append(jsonResponse[index].estado);
                $('#cupoProy').append(jsonResponse[index].cupo);
                $('#descripcionProy').append(jsonResponse[index].descripcion);
            });
            }
            , error: function (errorMsg) {
                console.log(errorMsg);
            }
        });
    }
});