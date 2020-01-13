jQuery(document).ready(function(){
   $(document).on("submit",'#postulacion',function(e){
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
         });
         jQuery.ajax({
            url: $(this).attr('action') ,
            method: 'post',
            data: $(this).serialize(),
            success: function(result){
                $("#div-post").load(" #div-post");
            }}); 
    });

});