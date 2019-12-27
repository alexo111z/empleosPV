jQuery(document).ready(function(){
    $("#email").keypress(function (key) {
        if (((key.charCode < 97 || key.charCode > 122)//letras mayusculas   
        && (key.charCode <48 || key.charCode>57)
        && (key.charCode != 46) //.
        && (key.charCode != 95) //_
        && (key.charCode != 45) //-
        && (key.charCode != 64) //@
        ))return false;
    });
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
    $("#firstName").keypress(function (key) {
        window.console.log(key.charCode)
        if (($(this).val().length>=50)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
        && (key.charCode < 65 || key.charCode > 90) //letras minusculas
        && (key.charCode != 45) //retroceso
        && (key.charCode != 241) //ñ
         && (key.charCode != 209) //Ñ
         && (key.charCode != 32) //espacio
         && (key.charCode != 225) //á
         && (key.charCode != 233) //é
         && (key.charCode != 237) //í
         && (key.charCode != 243) //ó
         && (key.charCode != 250) //ú
         && (key.charCode != 193) //Á
         && (key.charCode != 201) //É
         && (key.charCode != 205) //Í
         && (key.charCode != 211) //Ó
         && (key.charCode != 218) //Ú
              ))
              return false;
        });
        $("#lastName").keypress(function (key) {
           window.console.log(key.charCode)
           if (($(this).val().length>=50)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
            && (key.charCode < 65 || key.charCode > 90) //letras minusculas
            && (key.charCode != 45) //retroceso
            && (key.charCode != 241) //ñ
            && (key.charCode != 209) //Ñ
            && (key.charCode != 32) //espacio
            && (key.charCode != 225) //á
            && (key.charCode != 233) //é
            && (key.charCode != 237) //í
            && (key.charCode != 243) //ó
            && (key.charCode != 250) //ú
            && (key.charCode != 193) //Á
            && (key.charCode != 201) //É
            && (key.charCode != 205) //Í
            && (key.charCode != 211) //Ó
            && (key.charCode != 218) //Ú
           ))return false;
        });
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

        var $contactform = $("#form-registro");
        $contactform.validate({
            rules:{
                password: {
                    maxlength: 8,
                    minlength: 6
                },
                password2: {
                    equalTo: "#password"
                },

        }});
        $contactform.on('submit', function(e){
            if (!$contactform.validate()) { 
                e.preventDefault(); 
                return false; 
            }
        });

});