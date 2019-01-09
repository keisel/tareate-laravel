<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Models\Descarga;
use App\Http\Requests\BuscarTareaRequest;
use Session;
class VistaController extends Controller
{
     public function historial(){
        $tareas=Descarga::
                select('descarga.titulo','descarga.path','categoria.nombre as categoria','descarga.id')->orderBy('created_at')->join('categoria','categoria.id_categoria','=','descarga.categoria')->paginate(7);
       return view('usuario/historialAjax',compact('tareas'));  
    }



 public function buscarTarea(BuscarTareaRequest $request)
    {
        $nombre=$request->nombre;    
        $tareas=Descarga::
                     select('descarga.titulo','descarga.path','categoria.nombre as categoria','descarga.id')->join('categoria','categoria.id_categoria','=','descarga.categoria')->where('descarga.titulo','Like','%'.$nombre.'%')->orderBy('created_at')->paginate(7);
        
        if(count($tareas) > 0)
        return view('usuario/historialAjax',compact('tareas'));  
        else{
            Session::flash('delete','No se encontraron resultados');
             return redirect()->action('VistaController@historial');
        }
        
    }
    public function historialTareas(){
    	return view('usuario/historialTareas');
    }
    public function quienesSomos(){

    	return view('portal/quienesSomos');
    }
    public function terminosCondiciones(){

    	return view('portal/terminosCondiciones');
    }
    public function avisoPrivacidad(){

    	return view('portal/avisoPrivacidad');
    }
    public function inicio(){

    	return view('portal/inicio');
    }
     public function IniciarSesion(){

    	return view('portal/iniciarSesion');
    }
    public function nuevoUsuario(){

    	return view('usuario/nuevoUsuario');
    }
    public function preguntasFrecuentes(){

    	return view('portal/preguntasFrecuentes');
    }
    public function contacto(){

    	return view('portal/contacto');
    }
    
    

}
