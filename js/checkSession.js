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
            $('#registerProject').show();
            $("#registerTab").hide();
            $("#logoutTab").removeClass("hidden");
            $("#userWelcome").removeClass("hidden");
            

        }, error:function(errorMsg){
            console.log(errorMsg);
            $("#logoutTab").addClass("hidden");
            $("#userWelcome").addClass("hidden");
            $("#loginTab").removeClass("hidden");
                        $('#registerProject').hide();

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
                window.location.replace('index.html');
                $("#logoutTab").addClass("hidden");
                $("#loginTab").removeClass("hidden");
                $("#userWelcome").addClass("hidden");
                $("#userWelcomeID").text('');
                $("#registerTab").show();
                            $('#registerProject').hide();


            }, error:function(errorMsg){
                console.log(errorMsg);
                window.location.replace('index.html');
                $("#registerTab").show();
                $("#loginTab").addClass("hidden");
                $("#logoutTab").removeClass("hidden");
                $("#userWelcomeID").text('');
                $("#userWelcome").removeClass("hidden");
            }
        });
    });
   
});