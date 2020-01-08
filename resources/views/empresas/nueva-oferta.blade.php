@extends('empresas.master')
<link href="{{ asset('css/admin/regOferta.css') }}" rel="stylesheet">
@section('body')

    <main role="main" class="col-md-12 py-0 px-0">  
        <div class="container">
            <div class="py-5 text-center">
                <h1 class="text-uppercase">Registrar nueva oferta</h1>
            </div>
            {!! Form::open(array('route'=>array('admin.c.ofer', $emp->id),'method'=>'POST', 'id'=>'buscador')) !!}
            <form  class="needs-validation primary" novalidate>
            {{ csrf_field() }}

            <!-- start personal information -->
           <div class="col-md-8 order-md-1">
                <h4 class="mb-1">Datos de la oferta</h4>
                <div class="mb-3">
                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ej. Desarrollador web" value="{{ old('titulo') }}" required>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="desc_corta">Descripcion corta de la oferta</label>
                        <textarea value="{{ old('desc_corta') }}" class="form-control mb-3 text-desc" id="desc_corta" name="desc_corta" rows="3" style="display: inline-block;" required></textarea>
                    </div>

                    <div class="DivTags col-md-12 mb-3">
                        <label for="">Habilidades/Identificadores (Tags)</label>
                        <small  class="text-muted"> (Presiona 'enter' para añadir) </small><br>
                        <div class="col-md-8 ml-0 mr-2 pl-0">
                            <template id="listtag" size="5">
                                {{--@foreach($tags as $tag)
                                    <option >{{ $tag->nombre }}</option>
                                @endforeach  --}}  
                            </template>
                            <input name="inputtag" autocomplete="off"  list="searchresults" data-min-length='1' type="text" class="form-control"  id="inputtag" data-href="{{url('/perfil/createtags')}}" name="inputtag" placeholder="ej. computación, office, vendedora" >
                            <datalist id="searchresults"></datalist>
                        </div>
                        <small class="text-warning info-tags"><i class="fa fa-info-circle"></i>Tienes el limites de tags permitido, elimina algunos para agregar más.</small>
                    </div>
                    <hr class="mb-1">

                    <div class="col-md-12 mb-3">   
                        <h4 class="mb-1">Ubicaion de la oferta</h4>
                        <div class="div-ubicacion col-md-6 ml-0 pl-0">
                            <span>País</span>
                            {{--{{$selectpais=""}}--}}  
                            <select id="CmbPais"  name="pais" {{--onchange='funcpais(this.value,<! ?php echo json_encode($estados); ?>)'--}}  class="form-control">
                                @if ( old('pais') == '' )
                                    <option selected disabled hidden>Seleccionar....</option>
                                @else
                                    <option selected value="{{ old('pais') }}" hidden>{{ $paises[old('pais')-1]->pais }}</option>
                                @endif
                                @foreach($paises as $pais)
                                    <option value="{{ $pais->id }}">{{ $pais->pais }}</option>
                                @endforeach
                                {{--@foreach($paises as $pais)
                                    @if($pais->id == auth()->user()->id_pais)
                                        <option value="{{ $pais->id }}" selected>{{ $pais->pais }}</option>
                                    @else
                                        <option value="{{ $pais->id }}">{{ $pais->pais }}</option>
                                    @endif
                                @endforeach--}}
                            </select>
                        </div>
                        <div class="div-ubicacion col-md-6 pl-0">
                            <span>Estado</span>
                            <select id="CmbEstado" name="estado" class="form-control" {{--onchange='funcestado(this.value,<! ?php echo json_encode($municipios); ?>)'--}}>
                                @if ( old('estado') == '' )
                                    <option selected disabled hidden>Seleccionar....</option>
                                @else
                                    <option selected value="{{ old('estado') }}" hidden>{{ $estados[old('estado')-1]->estado }}</option>
                                @endif
                                @foreach($estados as $estado)
                                    <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                                @endforeach
                                {{--@foreach($estados as $estado)
                                    @if($estado->id == auth()->user()->id_estado)
                                        <option value="{{ $estado->id }}" selected>{{ $estado->estado }}</option>
                                    @else
                                        <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                                    @endif
                                @endforeach--}}
                            </select>
                        </div>
                        <div class="div-ubicacion col-md-6 pl-0">
                            <span>Ciudad</span>
                            <select id="CmbCiudad" name="ciudad" class="form-control"  >
                                @if ( old('ciudad') == '' )
                                    <option selected disabled hidden>Seleccionar....</option>
                                @else
                                    <option selected value="{{ old('ciudad') }}" hidden>{{ $municipios[old('ciudad')-1]->municipio }}</option>
                                @endif
                                @foreach($municipios as $municipio)
                                    <option value="{{ $municipio->id }}">{{ $municipio->municipio }}</option>
                                @endforeach
                                {{--@foreach($municipios as $municipio)
                                @if($municipio->id == auth()->user()->id_ciudad)
                                    <option value="{{ $municipio->id }}" selected>{{ $municipio->municipio }}</option>
                                @else
                                    <option value="{{ $municipio->id }}">{{ $municipio->municipio }}</option>
                                @endif
                                @endforeach--}}
                            </select>
                        </div>
                    </div>

                </div>
           </div>
            <hr class="mb-1">
            <div class="col-md-8 order-md-1">
                <h4 class="mb-1">Detalles de la oferta</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                            <label for="vigencia">Fecha de vigencia</label>
                            <small  class="text-muted"> (Fecha limite para la oferta) </small><br>
                            <input id="CmbFecha" name="vigencia" type="date" class="form-control" value="{{ old('vigencia')==''?'': old('vigencia') }}" min="2020-01-01">
                    </div>
                    <div class="col-md-12 mb-3">
                            <label for="desc_det">Descripcion detallada</label>
                            <textarea class="form-control" id="desc_det" name="desc_det" rows="5" style="display: inline-block;">
                                {{ old('desc_det') }}
                            </textarea>
                    </div>
                    <div class="div-det col-md-6 mb-3">
                        <label for="salario">Salario</label>
                        <small  class="text-muted"> (Opcional) </small><br>
                        <input type="text" class="form-control" id="salario" name="salario" value="{{ old('salario') }}" placeholder="00000.00">     
                    </div>
                    <div class="div-det col-md-6 mb-3">
                            <label for="tContrato">Tiempo de Contrato</label>
                            <small  class="text-muted"> (Opcional) </small><br>
                            <input type="text" class="form-control" id="tContrato" name="tContrato" value="{{ old('tContrato') }}" placeholder="Indefinido, 1 semana">     
                    </div>
                    
                </div>
                <div class="col-md-8 order-md-1">
                    <button class="btn btn-register btn-lg btn-block" type="submit">Crear oferta</button>
                </div>
            </div>
            </form>
            {!! Form::close() !!}
        </div>
    </main>

@endsection
