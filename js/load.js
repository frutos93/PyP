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
                newHTMLContent += "<tr><td>" + jsonData[index].id + "</td>" + "<td>" + jsonData[index].nombre + "</td><td>" + jsonData[index].correo + "</td></tr>";
            });
            $("#tableBody").append(newHTMLContent);
        }
        , error: function (errorMsg) {
            console.log(errorMsg);
        }
    });
    $('#table_id').DataTable();
});