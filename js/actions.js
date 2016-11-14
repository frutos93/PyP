$(document).ready(function () {

    $('#tableBody').on('click','.teacherInfo',function(event){
        localStorage.setItem('teachID',$(this).data('id'));
        window.location.replace('teacherProfile.html');
    });
});