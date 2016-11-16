$(document).ready(function(){
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
            $('#registerGrupoInvestigacion').append(newHTMLContent);
        }, error:function(errorMsg){
            console.log(errorMsg);
        }
    });
   
});