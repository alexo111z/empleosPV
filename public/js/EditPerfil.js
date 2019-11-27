
jQuery(document).ready(function(){
   $('.delete-tag').hide();
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
             success: function(result){
                if(result==0){
                  $('.info-tags').show();
                }else{
                  $('#contador-tags').load(' #contador-tags');
                  $('#DivTags').load(' #DivTags');
                  $("#inputtag").val('');
               }
             }}); 
      }
  })
      /*VALIDACION INPUT TAGS*/
     $(document).on('input', function (e) {
         $("#inputtag").val($("#inputtag").val().toLowerCase());
       });
      $("#inputtag").keypress(function (key) {
      window.console.log(key.charCode)
      if (($(this).val().length>=190)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
            && (key.charCode < 65 || key.charCode > 90) //letras minusculas
            && (key.charCode != 241) //ñ
            &&(key.charCode < 48 || key.charCode > 57)
            &&(key.charCode != 13))
            )
            return false;
      });
      /*FIN DE VALIDACION INPUT TAGS*/

      /*ELIMINACION DE TAGS*/
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
                  $('#contador-tags').load(' #contador-tags');
                  $('#DivTags').load(' #DivTags');
                  $('.info-tags').hide();
         }}); 
        });
      /* FIN DE ELIMINACION DE TAGS*/
      $("#BtnEditarTag").on( "click", function() {
         $('.delete-tag').show(); //muestro mediante clase
         $('.DivTags').show();
         $('#BtnGuardarTag').show();
         $('#BtnEditarTag').hide();
      });
      $("#BtnGuardarTag").on( "click", function() {
         $('.delete-tag').hide(); 
         $('.info-tags').hide();
         $("#inputtag").val('');
         $('#BtnGuardarTag').hide();
         $('#BtnEditarTag').show();
         $('.DivTags').hide();
       });
   });