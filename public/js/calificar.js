jQuery(document).ready(function(){
    var calificacion=0;
    $(document).on("click",'#btn-calificar',function(e){
        $('#DivCalificar').show();
        $('#btn-calificar').hide();
    });
    $(document).on("click",'#btn-cancelar',function(e){
        $('#DivCalificar').hide();
        $('#DivCalificar').load(' #form-calificacion');
        $('#btn-calificar').show();
    });
    $(document).on("mouseover",'.calificacion',function(e){
        var n= $(this).attr("id");
        for(var i=1;i<=n;i++){
            $('#'+i).css("color", "#FBC02D");
        }
    });
   $(document).on("mouseout",'#estrellas',function(e){
        $('.calificacion').css("color", "#BDBDBD");
    });
    $(document).on("click",'.calificacion',function(e){
        $('.calificacion').removeClass("checked");
        var n= $(this).attr("id");
        calificacion=n;
        for(var i=1;i<=n;i++){
            $('#'+i).addClass("checked");
        }
    });
    $(document).on("submit",'#form-calificacion',function(e){
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
         });
         jQuery.ajax({
            url: $(this).attr('action') ,
            method: 'post',
            data: {
                calificacion: calificacion,
                comentario: $('#comentario').val(),
            },
            success: function(result){
                location.reload(true);
            }}); 
    });
});