
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

     /*(document).on("click", ".btn-buscar", function(){*/
    $('#buscador').on('submit', function () { 
        if(etiquetas==""){
            etiquetas=null;
        } 
        $('#buscador').attr("action",'/ofertas/busqueda-de?empleo='+$('#empleo').val()+"&etiquetas="+JSON.stringify(etiquetas));
      /*$.ajaxSetup({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      $('#buscador').attr("action",'/ofertas/busqueda-de?empleo='+$('#empleo').val()+"&etiquetas="+JSON.stringify(etiquetas))
      alert($('#buscador').attr("action"));
      jQuery.ajax({
          type: $('#buscador').attr("method"),
          url: $('#buscador').attr("action"),
          data: $('#buscador').serialize()+"&etiquetas="+JSON.stringify(etiquetas),      
        success: function(result){ 
            $("body").html(result.toString());
        }}); */
    });
});
/*


jQuery(document).ready(function(){
    var listtag= [];
    $(document).on("click",'.tag',function(e){
        if($(this).hasClass( "active" )){
            $(this).removeClass( "active" );
            $(this).css("background-color", "");
            $(this).css("color", "");
            $(".tag"+$(this).attr("id")).remove();
            for(var i=0; i<listtag.length; i++){
                if(listtag[i]==$(this).attr("id")){
                    listtag.splice(i, 1);
                }
            } 
        }
        else{
            $(this).addClass( "active" );
            $(this).css("background-color", "#009688");
            $(this).css("color", "#fff");
            listtag.push($(this).attr("id")); 
            $('#addtag').append( " <span  class='tag"+$(this).attr("id")+" px-2  text-lowercase  border rounded'>"+ $(this).text() + "</span>");
        }
     });

   
        $('#buscador').on('submit', function () { 
            if(listtag==""){
                listtag=null;
            } 
          $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
          });
          $('#buscador').attr("action",'/ofertas/busqueda-de?empleo='+$('#empleo').val()+"&listatag="+JSON.stringify(listtag))
          alert($('#buscador').attr("action"));
          jQuery.ajax({
              type: $('#buscador').attr("method"),
              url: $('#buscador').attr("action"),
              data: $('#buscador').serialize()+"&listatag="+JSON.stringify(listtag),      
            success: function(result){ 
                $("body").html(result.toString());
            }}); 
        });
    });
    

*/