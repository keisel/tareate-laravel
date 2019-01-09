  @include('layouts.messages')  
  <div class="table-responsive">
    <div id="height">
      <table class="table table-fixed">             
        <thead id="textColor">                
          <th >TÍTULO</th>
          <th >DESCRIPCIÓN</th>
          <th >CATEGORÍA</th>
          <th class="center">ARCHIVO</th>
          <th class="center">EDITAR</th>
          <th class="center">ENTREGA</th> 
          <th class="center">ESTADO</th>
          <th class="center">PRECIO</th>      
        </thead>        
        @foreach($tareas as $tarea) 
        <tbody id="margenPregunta">
          <td >{{$tarea->titulo}}</td> 
          <td >{{$tarea->descripcion}}</td>  
          <td >{{$tarea->categoria}}</td> 
          @if(empty($tarea->path))   
          <td class="center">No hay archivo adjunto</td>
          @else    
          <td class="center">
            {!!link_to_route('donwload-tarea',$title='',$parameters=$tarea->path,$attributes=['class'=>'btn btn-download fa fa-download fa-2x'])!!}   
          </td>
          @endif
          <td class="center"><a href="{{ route('tarea.edit',$tarea->id)}}" >[ Editar ] </a>  
          </td>
          <td class="center">{{$tarea->fecha->diffForHumans() }}</td>
          <td class="center">{{$tarea->estado }}</td>
          <td class="center">{{$tarea->precio }}</td>
        </tbody>  
        @endforeach
      </table>
    </div>
  </div>
  <div class="text-center">
    {!!$tareas->links()!!}
  </div>


