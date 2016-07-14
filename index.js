$(function(){
    $.post("index2.php", function(data) {
        $("#dolar").val(data.dolar);
        $("#euro").val(data.euro);
        $("#petroleo").val(data.petroleo);
        $("#uvr").val(data.uvr);
        $("#dtf").val(data.dtf);
        $("#cafe").val(data.cafe);
     },'json'
 )})
;