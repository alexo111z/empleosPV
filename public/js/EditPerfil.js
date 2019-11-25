
         jQuery(document).ready(function(){
            jQuery('#addTag').click(function(e){
               
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: 'http://127.0.0.1:8000/perfil/createtags',
                  method: 'post',
                  data: {
                     nombre: jQuery('#inputtag').val()
                  },
                  success: function(result){
                     alert('yeii');
                  },
                  error: function(req, textStatus, errorThrown) {
                      //this is going to happen when you send something different from a 200 OK HTTP
                      alert('Ooops, something happened: ' + textStatus + ' ' +errorThrown);
                  }});
               });
            });
            