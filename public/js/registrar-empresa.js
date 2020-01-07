
function funcpais(a,b) {
    $("#CmbEstado").prop( "disabled", false );
    $("#CmbCiudad").prop( "disabled", true );
    $("#CmbCiudad").prepend("<option selected disabled hidden>Selecciona primero un Estado</option>");
    $("#CmbEstado").prepend("<option selected disabled hidden>Seleccionar...</option>");
    for(var i=0;i<b.length;i++){
       if(JSON.stringify(b[i].id_pais)==a){
          $("#CmbEstado option[value=" + b[i].id + "]").show();
       }else{
          $("#CmbEstado option[value=" + b[i].id + "]").hide();
       }
    }  
 }
 function funcestado(a,b) {
    $("#CmbCiudad").prop( "disabled", false );
    $("#CmbCiudad").prepend("<option selected disabled hidden>Seleccionar...</option>"); 
    for(var i=0;i<b.length;i++){
       if(JSON.stringify(b[i].id_estado)==a){
          $("#CmbCiudad option[value=" + b[i].id + "]").show();
       }else{
          $("#CmbCiudad option[value=" + b[i].id + "]").hide();
       }
    }  
 }
jQuery(document).ready(function(){
    if($('#CmbPais').val()==null){
        $("#CmbEstado").prop( "disabled", true );
        $("#CmbCiudad").prop( "disabled", true );
        $("#CmbCiudad").prepend("<option selected disabled hidden>Selecciona primero un Estado</option>");
        $("#CmbEstado").prepend("<option selected disabled hidden>Selecciona primero un País</option>");
     }
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
    $("#nombre").keypress(function (key) {
        window.console.log(key.charCode)
        if (($(this).val().length>=50)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
        && (key.charCode < 65 || key.charCode > 90) //letras minusculas
        && (key.charCode <48 || key.charCode>57)
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
        $("#dfiscal").keypress(function (key) {
            window.console.log(key.charCode)
            if (($(this).val().length>=255)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
            && (key.charCode < 65 || key.charCode > 90) //letras minusculas
            && (key.charCode <48 || key.charCode>57)
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
             && (key.charCode != 46) //.
            && (key.charCode != 95) //_
            && (key.charCode != 45) //-
                  ))
                  return false;
            });
        $("#RFC").keypress(function (key) {
            if (($(this).val().length>=13)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
            && (key.charCode < 65 || key.charCode > 90) //letras minusculas
            && (key.charCode <48 || key.charCode>57)
            ))return false;
        });
        $("#telefono").keypress(function (key) {
            window.console.log(key.charCode)
            if (($(this).val().length>=10)||((key.charCode < 48 || key.charCode > 57)))
                  return false;
        });
        $(document).on("keypress",'#otro',function(key){  
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
                   || (key.charCode == 45) //-
                        ))
                        return false;
        });
        var $contactform = $("#registro-empresa");
        $contactform.validate({
            rules:{
                password: {
                    maxlength: 8,
                    minlength: 6
                },
                password2: {
                    equalTo: "#password"
                },
                RFC:{
                    maxlength: 13,
                    minlength: 12
                }
                
        }});
        $contactform.on('submit', function(e){
            if (!$contactform.validate()) { 
                e.preventDefault(); 
                return false; 
            }
        });

});