
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
jQuery(document).ready(function(){
    var etiquetas= [];
    var sal="";
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
     /*SECCION PARA AGREGAR TAGS*/
   jQuery('#inputtag').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        var estado=0;
        if(keycode == '13' && $(this).val() != "" && $(this).val() !="  "){
            event.preventDefault();
            if(etiquetas.length < 10){
                if(etiquetas!=""){
                    jQuery.each( etiquetas, function( i, val ) {
                    if(val==$('#inputtag').val()){
                        estado=1;
                        }
                    });
                }
                if(estado==0){
                    etiquetas.push($('#inputtag').val());
                    $('#DivTags').append( " <span id='tag"+etiquetas.length+"' class='tag px-2 text-lowercase border rounded'>"+ $('#inputtag').val() + " <i id='"+etiquetas.length+"'  class='delete-tag fa fa-close'></i></span>");     
                    $('#contador-tags').html(etiquetas.length + ' de 10');
                }
                $(this).val("");
            }else{
                $('.info-tags').html('<i class="fa fa-info-circle"></i>Tienes el limites de tags permitido, elimina algunos para agregar más.');
            }
        }
    });
     /*ELIMINACION DE TAGS*/
     $(document).on("click", ".delete-tag", function(){
        id="#tag"+$(this).attr("id");
        jQuery.each( etiquetas, function( i, val ) {
            if(val == $.trim($(id).text())){
                etiquetas.splice(i, 1);
                $(id).remove()
                $('#contador-tags').html(etiquetas.length + ' de 10');
                $('.info-tags').html('');
            }
        });
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

   /* jQuery.validator.addMethod("money", function(value, element) {
        return this.optional(element) || /^\d{0,4}(\.\d{0,2})?$/.test(value);
    }, "Usar formato de moneda");*/
    jQuery.validator.addMethod("fechas", function(value, element) {
        var d= new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var year= d.getFullYear();
        var d= year + '-' +(month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;
        return this.optional(element) || d < value ;
    }, "<span class='text-danger'>La fecha de vigencia debe ser mayor al dia de hoy.</span>");
    var $contactform = $("#form-nuevaoferta");
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
    /*$contactform.on('submit', function(e){
        if (!$contactform.validate()) { 
            e.preventDefault(); 
            return false; 
        }
    });
*/
    $contactform.on('submit', function(e){
        //e.preventDefault(); 
        if (!$contactform.validate()) { 
            return false; 
        }else{
            if(etiquetas==""){
                etiquetas=null;
            } 
            $contactform.attr("action",'/empresas/create/oferta?etiquetas='+JSON.stringify(etiquetas));
           /* $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
                jQuery.ajax({
                url: $(this).attr('action'),
                method: 'post',
                data: {
                    titulo: $('#titulo').val(),
                    desc_corta:$('#desc_corta').val(),
                    pais: $('#CmbPais').val(),
                    estado:$('#CmbEstado').val(),
                    ciudad:$('#CmbCiudad').val(),
                    vigencia:$('#CmbFecha').val(),
                    desc_det:$('#desc_det').val(),
                    salario: $('#salario').val(),
                    tContrato: $('#tcontrato').val(),
                },
                success: function($result){
                   
                }
            });*/
        }
    });
});