@include('layouts.messages')  
<div class="table-responsive">
  <div id="height">
  <table class="table table-fixed">             
    <thead id="textColor">                
        <th class="col-xs-5">TÍTULO</th>
        <th class="col-xs-3">CATEGORIA</th>
         <th class="col-xs-2 center">CONTENIDO</th>
        <th class="col-xs-2 center">DESCARGAR</th>        
    </thead>        
    @foreach($tareas as $tarea) 
    <tbody id="margenPregunta">
    <td class="col-xs-5">{{$tarea->titulo}}</td>  
      <td class="col-xs-3">{{$tarea->categoria}}</td> 
      <td class="col-xs-2 center">{!!link_to_route('vista-previa',$title='Ver',$parameters=$tarea->id,$attributes=['class'=>' btn btn-info'])!!} </td> 
      <td class="col-xs-2 center">
        {!!link_to_route('donwload-file',$title='',$parameters=$tarea->path,$attributes=['class'=>'btn btn-download fa fa-download fa-2x'])!!}  
      </td>
    </tbody>  
    @endforeach
  </table>
  </div>
</div>
<div class="text-center">
  {!!$tareas->links()!!}
</div>
