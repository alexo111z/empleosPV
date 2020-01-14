jQuery(document).ready(function(){
    $('.editar').hide();
    $('.Buttons').hide();
    $(document).on("click",'#delete-admin',function(e){
      event.preventDefault();
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }});
         jQuery.ajax({
            url: $(this).data('href') ,
            method: 'post',
            data: $("#confirmbaja").serialize() ,
            success: function($result){
               $(location).attr('href','/administrator/administradores');
            },
            error: function(jqXHR, exception){
               var msg = '';
               if (jqXHR.status === 0) {
                     msg = 'Not connect.\n Verify Network.';
               } else if (jqXHR.status == 404) {
                     msg = 'Requested page not found. [404]';
               } else if (jqXHR.status == 500) {
                     msg = 'Internal Server Error [500].';
               } else if (exception === 'parsererror') {
                     msg = 'Requested JSON parse failed.';
               } else if (exception === 'timeout') {
                     msg = 'Time out error.';
               } else if (exception === 'abort') {
                     msg = 'Ajax request aborted.';
               } else {
                     msg = 'Uncaught Error.\n' + jqXHR.responseText;
               }
               alert("Error al actualizar, intentelo más tarde: "+msg);
               location.reload(true);
            },
         });
      });
       /*VALIDACIONES*/
       $("#name").keypress(function (key) {
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
         $("#apellido").keypress(function (key) {
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
         $(document).on('keypress','input[type="password"]',function(key){
            if (($(this).val().length>=8)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                 && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                 && (key.charCode <48 || key.charCode>57)
                 && (key.charCode != 46) //.
                 && (key.charCode != 95) //_
                 && (key.charCode != 45) //-
                 ))return false;
         
           });
    $(document).on("click",'#BtnEditar',function(e){
       $('.datos').hide();
       $('.editButton').hide();
       $('.editar').show();
       $('.Buttons').show();
    });
    $(document).on("click",'#BtnCancelar',function(e){
       $('.editar').hide();
       $('.Buttons').hide();
       $('.editar').load(' #form-edit');
       $('.datos').show();
       $('.editButton').show();
    });
    var $contactform = $("#form-edit");
    $contactform.validate({
         rules:{
            apellido: {
               required: true
            },
            name: {
               required: true
            },
   }});
   $(document).on("submit",$contactform,function(e){
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
                  url: $('#BtnGuardar').data('href') ,
                  method: 'post',
                  data: {
                     name: jQuery('#name').val(),
                     apellido: jQuery('#apellido').val(),
                     tipo: jQuery('#tipo').val(),
                  },
                  success: function($result){
                     location.reload(true);
                  },
                  error: function(jqXHR, exception){
                     var msg = '';
                     if (jqXHR.status === 0) {
                           msg = 'Not connect.\n Verify Network.';
                     } else if (jqXHR.status == 404) {
                           msg = 'Requested page not found. [404]';
                     } else if (jqXHR.status == 500) {
                           msg = 'Internal Server Error [500].';
                     } else if (exception === 'parsererror') {
                           msg = 'Requested JSON parse failed.';
                     } else if (exception === 'timeout') {
                           msg = 'Time out error.';
                     } else if (exception === 'abort') {
                           msg = 'Ajax request aborted.';
                     } else {
                           msg = 'Uncaught Error.\n' + jqXHR.responseText;
                     }
                     alert("Error al actualizar, intentelo más tarde: "+msg);
                     location.reload(true);
                  },
               });
            }
        });
        var $formpass= $("#passwordChache");
        $formpass.validate({
         rules:{
             nueva: {
                 maxlength: 8,
                 minlength: 6
             },
             nueva2: {
                 equalTo: "#nueva"
             },
     }});
     $formpass.on('submit', function(e){
       
         if (!$formpass.validate()) { 
            e.preventDefault();
             return false; 
         }
     });
   
 });

 /* $(document).on("click",'#BtnGuardar',function(e){
       event.preventDefault();
       $.ajaxSetup({
          headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
       });
       jQuery.ajax({
          url: $(this).data('href') ,
          method: 'post',
          data: {
             name: jQuery('#name').val(),
             apellido: jQuery('#apellido').val(),
             tipo: jQuery('#tipo').val(),
          },
          success: function($result){
             location.reload(true);
          },
          error: function(jqXHR, exception){
             var msg = '';
             if (jqXHR.status === 0) {
                   msg = 'Not connect.\n Verify Network.';
             } else if (jqXHR.status == 404) {
                   msg = 'Requested page not found. [404]';
             } else if (jqXHR.status == 500) {
                   msg = 'Internal Server Error [500].';
             } else if (exception === 'parsererror') {
                   msg = 'Requested JSON parse failed.';
             } else if (exception === 'timeout') {
                   msg = 'Time out error.';
             } else if (exception === 'abort') {
                   msg = 'Ajax request aborted.';
             } else {
                   msg = 'Uncaught Error.\n' + jqXHR.responseText;
             }
             alert("Error al actualizar, intentelo más tarde: "+msg);
             location.reload(true);
          }
       });
              
      });
      */