jQuery(document).ready(function(){
   $('.divEditOferta').hide();
   $('.editButton').hide();
   $(document).on("click",'#BtnEditar',function(e){
      $('.divOferta').hide();
      $('.mainButton').hide();
      $('.divEditOferta').show();
      $('.editButton').show();
   });
   $(document).on("click",'#BtnCancelar',function(e){
      $('.divEditOferta').hide();
      $('.editButton').hide();
      $('.divOferta').show();
      $('.mainButton').show();
   });
     
   $(document).on("click",'#BtnGuardar',function(e){
      //event.preventDefault();
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
      });
      jQuery.ajax({
         url: $(this).data('href') ,
         method: 'post',
         data: {
            titulo: jQuery('#titulo').val(),
            desCorta: jQuery('#desCorta').val(),
            salario: jQuery('#salario').val(),
            pais: jQuery('#CmbPais').val(),
            estado: jQuery('#CmbEstado').val(),
            ciudad: jQuery('#CmbCiudad').val(),
            desc: jQuery('#descripcion').val(),
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
            alert("Error al actualizar, intentelo más tarde");
            location.reload(true);
         }
      });
             
     });   
})