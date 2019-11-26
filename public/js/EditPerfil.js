
jQuery(document).ready(function(){
   /*SECCION PARA AGREGAR TAGS*/
   
   jQuery('#inputtag').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
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
                nombre: jQuery('#inputtag').val()
             },
             success: function(){
                $('#DivTags').load(' #DivTags');
                $("#inputtag").val('');
             }}); 
      }
  })
      /*VALIDACION INPUT TAGS*/
     $(document).on('input', function (e) {
         $("#inputtag").val($("#inputtag").val().toLowerCase());
       });
      $("#inputtag").keypress(function (key) {
      window.console.log(key.charCode)
      if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
            && (key.charCode < 65 || key.charCode > 90) //letras minusculas
            && (key.charCode != 241) //ñ
            &&(key.charCode < 48 || key.charCode > 57)
            &&(key.charCode != 13)
            )
            return false;
      });
      /*FIN DE VALIDACION INPUT TAGS*/

         
         $(document).on("click", ".delete-tag", function(){
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
                     id: $(this).attr("id")
                  },
                  success: function(){
                     $('#DivTags').load(' #DivTags');
                  }}); 
        });

      
   });