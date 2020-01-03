jQuery(document).ready(function(){
    $.extend( $.validator.messages, {
        required: "<span class='text-danger'>Este campo es obligatorio.</span>",
        email: "<span class='text-danger'>Por favor, escribe una dirección de correo válida.</span>",
        url: "<span class='text-danger'>Por favor, escribe una URL válida.</span>",
        date: "<span class='text-danger'>Por favor, escribe una fecha válida.</span>",
        number: "<span class='text-danger'>Por favor, escribe un número válido.</span>",
        digits: "<span class='text-danger'>Por favor, escribe sólo dígitos.</span>",
        equalTo: "<span class='text-danger'>Las contraseñas no coinciden.</span>",
        maxlength: $.validator.format( "<span class='text-danger'>Por favor, no escribas más de {0} caracteres.</span>" ),
        minlength: $.validator.format( "<span class='text-danger'>Por favor, no escribas menos de {0} caracteres.</span>" ),
        rangelength: $.validator.format( "<span class='text-danger'>Por favor, escribe un valor entre {0} y {1} caracteres.</span>" ),
        range: $.validator.format( "<span class='text-danger'>Por favor, escribe un valor entre {0} y {1}.</span>" ),
        max: $.validator.format( "<span class='text-danger'>Por favor, escribe un valor menor o igual a {0}.</span>" ),
        min: $.validator.format( "<span class='text-danger'>Por favor, escribe un valor mayor o igual a {0}.</span>" )
    } );
    $("#pass").keypress(function (key) {
        if (($(this).val().length>=8)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
        && (key.charCode < 65 || key.charCode > 90) //letras minusculas
        && (key.charCode <48 || key.charCode>57)
        && (key.charCode != 46) //.
        && (key.charCode != 95) //_
        && (key.charCode != 45) //-
        ))return false;
    });
    $("#newpassword").keypress(function (key) {
        if (($(this).val().length>=8)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
        && (key.charCode < 65 || key.charCode > 90) //letras minusculas
        && (key.charCode <48 || key.charCode>57)
        && (key.charCode != 46) //.
        && (key.charCode != 95) //_
        && (key.charCode != 45) //-
        ))return false;
    });
    $("#newpassword2").keypress(function (key) {
        if (($(this).val().length>=8)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
        && (key.charCode < 65 || key.charCode > 90) //letras minusculas
        && (key.charCode <48 || key.charCode>57)
        && (key.charCode != 46) //.
        && (key.charCode != 95) //_
        && (key.charCode != 45) //-
        ))return false;
    });
    var $contactform = $("#form-password");
    $contactform.validate({
        rules:{
            newpassword: {
                maxlength: 8,
                minlength: 6
            },
            newpassword2: {
                equalTo: "#newpassword"
            },
    }});
    $contactform.on('submit', function(e){
        e.preventDefault(); 
        if (!$contactform.validate()) { 
            return false; 
        }else{
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
            });
            jQuery.ajax({
            url: $(this).attr('action'),
            method: 'post',
            data: $(this).serialize(),
            success: function($result){
               if($result==1){
                $("#body-password").html('<h3 class="text-success"><i class="fa fa-check" aria-hidden="true"></i>La contraseña se modificó con éxito.</h3>')
                $("#footer-password").html("<button type='button' class='btn btn-info' data-dismiss='modal'>Aceptar</button>");
                setTimeout( location.reload(), 10000);
            }else if($result==2){
                   $("#error-password").html('La nueva contraseña debe ser diferente a la actual.')
               }else{
                $("#error-password").html('Contraseña erronea.')
               }
        }});
        }
    });
    $("#modal-password").on('hidden.bs.modal', function () {
        $("#pass").val("");
        $("#newpassword").val("");
        $("#newpassword2").val("");
        $(".error").html("");
        $("#error-password").html('')
    });
});