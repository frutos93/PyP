$(document).ready(function () {
    var dataToSend = {
        "action": "LOAD_SCHOOL"
    }
    $.ajax({
        url: "data/applicationLayer.php",
        type: "POST",
        data: dataToSend,
        dataType: "json",
        success: function (jsonResponse){
            var newHTMLContent = '';
            $.each(jsonResponse, function(index){
                newHTMLContent += "<tr><td>" + jsonResponse[index].nombre + "</td></tr>";
            });
            $('#schoolBody').append(newHTMLContent);
        }, error:function(errorMsg){
            
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
        success: function (jsonResponse){
            var newHTMLContent = '';
            $.each(jsonResponse, function(index){
                newHTMLContent += "<tr><td>" + jsonResponse[index].nombre + "</td></tr>";
            });
            $('#areaBody').append(newHTMLContent);
        }, error:function(errorMsg){
            
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
                newHTMLContent += "<tr><td>" + jsonResponse[index].id + "</td>" + "<td>" + jsonResponse[index].nombre + "</td><td>" + jsonResponse[index].correo + "</td></tr>";
            });
            $("#tableBody").append(newHTMLContent);
            $('#teacherTable').DataTable();
        }
        , error: function (errorMsg) {
            console.log(errorMsg);
        }
    });
});