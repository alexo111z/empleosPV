jQuery(document).ready(function(){
    $('.divEditOferta').hide();
    $(document).on("click",'#BtnEditar',function(e){
        $('.divOferta').hide();
        $('.divEditOferta').show();
     });
     $(document).on("click",'#BtnCancelar',function(e){
        $('.divEditOferta').hide();
        $('.divOferta').show();
     });
     
     $(document).on("click",'#BtnGuardar',function(e){
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
              titulo: jQuery('#titulo').val(),
              desCorta: jQuery('#desCorta').val(),
              salario: jQuery('#salario').val(),
              pais: jQuery('#CmbPais').val(),
              estado: jQuery('#CmbEstado').val(),
              ciudad: jQuery('#CmbCiudad').val(),
              desc: jQuery('#descripcion').val(),
           },
           success: function(){
              $('.divOferta').load(' .divOferta');
              $('.divOferta').show();
              $('.divEditOferta').hide();
           }});
        
     });   

   /** LUPITA */
})