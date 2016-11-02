$(document).ready(function () {
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
                newHTMLContent += "<tr><td>" + jsonResponse.id + "</td>" + "<td>" + jsonResponse.nombre + "</td><td>" + jsonResponse.correo + "</td></tr>";
            });
            $("#tableBody").append(newHTMLContent);
        }
        , error: function (errorMsg) {
            console.log(errorMsg);
        }
    });
    $('#table_id').DataTable();
});