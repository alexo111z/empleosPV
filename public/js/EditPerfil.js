
         jQuery(document).ready(function(){
            jQuery('#addTag').click(function(e){
               e.preventDefault();
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
                  success: function(){
                     $('#DivTags').load(' #DivTags');
                     $("#inputtag").val('');
                  }});
               });
            });