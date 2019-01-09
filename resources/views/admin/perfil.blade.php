@extends('layouts.master')
@section('title','Preguntas frecuentes')
@section('banner','id="bannerPreguntas"')
@section('content') 

<div class="container-fluid" id="fondoFrecuente">

   <div class="row">
    <div class="col-lg-12 "  >

    
      <div id="margen">
        <h2 class="section-heading" >Usuarios</h2>
      </div>
    </div>  
    </div>
	<div class="row ">
		<div class="col-lg-12">
			<div class="table-responsive">
  <div id="height">
  <table class="table table-fixed">             
    <thead id="textColor">                
        <th >id</th>
        <th >name</th>
         <th >email</th>
        <th class="center">telefono</th>
        <th class="center">pago</th>
        <th class="center">descargas</th> 
    </thead>        
    @foreach($usuario as $usuarios) 
    <tbody id="margenPregunta">
    <td >{{$usuarios->id}}</td> 
    <td >{{$usuarios->name}}</td>  
      <td >{{$usuarios->email}}</td> 
      <td class="center">{{$usuarios->telefono}}</td> 
      <td class="center">{{$usuarios->pago}}</td> 
      <td class="center">{{$usuarios->descargas}}</td>
  
    </tbody>  
    @endforeach
  </table>
  </div>
</div>
		</div>
	</div>
 <div class="row">
    <div class="col-lg-12 "  >

    
      <div id="margen">
        <h2 class="section-heading" >Tareas</h2>
      </div>
    </div>  
    </div>
	<div class="row ">
		<div class="col-lg-12">
			<div class="table-responsive">
  <div id="height">
  <table class="table table-fixed">             
    <thead id="textColor">                
        <th >id</th>
        <th >idUsuario</th>
         <th >titulo</th>
        <th class="center">descripcion</th>
        <th class="center">categoria</th>
        <th class="center">fechaEntrega</th>
        <th class="center">path</th>  
    </thead>        
    @foreach($tarea as $tareas) 
    <tbody id="margenPregunta">
    <td >{{$tareas->id}}</td> 
    <td >{{$tareas->idUsuario}}</td>  
      <td class="center">{{$tareas->titulo}}</td> 
      <td class="center">{{$tareas->descripcion}}</td> 
      <td class="center">{{$tareas->categoria}}</td> 
      <td class="center">{{$tareas->fechaEntrega}}</td>
  		@if(empty($tareas->path))   
          <td class="center">No hay archivo adjunto</td>
          @else    
            <td class="center">
              {!!link_to_route('donwload-tarea',$title='',$parameters=$tareas->path,$attributes=['class'=>'btn btn-download fa fa-download fa-2x'])!!}   
            </td>
          @endif
    </tbody>  
    @endforeach
  </table>
  </div>
</div>
		</div>
	</div>
 <div class="row">
    <div class="col-lg-12 "  >

    
      <div id="margen">
        <h2 class="section-heading" >Compartir</h2>
      </div>
    </div>  
    </div>
	<div class="row ">
		<div class="col-lg-12">
			<div class="table-responsive">
  <div id="height">
  <table class="table table-fixed">             
    <thead id="textColor">                
        <th >id</th>
        <th >titulo</th>
         <th >categoria</th>
        <th class="center">path</th>
    </thead>        
    @foreach($subidas as $subida) 
    <tbody id="margenPregunta">
    <td >{{$subida->id}}</td> 
    <td >{{$subida->titulo}}</td>  
      <td >{{$subida->categoria}}</td> 
      <td class="center"> {!!link_to_route('donwload-file',$title='',$parameters=$subida->path,$attributes=['class'=>'btn btn-download fa fa-download fa-2x'])!!}</td> 
  
    </tbody>  
    @endforeach
  </table>
  </div>
</div>
		</div>
	</div>

</div>

@endsection