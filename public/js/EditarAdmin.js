jQuery(document).ready(function(){
    $('.editar').hide();
    $('.Buttons').hide();
    $(document).on("click",'#BtnEditar',function(e){
       $('.datos').hide();
       $('.editButton').hide();
       $('.editar').show();
       $('.Buttons').show();
    });
    $(document).on("click",'#BtnCancelar',function(e){
       $('.editar').hide();
       $('.Buttons').hide();
       $('.datos').show();
       $('.editButton').show();
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
 })