<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests;
use App\Http\Requests\UsuarioCreateRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use Session;
use Illuminate\Support\Facades\Auth;
use DB;
class UsuarioController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioCreateRequest $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioCreateRequest $request, $id)
    {
        DB::update("UPDATE users set name=?, email=?,telefono=?,pago=? WHERE id=?",array($request->name,$request->email,$request->telefono,$request->pago,$id)); 

       Session::flash('update',' Datos actualizados correctamente');
         return redirect('/home'); 
    }

    public function cambiarPass(UsuarioUpdateRequest $request, $id)
    {
        if (!Auth::guest() ) {
           
   
          $password=bcrypt($request->password);
         DB::update("UPDATE users set password=? WHERE id=?",array($password,$id)); 

       Session::flash('update','Contraseña actualizada correctamente');
         return redirect('/home'); 
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     


}
