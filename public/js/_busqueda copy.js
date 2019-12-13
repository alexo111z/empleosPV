
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

    $("#buscador").submit(function(e){
        if(listtag==""){
            listtag=null;
        } 
       $('#buscador').attr("action","/busqueda/"+listtag);
      /*  alert(  $('#buscador').attr("action"));
      e.pr$(this).serialize()eventDedault();
      $.ajaxSetup({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      jQuery.ajax({
          type: $('#buscador').attr("method"),
          url: $('#buscador').attr("action"),
          data: $('#buscador').serialize(),
        success: function(){
          alert('click');
        }}); 
       */ 
    });
});