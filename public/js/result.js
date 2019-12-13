jQuery(document).ready(function(){
    $('#buscador').on('submit', function () {
        $('#buscador').attr('action', '/ofertas/buscar?empleo='+$('#empleo').val());
    });
});