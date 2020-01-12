@extends('master')
@section('body')

<main role="main">
    <div class="container px-auto">
        <div class="row px-auto">
            <div class="col-md-9 order-md-1 mx-auto mt-4 mb-0">
                <div class="no-gutters border rounded overflow-hidden flex-md-row mb-4 pt-4 shadow-sm h-md-250 position-relative">
                    <div class=" text-center mr-4 ml-4 mb-5">
                        <div id="divBaja" class="text-center col-sm-12 pl-0 ml-0">
                        <h5>Dar de baja mi cuenta</h5>
                        <form  id="verificarpassword" name="verificarpassword" method="POST" action="{{route('user.verificarpassword')}}">
                            {{ csrf_field() }}
                            <div class=" mx-auto col-md-9 ml-0 pl-0">
                                <label>Introducir contraseña para dar de baja su cuenta</label><br>
                                <span class="text-info"><i class="fas fa-info-circle"></i>Una vez que se da de baja la cuenta ya no podrá ingresar a está.</span>
                                <input type="password" class="form-control col-sm-7 mx-auto" id="confirmpass" name="confirmpass" placeholder="" value="" required>
                               
                                <span id="error-confirm" class="help-block text-danger mx-auto"></span>
                            </div>
                            <div  class="text-center col-sm-12 mt-3" >
                                <button id="btn-confirmbaja" type="submit" class="btn btn-danger ">Dar de baja mi cuenta</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
                    <!---------------->
        <div class="modal fade" id="confirmbaja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> ¿Esta seguro que desea dar de baja su cuenta?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span class="text-danger"><i class="fas fa-info-circle"></i>Una vez que se da de baja la cuenta ya no podrá ingresar a está.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button onclick="event.preventDefault(); document.getElementById('delete-user').submit();" class="btn btn-danger" type="submit" ><i class="fa fa-trash" aria-hidden="true"></i> Dar de baja mi cuenta</button>
                    </div>
                    <form id="delete-user" action="{{ route('user.delete') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
        <!-------------->
        </div>

    </div>
</main>


@endsection
@section('scripts')

   <script src="{{asset('js/perfil-emp.js')}}"> </script>
@endsection