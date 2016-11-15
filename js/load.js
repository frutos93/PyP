$(document).ready(function () {
    var dataToSend = {
        "action": "LOAD_SCHOOL"
    }
    $.ajax({
        url: "data/applicationLayer.php",
        type: "POST",
        data: dataToSend,
        dataType: "json",
        success: function (jsonResponse) {
            var newHTMLContent = '';
            $.each(jsonResponse, function (index) {
                newHTMLContent += "<tr><td>" + jsonResponse[index].nombre + "</td></tr>";
            });
            $('#schoolBody').append(newHTMLContent);
        }, error: function (errorMsg) {

        }
    });

    var dataToSend = {
        "action": "LOAD_AREA"
    }
    $.ajax({
        url: "data/applicationLayer.php",
        type: "POST",
        data: dataToSend,
        dataType: "json",
        success: function (jsonResponse) {
            var newHTMLContent = '';
            $.each(jsonResponse, function (index) {
                newHTMLContent += "<tr><td>" + jsonResponse[index].nombre + "</td></tr>";
            });
            $('#areaBody').append(newHTMLContent);
        }, error: function (errorMsg) {

        }
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
                newHTMLContent += "<tr><td><a class='teacherInfo' data-id='" + jsonResponse[index].id + "'>" + jsonResponse[index].nombre + "</a></td><td>" + jsonResponse[index].correo + "</td></tr>";
            });
            $("#tableBody").append(newHTMLContent);
            $('#teacherTable').DataTable();
        }
        , error: function (errorMsg) {
            console.log(errorMsg);
        }
    });
    
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
            $('#grupoInvestigacion').append(newHTMLContent);
        }, error:function(errorMsg){
            
        }
    });

});