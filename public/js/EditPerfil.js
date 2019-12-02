

jQuery(document).ready(function(){
   $('.delete-tag').hide();
 
   $(document).on("click",'#BtnEditarPersonal',function(e){
      $('#infopersonal').hide();
      $('#infopersonal2').show();
   });
   $(document).on("click",'#BtnEditarContacto',function(e){
      $('#DivContacto').hide();
      $('#DivContacto2').show();
   });
   $(document).on("click",'#BtnGuardarContacto',function(e){
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
            telefono: jQuery('#TxtTel').val()
         },
         success: function(){
            $('#DivContacto').load(' #DivContacto');
            $('#DivContacto').show();
            $('#DivContacto2').hide();
         }});
      
   });
   $(document).on("click",'#BtnGuardarPersonal',function(e){
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
            nombre: jQuery('#txtnombre').val(),
            apellido: jQuery('#txtapellido').val(),
            nacimiento:  document.getElementById("CmbFecha").value,
            sexo: $('input[name=sexo]:checked').val()
         },
         success: function($result){
            $('#infopersonal').load(' #infopersonal');
            $('#infopersonal').show();
            $('#infopersonal2').hide();
         },
         error: function($result){
            
         }});
         $('#infopersonal2').show();
   });
   $(document).on("click",'#BtnEditarCon',function(e){
      $('#TxtConocimientos').show();
      $('#BtnGuardarCon').show();
      $('#BlockConocimientos').hide();
      $('#BtnEditarCon').hide();
   });
   $(document).on("click",'#BtnEditarAca',function(e){
      $('#CmbUniversidad').show();
      $('#TxtArea').show();
      $('#BtnGuardarAca').show();
      $('#LblUniversidad').hide();
      $('#LblArea').hide();
      $('#BtnEditarAca').hide();
   });
   $(document).on("click", "#BtnGuardarCon", function(){
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
            conocimientos: jQuery('#TxtConocimientos').val()
         },
         success: function(result){
              $('#DivConocimientos').load(' #DivConocimientos');
              $('#TxtConocimientos').hide();
              $('#BtnGuardarCon').hide();
              $('#BlockConocimientos').show();
              $('#BtnEditarCon').show();
         }}); 
   });
   $(document).on("click", "#BtnGuardarAca", function(){
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
            area: jQuery('#TxtArea').val(),
            nivel: jQuery('#CmbUniversidad').val()
         },
         success: function(result){
            $('#LblUniversidad').load(' #LblUniversidad');
            $('#LblArea').load(' #LblArea');
            $('#CmbUniversidad').hide();
            $('#TxtArea').hide();
            $('#BtnGuardarAca').hide();
            $('#LblUniversidad').show();
            $('#LblArea').show();
            $('#BtnEditarAca').show();
         }}); 
   });
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
      /*Mostrar y ocutal agregar tags*/
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
       /*Fin de Mostrar y ocutal agregar tags*/
       /*Mostrar tags ya guardados mientras se escribe uno nuevo en el input*/
       var search = document.querySelector('#inputtag');
       var results = document.querySelector('#searchresults');
       var templateContent = document.querySelector('#listtag').content;
       search.addEventListener('keyup', function handler(event) {
           while (results.children.length) results.removeChild(results.firstChild);
           var inputVal = new RegExp(search.value.trim(), 'i');
           var set = Array.prototype.reduce.call(templateContent.cloneNode(true).children, function searchFilter(frag, item, i) {
               if (inputVal.test(item.textContent) && frag.children.length < 5) frag.appendChild(item);
               return frag;
           }, document.createDocumentFragment());
           results.appendChild(set);
       });
       /*Fin Mostrar tags ya guardados mientras se escribe uno nuevo en el input*/
      $("#TxtTel").keypress(function (key) {
      window.console.log(key.charCode)
      if (($(this).val().length>=10)||((key.charCode < 48 || key.charCode > 57))
            )
            return false;
      });
      $("#txtnombre").keypress(function (key) {
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
         $("#txtapellido").keypress(function (key) {
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
   });

