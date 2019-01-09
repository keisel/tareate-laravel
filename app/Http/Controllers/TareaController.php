<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use App\Http\Requests\TareaCreateRequest;
use App\Http\Requests\TareaUpdateRequest;

use Session;

class TareaController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
        
    }

    
    public function create()
    {
        //
    }

    
    public function store(TareaCreateRequest $request)
    {
        $estado="Evaluando";
        $precio="Evaluando";
        Tarea::create([
            'titulo' => $request['titulo'],
            'descripcion' => $request['descripcion'],
            'categoria' => $request['categoria'],
            'fechaEntrega' => $request['fechaEntrega'],
            'path' => $request['path'],
            'idUsuario' => Auth::user()->id,
            'estado'=>$estado,
            'precio'=>$precio,

        ]);
        Session::flash('save','Tarea creada correctamente');
        return redirect('/home');
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
         //aqui voy a poner si el id de la tarea es distinto al id del usuario le mando la funcion logout();
    	$tareaEdit=Tarea::Find($id);
        if ($tareaEdit!="" && Auth::user()->id==$tareaEdit->idUsuario){ 
        	$categoria= Categoria::lists('nombre','id_categoria')->prepend('seleccione la categoria');
         	$usuario=Usuario::FindOrFail(Auth::user()->id);
         	return view('usuario.editTarea',compact('categoria','tareaEdit','usuario'));
         }
         else
        return redirect('/home');  
    }

    
    public function update(TareaUpdateRequest $request, $id)
    {
    	$tarea= Tarea::Find($id);
    	if (Auth::user()->id==$tarea->idUsuario){	
        	$input = $request->all();
        	$tarea->fill($input)->save();
       		Session::flash('update','Tarea actualizada correctamente');
         	return redirect('/home'); 
     	}
     	else
     	return redirect('/home');  
    }

   
    public function destroy($id)
    {
         /*$tarea= Tarea::FindOrFail($id);
         $tarea->delete();
         \Storage::delete($tarea->path);
         Session::flash('delete','se ha eliminado correctamente');
         return redirect('/home');*/
    }   

}
