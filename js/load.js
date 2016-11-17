$(document).ready(function () {
    var dataToSend = {
        "action": "LOAD_SCHOOL"
    }
    $.ajax({
        url: "data/applicationLayer.php"
        , type: "POST"
        , data: dataToSend
        , dataType: "json"
        , success: function (jsonResponse) {
            var newHTMLContent = '';
            $.each(jsonResponse, function (index) {
                newHTMLContent += "<tr><td>" + jsonResponse[index].nombre + "</td></tr>";
            });
            $('#schoolBody').append(newHTMLContent);
        }
        , error: function (errorMsg) {}
    });
    var dataToSend = {
        "action": "LOAD_AREA"
    }
    $.ajax({
        url: "data/applicationLayer.php"
        , type: "POST"
        , data: dataToSend
        , dataType: "json"
        , success: function (jsonResponse) {
            var newHTMLContent = '';
            $.each(jsonResponse, function (index) {
                newHTMLContent += "<tr><td>" + jsonResponse[index].nombre + "</td></tr>";
            });
            $('#areaBody').append(newHTMLContent);
        }
        , error: function (errorMsg) {}
    });
    var dataToSend = {
        "action": "LOAD_TEACH"
    }
    $.ajax({
        url: "data/applicationLayer.php"
        , type: "POST"
        , data: dataToSend
        , dataType: "json"
        , success: function (jsonResponse) {
            var newHTMLContent = "";
            $.each(jsonResponse, function (index) {
                newHTMLContent += "<tr><td><a class='teacherInfo' href='teacherProfile.html' data-id='" + jsonResponse[index].id + "'>" + jsonResponse[index].nombre + "</a></td><td>" + jsonResponse[index].correo + "</td></tr>";
            });
            $("#tableBody").append(newHTMLContent);
            $('#teacherTable').DataTable();
        }
        , error: function (errorMsg) {
            console.log(errorMsg);
        }
    });
    var dataToSend = {
        "action": "LOAD_PROJ"
    }
    $.ajax({
        url: "data/applicationLayer.php"
        , type: "POST"
        , data: dataToSend
        , dataType: "json"
        , success: function (jsonResponse) {
            var newHTMLContent = "";
            $.each(jsonResponse, function (index) {
                newHTMLContent += "<tr><td><a href='projectInformation.html' class='proyInfo' data-id='" + jsonResponse[index].id + "'>" + jsonResponse[index].nombre + "</a></td><td>"+ jsonResponse[index].descripcion + "</td></tr>";
            });
            $("#projectBody").append(newHTMLContent);
            $('#projectTable').DataTable();
        }
        , error: function (errorMsg) {
            $('#projectTable').hide();
            $('h1').text(errorMsg.responseText);
        }
    });
    $('#tableBody').on('click', '.proyInfo', function (event) {
        localStorage.setItem('proyID', $(this).data('id'));
    });
    $('#tableBody').on('click', '.teacherInfo', function (event) {
        localStorage.setItem('teachID', $(this).data('id'));
    });
   
});