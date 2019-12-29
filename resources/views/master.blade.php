<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
    <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <meta name="_token" content="{{csrf_token()}}" />
        <title>PV-WORK</title>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700|K2D:200,400,700,800&display=swap" rel="stylesheet">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <!-- Custom styles for this template -->
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
    </head>
    <body class="mt-6">

@include('header')

@yield('header-user')

@yield('body')
   <!-- Modal -->
   <div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 ><i class="fa fa-key" aria-hidden="true"></i> Cambiar contraseña</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="form-password" name="form-password" method="POST" action="{{route('editarpassword')}}">
            {{ csrf_field() }}
        <div id="body-password" class="modal-body">
            <div class="col-md-6 ml-0 pl-0">
            <label>Contraseña actual</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="" value="" required>
                <span id="error-password" class="help-block text-danger mx-auto"></span>
            </div>
            <hr >
            <div class="row">
                <div class="col-md-6 ">
                    <label >Nueva Contraseña</label>
                    <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="" value="" required>
                </div>
                <div class="col-md-6 ">
                    <label >Confirmar nueva contraseña</label>
                    <input  type="password" class="form-control" id="newpassword2" name="newpassword2" placeholder="" value="" required>
                </div>
            </div>
        </div>
        <div id="footer-password" class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info">Guardar Contraseña</button>
        </div>
        </form>
        </div>
    </div>
    </div>
@include('footer')
