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
        var dataToSend = {
            "action": "LOAD_TEACH_PROJECT"
            , "id": idTeach
        }
        $.ajax({
            url: "data/applicationLayer.php"
            , type: "POST"
            , data: dataToSend
            , dataType: "json"
            , success: function (jsonResponse) {
                var newHTMLContent = "";
                $.each(jsonResponse, function (index) {
                    newHTMLContent += "<tr><td><a class='proyInfo' data-id='" + jsonResponse[index].id + "'>" + jsonResponse[index].nombre + "</a></td><td>" + jsonResponse[index].cupo + "</td><td>" + jsonResponse[index].descripcion + "<td></tr>";
                });
                $("#tableBody").append(newHTMLContent);
                $('#projectTable').DataTable();
            }
            , error: function (errorMsg) {
                $('#projectTable').hide();
                $('h1').text(errorMsg.responseText);
            }
        });
        $('#tableBody').on('click', '.proyInfo', function (event) {
            localStorage.setItem('proyID', $(this).data('id'));
            window.location.replace('projectInformation.html');
        });
    }
});