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
            },
         }); 
      }
   });
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
               },
            }); 
        });
      /* FIN DE ELIMINACION DE TAGS*/
      
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
})