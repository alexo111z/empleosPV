
jQuery(document).ready(function(){
    var etiquetas= [];
    $(document).on("click",'.tag',function(e){
        if($(this).hasClass( "active" )){
            $(this).removeClass( "active" );
            $(this).css("background-color", "");
            $(this).css("color", "");
            $(".tag"+$(this).attr("id")).remove();
            for(var i=0; i<etiquetas.length; i++){
                if(etiquetas[i]==$(this).text()){
                    etiquetas.splice(i, 1);
                }
            } 
        }
        else{
            $(this).addClass( "active" );
            $(this).css("background-color", "#009688");
            $(this).css("color", "#fff");
            etiquetas.push($(this).text()); 
            $('#addtag').append( " <span  class='tag"+$(this).attr("id")+" px-2  text-lowercase  border rounded'>"+ $(this).text() + "</span>");
        }
     });

    $('#buscador').on('submit', function () { 
        var empleo=$("#empleo").val();
        if(empleo=="" || empleo==" " ){
            empleo=null;
        }
        var min=$('option:selected','#selsueldo').data('min');
        var max=$('option:selected','#selsueldo').data('max');
        if(etiquetas==""){
            etiquetas=null;
        } 
        $('#buscador').attr("action",'/ofertas/busqueda-de?empleo='+empleo+"&etiquetas="+JSON.stringify(etiquetas)+"&min="+min+"&max="+max);

    });
});
