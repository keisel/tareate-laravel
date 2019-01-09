<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Tarea;
use App\Models\Descarga;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\SubirTarea;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        Carbon::setlocale('es');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $categoria= Categoria::lists('nombre','id_categoria')->prepend('seleccione la categoria');
        $usuario=Usuario::FindOrFail(Auth::user()->id);
        return view('usuario/perfil',compact('categoria','usuario'));  
    } 
      public function listall()
    {
         $tareas=Tarea::
                     select('tarea.titulo','tarea.descripcion','tarea.path','tarea.estado','tarea.precio','tarea.fechaEntrega as fecha','categoria.nombre as categoria','tarea.id')->orderBy('fecha')->join('categoria','categoria.id_categoria','=','tarea.categoria')->where('tarea.idUsuario','=',Auth::user()->id)->paginate(5);
       
        return view('usuario/listall',compact('tareas'));  
    }

     public function downloadFile($id){
        if(!$this->download(storage_path().'/tareaSistema/'.$id)){
            return redirect()->back();
        }
        
    }

    public function viewFile($id){
        
        return response()->file(storage_path().'/tareaSistema/'.$id);
    }

    public function downloadTarea($id){
        if(!$this->downloadSistema(storage_path().'/app/public/'.$id)){
            return redirect()->back();
        }
    }
     protected function downloadSistema($src){
        if(is_file($src)){
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $content_type = finfo_file($finfo, $src);
            finfo_close($finfo);
            $file_name = basename($src).PHP_EOL;
            $size = filesize($src);
            header("Content-Type: $content_type");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: $size");
            readfile($src);
            return true;
        } else{
            return false;
        }
    }
      protected function download($src){
        if(is_file($src)){
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $content_type = finfo_file($finfo, $src);
            finfo_close($finfo);
            $file_name = basename($src).PHP_EOL;
            $size = filesize($src);
            header("Content-Type: $content_type");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: $size");
            readfile($src);
            return true;
        } else{
            return false;
        }
    }

     public function vistaPrevia($id)
    {
         
        $tarea=Descarga::FindOrFail($id);
        $usuario=Usuario::FindOrFail(Auth::user()->id);
        $categoria= Categoria::lists('nombre','id_categoria')->prepend('seleccione la categoria');
        return view('usuario.vistaPrevia',compact('tarea','usuario','categoria')); 

    }

     public function admin()
    {
         if (Auth::user()->tipo=="admin") { 
         $usuario=Usuario::
                select('id','name','email','telefono','pago','descargas')->get();

        $tarea=Tarea::
            select('tarea.id','tarea.idUsuario','tarea.titulo','tarea.descripcion','tarea.categoria','tarea.fechaEntrega','tarea.path')->get();

         $subidas=SubirTarea::
            select('id','titulo','categoria','path')->get();

       return view('admin.perfil',compact('tarea','usuario','subidas'));  
        }
         else
        return redirect('/home');       
    }
}
