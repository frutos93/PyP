$(document).ready(function(){
    var dataToSend = {
    "action": "CHECA-SESION"
    }
   
    $.ajax({
        url: "data/applicationLayer.php",
        type: "POST",
        data: dataToSend,
        dataType: "json",
        success: function (jsonResponse){
            if(jsonResponse.message == "FAIL")
                window.location.replace(index.html);
        }, error:function(errorMsg){
            
        }
    });
});
