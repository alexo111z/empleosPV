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
$('.delete-tag').hide();
jQuery(document).ready(function(){
    $('.divEditOferta').hide();
    $(document).on("click",'#BtnEditar',function(e){
        $('.divOferta').hide();
        $('.divEditOferta').show();
        $('#opciones').hide();
     });
     $(document).on("click",'#BtnCancelar',function(e){
        location.reload(true);
     });
     var etiquetas= [];
     var sal=$('#salario').val();
     sal= sal.substring(0, sal.length-3) + sal.substring(sal.length, sal.length-2);
     if($('#CmbPais').val()==null){
         $("#CmbEstado").prop( "disabled", true );
         $("#CmbCiudad").prop( "disabled", true );
         $("#CmbCiudad").prepend("<option selected disabled hidden>Selecciona primero un Estado</option>");
         $("#CmbEstado").prepend("<option selected disabled hidden>Selecciona primero un País</option>");
      }
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
    });
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
      /*VALIDACION DE INPUTS*/
      $(document).on("keypress",'#titulo',function(key){   
         window.console.log(key.charCode)
         if (($(this).val().length>=70)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
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
          || (key.charCode == 45) //-
               ))
               return false;
     });
     $(document).on("keypress",'#salario',function(key){
         if (!(($(this).val().length>=8)||((key.charCode < 48 || key.charCode > 57)
         ))){ 
             sal=sal + event.key;
             centavos =(sal.length <2 ? '0' : '') + sal.substring(sal.length, sal.length-2);
             pesos =sal.length <3 ? '0' :  sal.substring(0, sal.length-2);
             $('#salario').val(pesos + '.' + centavos);
         }
         return false;
         
     });
     $(document).on("keydown",'#salario',function(key){
         var key = event.keyCode || event.charCode;    
 
         if( key == 8 || key == 46 ){
             sal= sal.substr(0,sal.length-1);
             centavos =(sal.length <2 ? '0' : '') + sal.substring(sal.length, sal.length-2);
             pesos =sal.length <3 ? '0' :  sal.substring(0, sal.length-2);
             if(sal!=""){
                 $('#salario').val(pesos + '.' + centavos);
             }
             else{
                 $('#salario').val("");
             }  
             return false; 
         }else if(key>36 && key<40){
             return false;
         }
     });
     $(document).on("click",'#salario',function(key){
         event.preventDefault();
         var val = $(this).val();
         $(this).val("");
         $(this).val(val);
     });
     $(document).on("paste",'input',function(e){
         event.preventDefault();
     });
     $(document).on("keypress",'#tContrato',function(key){   
         window.console.log(key.charCode)
         if (($(this).val().length>=30)||((key.charCode < 97 || key.charCode > 122)//letras mayusculas
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
          || (key.charCode == 45) //-
               ))
               return false;
     });
     jQuery.validator.addMethod("fechas", function(value, element) {
         var d= new Date();
         var month = d.getMonth()+1;
         var day = d.getDate();
         var year= d.getFullYear();
         var d= year + '-' +(month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;
         return this.optional(element) || d < value ;
     }, "<span class='text-danger'>La fecha de vigencia debe ser mayor al dia de hoy.</span>");
     var $contactform = $("#form-oferta");
     $contactform.validate({
         rules:{
             titulo: {
                 maxlength: 70,
                 required:true,
             },
             desc_corta: {
                 maxlength: 142,
                 required:true,
             },
             desc_det: {
                 required:true,
                 maxlength: 700
             },
             tContrato:{
                 required:false,
                 maxlength: 30
             },
             pais:{
                 required:true,
             },
             estado: {
                 required:true,
             },
             ciudad: {
                 required:true,
             },
             vigencia: {
                 fechas: true,
                 required:true,
             },
     }});
 
     $contactform.on('submit', function(e){
         //e.preventDefault(); 
         if (!$contactform.validate()) { 
             return false; 
         }/*else{
             if(etiquetas==""){
                 etiquetas=null;
             } 
             $contactform.attr("action",'/empresas/create/oferta?etiquetas='+JSON.stringify(etiquetas));
         }*/
     });
});