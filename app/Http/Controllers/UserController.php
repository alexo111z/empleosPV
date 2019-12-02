<?php

namespace App\Http\Controllers;

use App\Area;
use App\NEstudio;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\RelacionTag;
use App\Tag;
class UserController extends Controller
{
    function registrar(){
        $estudios = NEstudio::all();
        $areas = Area::all();
        return view('usuarios.registrar', compact('estudios', 'areas'));
    }
    function perfil(){
      
        $rtags = RelacionTag::where('id_usuario', '=', auth()->user()->id)->get();
        $tags = Tag::all();
        $estudios = NEstudio::all();
        $areas = Area::all();
        $userest=NEstudio::findOrFail(auth()->user()->id_estudios);
        $userarea=Area::findOrFail(auth()->user()->id_area);
        return view('usuarios.perfil',compact('userest','userarea','rtags','tags','estudios', 'areas'));
    }

    //Luis - Sin formato -Eliminar
    function registro(){
        return view('temp.users.registro');
    }

    function crear(Request $request){
        //validate() -> utiliza el 'name' del campo
        $data = $request->validate([
            "email" => ['required', 'email', 'unique:users,email'], //unique:tabla,columna
            "password" => ['required', 'between:1,8', 'same:password2'],
            "password2" => ['required', 'between:1,8'],
            "firstName" => 'required',
            "lastName" => 'required',
            "trip-start" => ['required', 'date_format:Y-m-d'],   //'Y-m-d'  born date
            "sexo" => 'required', //genero
            "estudios" => 'required',
            "area" => 'required',
            //Calcular edad para insercion
        ],[
            'name.required' => 'El campo esta vacio'
        ]);

        $date1 = Carbon::createFromDate($data['trip-start']);
        $ahora = Carbon::now();
        $edad = $date1->diffInYears($ahora);

        User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nombre' => $data['firstName'],
            'apellido' => $data['lastName'],
            'nacimiento' => $data['trip-start'],
            'genero' => $data['sexo'],
            'id_estudios' => $data['estudios'],
            'id_estudios' => $data['area'],
            'edad' => $edad,
        ]);

        return redirect()->route('home');
    }

    function editar($user){
        $data = User::findOrFail($user);
        return view('temp.users.editar', ['user' => $data]);
    }

    function update(Request $request){
        
        $data = $this->validate(request(), [
            'nombre' => 'required', 
            'apellido' => 'required',
        ],[
            'nombre.required' => 'El campo nombre esta vacio, favor de llenarlo correctamente',
            'apellido.required' => 'El campo apellido esta vacio, favor de llenarlo correctamente',
        ]);
        $data = $request->all();
        $user = User::findOrFail(auth()->user()->id);
        $date1 = Carbon::createFromDate($data['nacimiento']);
        $ahora = Carbon::now();
        $edad = $date1->diffInYears($ahora);
        $user->nombre = $data['nombre'];
        $user->apellido = $data['apellido'];
        $user->nacimiento = $data['nacimiento'];
        $user->genero = $data['sexo'];
        $user->edad = $edad;
        /*$user->nacimiento = $data['nacimiento'];
        $user->genero = $data['genero'];
        $user->email = $data['email'];
        $user->id_estudios = $data['estudios'];
        $user->id_area = $data['area'];}*/
        $user->save();
        return back()
        ->withErrors(['error' => 'Por favor introduce tu información correctamente.'])
        ->withInput(request(['error']));
    }
    /*EDITAR y/o AGREGAR */
    public function addConocimientos(){
        $data = request()->all();
        $user = User::findOrFail(auth()->user()->id);
        $user->conocimientos=$data['conocimientos'];
        $user->save();
    }
    public function addNivelyArea(){
        $data = request()->all();
        $user = User::findOrFail(auth()->user()->id);
        $user->id_estudios=$data['nivel'];
        $user->id_area=$data['area'];
        $user->save();
    }
    public function addContacto(){
       $data = request()->all();
        $user = User::findOrFail(auth()->user()->id);
        $user->telefono=$data['telefono'];
        $user->save();
    }
}
