
@section('modal-pass')
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
            <div class="row"><div class="col-md-6">
                <label>Contraseña actual</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="" value="" required>
                <span id="error-password" class="help-block text-danger mx-auto"></span>
            </div>
            <div class="col-md-6 ml-0 pl-0">
                <ul>
                    <li>Entre 6 y 8 caracteres.</li>
                    <li>Puede contener números y letras</li>
                    <li> Puede contener guiones (-),guiones bajos (_) y puntos (.).</li>
                </ul>
            </div>
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
@endsection