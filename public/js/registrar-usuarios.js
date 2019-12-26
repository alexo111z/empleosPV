jQuery(document).ready(function(){
    $("#password").keypress(function (key) {
        if (($(this).val().length>=8)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
        && (key.charCode < 65 || key.charCode > 90) //letras minusculas
        && (key.charCode <48 || key.charCode>57)
        && (key.charCode != 46) //.
        && (key.charCode != 95) //_
        && (key.charCode != 45) //-
        ))return false;
    });
    $("#password2").keypress(function (key) {
        if (($(this).val().length>=8)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
        && (key.charCode < 65 || key.charCode > 90) //letras minusculas
        && (key.charCode <48 || key.charCode>57)
        && (key.charCode != 46) //.
        && (key.charCode != 95) //_
        && (key.charCode != 45) //-
        ))return false;
        
    });
    $("#password2").keyup(function (key) {
        if($("#password").val().length >=6){
            if($("#password").val()!= $("#password2").val()){
                $("#error-pass").html("<span class='text-danger'><i class='fas fa-exclamation-triangle'></i>Las contraseñas no coinciden</span>");
            }else{
                $("#error-pass").html("<span class='text-success'><i class='fa fa-check-circle'></i>Las contraseñas coinciden</span>");
            }
        }
    });
    $("#password").keyup(function (key) {
        if($("#password").val().length >=6){
            if($("#password").val()!= $("#password2").val()){
                $("#error-pass").html("<span class='text-danger'><i class='fas fa-exclamation-triangle'></i>Las contraseñas no coinciden</span>");
            }else{
                $("#error-pass").html("<span class='text-success'><i class='fa fa-check-circle'></i>Las contraseñas coinciden</span>");
            }
        }
    });
    $(document).on("blur",'#password',function(e){
        if($("#password").val().length <6){
            $("#error-pass").html("<span class='text-danger'><i class='fas fa-exclamation-triangle'></i>Contraseña incorrecta (debe contener entre 6 y 8 caracteres).</span>");
        }else{
        if($("#password").val()!="" && $("#password2").val()==""){
            $("#error-pass").html("<span class='text-warning'><i class='fa fa-info-circle'></i>Confirme su contraseña.</span>");
        }}
    });
});