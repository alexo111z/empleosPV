jQuery(document).ready(function(){
    var etiquetas= [];
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
});