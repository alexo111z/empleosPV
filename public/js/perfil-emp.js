function funcpais(a,b) {
    $("#CmbEstado").prop( "disabled", false );
    $("#CmbEstado").prepend("<option selected disabled hidden>Seleccionar...</option>");
    $("#CmbCiudad").prop( "disabled", true );
    $("#CmbCiudad").prepend("<option selected disabled hidden>Selecciona primero un Estado</option>");
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
   $(document).on("click",'#newpassword',function(e){
      $('#new-password').hide();
      $('#new-password2').show();
   });
    $(document).on("click",'#BtnEditarDatos',function(e){
        $('#Datos').hide();
        $('#Datos2').show();
     });
     $(document).on("click",'#BtnEditarContacto',function(e){
      $('#DivContacto').hide();
      $('#DivContacto2').show();
   });
     $(document).on("click",'#BtnCancelarDatos',function(e){
      location.reload(true);
     });
     $(document).on("click",'#BtnCancelarContacto',function(e){
      location.reload(true);
   });
   $(document).on("click",'#cancelar-password',function(e){
      location.reload(true);
   });
   $(document).on("keypress",'#email',function(key){  
      if (((key.charCode < 97 || key.charCode > 122)//letras mayusculas   
      && (key.charCode <48 || key.charCode>57)
      && (key.charCode != 46) //.
      && (key.charCode != 95) //_
      && (key.charCode != 45) //-
      && (key.charCode != 64) //@
      ))return false;
  });
  $(document).on('keypress','input[type="password"]',function(key){
   if (($(this).val().length>=8)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
        && (key.charCode < 65 || key.charCode > 90) //letras minusculas
        && (key.charCode <48 || key.charCode>57)
        && (key.charCode != 46) //.
        && (key.charCode != 95) //_
        && (key.charCode != 45) //-
        ))return false;

  });
  $(document).on("keypress",'#telefono',function(key){ 
   window.console.log(key.charCode)
   if (($(this).val().length>=10)||((key.charCode < 48 || key.charCode > 57)))
         return false;
});
   $(document).on("keypress",'#contacto',function(key){  
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
      $(document).on("keypress",'#rfc',function(key){        
         if (($(this).val().length>=13)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
         && (key.charCode < 65 || key.charCode > 90) //letras minusculas
         && (key.charCode <48 || key.charCode>57)
         ))return false;
      });
      $(document).on("keypress",'#d_fiscal',function(key){    
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
      $(document).on("keypress",'#nombre',function(key){
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
  var $contactform = $("#form-Datos");
        $contactform.validate({
            rules:{
                RFC:{
                    maxlength: 13,
                    minlength: 12
                },
                d_fiscal:{
                  maxlength: 255
                }
                
        }});
        $(document).on("submit",$contactform,function(e){
            if (!$contactform.validate()) { 
                e.preventDefault(); 
                return false; 
            }
        });
        var $contactform2 = $("#form-Contacto");
        $contactform2.validate({
            rules:{
                RFC:{
                    maxlength: 13,
                    minlength: 12
                },
                d_fiscal:{
                  maxlength: 255
                }
                
        }});
        $(document).on("submit",$contactform2,function(e){
            if (!$contactform.validate()) { 
                e.preventDefault(); 
                return false; 
            }
        });
        $(document).on('change','input[id="foto"]',function(){
         var fileName = this.files[0].name;
         var ext = fileName.split('.');
         ext = ext[ext.length-1];
         if(ext=="png" || ext=="jpg" || ext=="jpeg"){
            $('#msjimg').html('');
            $("#btnFoto").prop('disabled', false);
            $("#modal-foto").prop('src', URL.createObjectURL(event.target.files[0]));
            $("#modal-foto").load(' #modal-foto');
         }else{
            $('#msjimg').html('La foto de perfil debe ser imagen jpg,jpeg o png.');
            $("#btnFoto").prop('disabled', true);
         }
      });
      $("#modal-logo").on('hidden.bs.modal', function () {
         $("#foto").val("");
         $("#msjimg").html("");
         $("#modal-foto").prop('src', '/logos/empresa.png');
         $("#modal-foto").load(' #modal-foto');
     });

     var $passwordform = $("#emp-password");
     $passwordform.validate({
         rules:{
            pass:{
               maxlength: 8,
               minlength: 6
            },
             newpass: {
                 maxlength: 8,
                 minlength: 6
             },
             newpassword2: {
                 equalTo: "#newpass"
             },
     }});
     $passwordform.on('submit', function(e){
      e.preventDefault(); 
         if (!$passwordform.validate()) { 
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
                     $('#aviso-pass').modal('show');
                     }else if($result==2){
                           $("#error-password").html('La nueva contraseña debe ser diferente a la actual.')
                     }else{
                     $("#error-password").html('Contraseña erronea.')
                     }
            }});
            }
     });
     $(document).on("click",'#btn-aviso',function(e){
      $('#aviso-pass').modal('hide');
   });
   $("#aviso-pass").on('hidden.bs.modal', function () {
      location.reload(true);
  });
  $(document).on("click",'#btnBaja',function(e){
      $('#divBaja').hide();
      $('#divBaja2').show();
   });
   $(document).on("click",'#cancelar-Baja',function(e){
      location.reload(true);
   });
   var $verpass = $("#verificarpassword");
   $verpass.validate({
       rules:{
          confirmpass:{
             maxlength: 8,
             minlength: 6
          }
   }});
   $verpass .on('submit', function(e){
    e.preventDefault(); 
       if (!$verpass .validate()) { 
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
                   $('#confirmbaja').modal('show');
                   }else{
                   $("#error-confirm").html('Contraseña erronea.')
                   }
          }});
          }
   });
   $("#confirmbaja").on('hidden.bs.modal', function () {
      location.reload(true);
  });
});