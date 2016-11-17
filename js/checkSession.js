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
            $("#userWelcomeText").append("Bienvenido " + jsonResponse.username + "!");
            $("#userWelcomeID").append(jsonResponse.id);
            $("#loginTab").addClass("hidden");
            $("#logoutTab").removeClass("hidden");
            $("#userWelcome").removeClass("hidden");

        }, error:function(errorMsg){
            console.log(errorMsg);
            $("#logoutTab").addClass("hidden");
            $("#userWelcome").addClass("hidden");
            $("#loginTab").removeClass("hidden");
        }
    });
    
    $("#logoutTab").on("click", function(){
        var dataToSend = {
        "action": "TERMINA-SESION"
        }

        $.ajax({
            url: "data/applicationLayer.php",
            type: "POST",
            data: dataToSend,
            dataType: "json",
            success: function (jsonResponse){
                $("#logoutTab").addClass("hidden");
                $("#loginTab").removeClass("hidden");
                $("#userWelcome").addClass("hidden");

            }, error:function(errorMsg){
                console.log(errorMsg);
                $("#loginTab").addClass("hidden");
                $("#logoutTab").removeClass("hidden");
                $("#userWelcome").removeClass("hidden");
            }
        });
    });
   
});