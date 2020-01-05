<?php

namespace App\Http\Controllers;
use \Validator;
use App\Area;
use App\NEstudio;
use App\RelacionTag;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Tag;
use App\Pais;
use App\Estado;
use App\Municipio;
use App\Calificacion;
use App\Comentario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller

{
    public function __construct() {
        $this->middleware('auth',['except' => ['registrar','crear']]);  //comentar para ver admin sin logear
    }

    function registrar(){
        $estudios = NEstudio::all();
        $areas = Area::all();
        return view('usuarios.registrar', compact('estudios', 'areas'));
    }
    function perfil(){

        $paises = Pais::all();
        $estados = Estado::all();
        $municipios = municipio::all();
        $rtags = RelacionTag::where('id_usuario', '=', auth()->user()->id)->get();
        $tags = Tag::all();
        $estudios = NEstudio::all();
        $areas = Area::all();
        $userest=NEstudio::findOrFail(auth()->user()->id_estudios);
        $userarea=Area::findOrFail(auth()->user()->id_area);
        $cal=Calificacion::where('id_usuario', '=', auth()->user()->id)->avg('califi');
        $comentarios= Comentario::join('empresas','empresas.id','=','comentarios.id_emp')
        ->join('calificaciones','calificaciones.id_emp','=','empresas.id')
        ->where('comentarios.id_usuario', '=', auth()->user()->id)
        ->where('calificaciones.id_usuario', '=', auth()->user()->id)
        ->get();
        return view('usuarios.perfil',compact('cal','comentarios','cal','paises','estados','municipios','userest','userarea','rtags','tags','estudios', 'areas'));
    }

    //Luis - Sin formato -Eliminar
    function registro(){
        return view('temp.users.registro');
    }

    function crear(Request $request){
        $validator = Validator::make($request->all(),[
            "email" => 'unique:users,email'
        ]);
        if ($validator->fails()) {
            return back()
            ->withErrors(['erroremail' => 'Ya existe una cuenta registrada con este correo.'])
            ->withInput(request(['erroremail']));
        }else{
            $data= $request->all();
            $date1 = Carbon::createFromDate($data['trip-start']);
            $ahora = Carbon::now();
            $edad = $date1->diffInYears($ahora);
            $alias = substr($data['email'], 0, strpos($data['email'], "@"));
            User::create([
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'nombre' => $data['firstName'],
                'apellido' => $data['lastName'],
                'nacimiento' => $data['trip-start'],
                'genero' => $data['sexo'],
                'id_estudios' => $data['estudios'],
                'id_area' => $data['area'],
                'edad' => $edad,
                'alias' => $alias,
            ]);
                return redirect()->route('usuarios.login');
        }
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
        if($data['pais']!=null && $data['estado']!=null && $data['ciudad']!='null'){
            $user->id_pais= $data['pais'];
            $user->id_estado= $data['estado'];
            $user->id_ciudad= $data['ciudad'];
        }
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
    public function privacidad(){
        $data=request()->all();
        $user = User::findOrFail(auth()->user()->id);
        $user->coment=$data['coment'];
        $user->save();
    }
    public function subirFoto(Request $request){   
        $validator = Validator::make($request->all(),[
            "foto" => " required|mimes:jpg,jpeg,png"
        ]);
        if ($validator->fails()) {
            return back()
            ->withErrors(['errorfoto' => 'La foto de perfil debe ser imagen jpg,jpeg o png.'])
            ->withInput(request(['errorfoto']));
        }else{
            //obtenemos el campo file definido en el formulario
            $file =  $request->file('foto');
            $user = User::findOrFail(auth()->user()->id);
            //obtenemos el nombre del archivo
            $nombre = "FotoPerfil_".auth()->user()->id.".jpg";
            $url="fotos/".$nombre;
            \Storage::disk('public')->delete($user->foto);
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('public')->put($url,\File::get($file));
            $user->foto= $nombre;
            $user->save();
            return redirect('/perfil');
        }
    }
    public function subirCV(Request $request){   
        $validator = Validator::make($request->all(),[
            "archivo" => "required|mimetypes:application/pdf"
        ]);
        if ($validator->fails()) {
            return back()
            ->withErrors(['errorpdf' => 'El curriculum debe ser un archivo PDF.'])
            ->withInput(request(['errorpdf']));
        }else{
            
            //obtenemos el campo file definido en el formulario
            $file =  $request->file('archivo');
            $user = User::findOrFail(auth()->user()->id);
            //obtenemos el nombre del archivo
            $nombre = "CurriculumVitae_".auth()->user()->id.".pdf";
            $url="\curriculums/".$nombre;
            \Storage::disk('public')->delete($user->curriculum);
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('public')->put($url,\File::get($file));
            $user->curriculum= $url;
            $user->save();
            return redirect('/perfil');
        }
    }
    public function borrarCV(){   
       $user = User::findOrFail(auth()->user()->id);
       \Storage::disk('public')->delete($user->curriculum);
        $user->curriculum=null;
        $user->save();
        return redirect('/perfil');
    }
    public function borrarFoto(){
        $user = User::findOrFail(auth()->user()->id);
        \Storage::disk('public')->delete($user->foto);
         $user->foto=null;
         $user->save();
         return redirect('/perfil');
        }
    function editarPersonal(Request $request){
        $data = $request->all();
        $user = User::findOrFail(auth()->user()->id);

        $date1 = Carbon::createFromDate($data['nacimiento']);
        $ahora = Carbon::now();
        $edad = $date1->diffInYears($ahora);
        $user->nacimiento = $data['nacimiento'];
        $user->edad = $edad;
        $user->genero = $data['genero'];
        $user->estado = $data['estado'];
        $user->ciudad = $data['ciudad'];
        $user->pais = $data['pais'];
        $user->save();

        return redirect()->back();
    }
    function editarContacto(Request $request){
        $data = $request->all();
        User::findOrFail(auth()->user()->id)->update($data);
        return redirect()->back();
    }
    function editarAcademica(Request $request){
        $data = $request->all();
        User::findOrFail(auth()->user()->id)->update([
            'id_estudios' => $data['estudios'],
            'id_area' => $data['area'],
        ]);
        return redirect()->back();
    }
    function editarLaboral(Request $request){
        $data = $request->all();
        User::findOrFail(auth()->user()->id)->update([
            'conocimientos' => $data['conocimientos'],
        ]);
        return redirect()->back();
    }
    function editarpassword(Request $request){
        $user = User::findOrFail(auth()->user()->id);
        $data = $request->all();
        if(Hash::check($data['pass'],Auth::user()->password)){
            if($data['pass']==$data['newpassword']){
                return 2;
            }else{
                $user->password = bcrypt($data['newpassword']);
                $user->save();
                return 1;
            }
        }else{
            return 0;
        }
    }
 

}