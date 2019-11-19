@extends('master')
@section('body')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{asset('css/perfil.css')}}" rel="stylesheet">
        <script src="{{asset('js/perfil.js')}}"type="text/javascript">

        </script>
        <main role="main">
            <div class="container px-auto">
                <div class="row px-auto">
                    <div class="information-personal col-md-4 order-md-1 mx-auto mt-4 mb-0">
                        <div class="no-gutters border rounded overflow-hidden flex-md-row mb-4 pt-4 shadow-sm h-md-250 position-relative">
                            <div class="text-center mx-auto" >
                                    <img class="foto-perfil" src="https://via.placeholder.com/200x200.png">
                                    <div class="col-md-9 mb-0 text-right mx-auto div-camera">
                                        <a href="#" class="btn-remove mx-1 px-1"><span class="fa fa-trash-o"></span></a>
                                        <a href="#" class="btn-upload mx-1 px-1"><span class="fa fa-upload"></span></a>
                                    </div>
                            </div>

                            <div class="text-center  mt-0 pt-2">
                                <h3 class="mb-0">
                                    <span>{{auth()->user()->nombre}}</span>
                                    <span>{{auth()->user()->apellido}} </span>
                                </h3>
                            </div>
                            <div class="mt-4 text-center">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="text-center"><a href="">Ver comentarios>></a></div>
                            <hr class="ml-4 mr-4">
                            <div class="col-md-5 ml-4">
                                <h6 class="my-0">Fecha de nacimiento</h6>
                                <small id="TxtFecha" class="text-muted">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', auth()->user()->nacimiento)->format('d-m-Y') }}</small>
                                <input id="CmbFecha"type="date" class="form-control" id="date"  value="2000-01-01" min="1960-01-01" max="2002-12-31">
                            </div>
                            <div id="DivEdad"class="col-md-5 ml-4">
                                <span>Edad:</span> <small class="text-muted">{{ auth()->user()->edad }}</small>
                            </div>
                            <hr class="ml-4 mr-4">
                            <div class="ml-4">
                                <h6 class="my-0">Sexo</h6>
                                <small id="TxtSexo" class="text-muted">{{ auth()->user()->genero ? 'Femenino' : 'Masculino' }}</small>
                            </div>
                            <div id="DivSexo" class="col-md-6 mb-3">  <!-- Modificar para edicion -->
                                <div class="col-md-2 mb-2">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="f" name="sexo" class="custom-control-input">
                                        <label class="custom-control-label" for="f">Femenino</label>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <div class="custom-control custom-radio">
                                         <input type="radio" id="m" name="sexo" class="custom-control-input">
                                        <label class="custom-control-label" for="m">Masculino</label>
                                    </div>
                                </div>

                            </div>


                            <hr class="ml-4 mr-4">
                            <div id="DivCiudad" class="ml-4">
                                <h6 class="my-0">Ciudad</h6>
                                @if(auth()->user()->cidudad == null)
                                    <small class="text-muted">Actualiza tu información</small>
                                @else
                                    <small class="text-muted">{{ auth()->user()->ciudad }}</small>,<small class="text-muted">{{ auth()->user()->estado }}</small>
                                @endif
                            </div>
                            <div id="DivCiudad2" class="ml-4 mb-2">  <!-- Modificar para edicion -->
                                    <span class="text-muted">País</span>
                                    <select id="CmbPais"  class="form-control">
                                        <option value="volvo">México</option>
                                        <option value="saab">Estados unidos</option>
                                        <option value="mercedes">Canada</option>
                                    </select>
                                    <span class="text-muted">Estado</span>
                                    <select id="CmbEstado"  class="form-control">
                                        <option value="volvo">Jalisco</option>
                                        <option value="saab">solima</option>
                                        <option value="mercedes">Aguascalientes</option>
                                    </select>
                                    <span class="text-muted">Ciudad</span>
                                    <select id="CmbCiudad"  class="form-control">
                                        <option value="volvo">Puerto Vallarta</option>
                                        <option value="saab">Guadalajara</option>
                                        <option value="mercedes">Chapala</option>
                                    </select>
                            </div>

                            <div class="text-right ">
                                <button type="button "id="BtnEditarPersonal" onclick="javascript:mostrar_personal();" class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                                <button type="button "id="BtnGuardarPersonal" onclick="javascript:ocultar_personal();" class=" form-inline icon btn btn-primary ">Guardar</button>
                            </div>
                        </div>
                        <div class="no-gutters border rounded overflow-hidden flex-md-row mb-4 pt-4 shadow-sm h-md-250 position-relative">
                            <h4 class="mx-2 mb-0">Información de contacto</h4>

                            <div class="ml-4">
                                <h6 class="my-0">Correo electrónco</h6>
                                <small id="LblEmail" class="text-muted">{{ auth()->user()->email }}</small>
                                <input type="text" class="form-control" id="TxtEmail" name="email" placeholder="" value="{{ auth()->user()->email }}" required>
                            </div>
                            <hr class="ml-4 mr-4">
                            <div class="ml-4">
                                <h6 class="my-0">Telefono</h6>
                                <small id="LblTel"class="text-muted">{{ auth()->user()->telefono == null ? 'Actutaliza tu informacion' : auth()->user()->telefono }}</small><br>
                                <input type="text" class="form-control" id="TxtTel" name="telefono" placeholder="" value="{{ auth()->user()->telefono }}" required>
                            </div>
                            <div id="DivPrivacidad" class="ml-4">
                                <small class="text-privacity text-muted">Privacidad:</small><small class="text-privacity text-muted">{{ auth()->user()->coment ? 'Publico' : 'Privado' }}</small>
                            </div>
                           <div id="DivPrivacidad2" class="ml-4">
                                <h6 class="my-0">Privacidad</h6>  <!-- Acomodar edicion -->
                                <select id="CmbCiudad"  class="form-control">
                                        <option value="volvo">Privado</option>
                                        <option value="saab">Publico</option>
                                </select>
                            </div>
                            <div class="text-right mt-2">
                                <button id="BtnEditarContacto" type="button "  onclick="javascript:mostrar_contacto();"class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                                <button id="BtnGuardarContacto" type="button "  onclick="javascript:ocultar_contacto();"class=" form-inline icon btn btn-primary ">Guardar</button>

                            </div>
                        </div>
                    </div>
                    <div class="profesional-information col-md-7 order-md-2 mx-auto mt-4">
                        <div class="no-gutters border rounded overflow-hidden flex-md-row shadow-sm h-md-250" novalidate>
                            <h4 class=" ml-4  mb-3 ">Formación académica</h4>
                            <div class="row mr-4 ml-4">

                                <div class="col-md-5 mb-3">
                                    <h6>Nivel de estudios</h6>
                                    <span id="LblUniversidad">{{ auth()->user()->estudios->nivel }}</span>

                                    <select id="CmbUniversidad"  class="form-control"> <!-- Acomodar edicion -->
                                        <option value="volvo">Primaria</option>
                                        <option value="saab">Secundaria</option>
                                        <option value="mercedes">Preparatoria</option>
                                        <option value="audi">Universidad</option>
                                    </select>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <h6 class="t">Área</h6>
                                    <span id="LblArea">{{ auth()->user()->area->area }}</span>
                                    <select id="TxtArea"  class="form-control"> <!-- Acomodar edicion -->
                                        <option value="volvo">Primaria</option>
                                        <option value="saab">Secundaria</option>
                                        <option value="mercedes">Preparatoria</option>
                                        <option value="audi">Universidad</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-0 ml-0 mr-1 text-right ">
                                    <button id="BtnEditarAca" type="button "   onclick="javascript:mostrar_academica();" class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                                    <button id="BtnGuardarAca" type="button "   onclick="javascript:ocultar_academica();" class=" form-inline icon btn btn-primary">Guardar</button>
                                </div>
                            </div>

                        </div>
                        <div class="no-gutters border rounded overflow-hidden mt-2 flex-md-row shadow-sm h-md-250" novalidate>
                            <h4 class=" ml-4  mb-3 ">Información laboral</h4>
                            <div class="row mr-4 ml-4">
                                <div class="col-md-12 mb-3">
                                    <h6>Conocimientos</h6>
                                    <blockquote id="BlockConocimientos">
                                        {{ auth()->user()->conocimientos == null ? 'Actualiza tu información' : auth()->user()->conocimientos }}
                                    </blockquote>
                                    <textarea class="form-control mb-2" id="TxtConocimientos" rows="3"></textarea>
                                    <div class="col-md-12 mb-0 ml-0  text-right ">
                                        <button id="BtnEditarCon" onclick="javascript:mostrar_conocimientos();" type="button " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                                        <button id="BtnGuardarCon" onclick="javascript:ocultar_conocimientos();" type="button " class=" form-inline icon btn btn-primary ">Guardar</button>
                                    </div>
                                    <hr class="ml-3 mr-3">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <h6>Habilidades (Tags)</h6>
                                    <div class="tags text-uppercase text-secondary">
{{--                                        <span id="tag" class="px-2  border rounded ">prueba</span>--}}
                                        @if($rTags->count() != 0)
                                        @foreach($rTags as $tag)
                                            <span id="tag" class="px-2  border rounded ">{{ $tag->tag->nombre }}</span>
                                        @endforeach
                                        @else
                                            Actualiza tu información
                                        @endif
                                    </div>
                                    <div class="col-md-12 mb-0 ml-0  text-right">
                                        <button type="button " onclick="javascript:mostrar_habilidades();" class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/plus.png')}}">Agregar</button>
                                    </div>
                                    <hr class="ml-3 mr-3">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <h6>Curriculum</h6>
                                    <div class="row mr-4 ml-4">

                                        <div class="col-md-12 mb-3 pl-0">
                                            <span><img src="{{asset('images/icon/file.png')}}"><a href="#">mi-curriculum.pdf</a>
                                                <button type="button" class="btn btn-remove pt-0 ml-0 btn-outline-light"><img class="mt-0"src="{{asset('images/icon/remove.png')}}"></button>
                                            </span>
                                        </div>
                                        <div class="col-md-12 ml-0 pl-0 mb-3">
                                            <button type="file " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/upload.png')}}">Subir</button>
                                        </div>
                                  </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- -->
            </div>
        </main>

@endsection
