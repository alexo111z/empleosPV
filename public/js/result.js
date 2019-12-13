jQuery(document).ready(function(){
    $('#buscador').on('submit', function () {
        $('#buscador').attr('action', '/ofertas/buscar?empleo='+$('#empleo').val());
    });
   /* $(document).on("click", ".page-link", function(){
        $(this).attr('href',window.location+"&page="+$(this).text());
    });*/
});