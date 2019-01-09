  @extends('layouts.master')
  @section('title','Historial de Tareas')
  @section('banner','id="bannerPreguntas"')
  @section('content') 

  <div class="container-fluid" id="fondoHistorial">
    <div class="row" id="bajarHistorial">
      <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
        <div class="banner-formHistorial" >     
          <div class="form-body text-center">
            <div id="margenHistorial">
              <div class="row">
                <div class=" col-lg-offset-1 col-lg-10 " >        
                  <h2>HISTORIAL DE TAREAS</h2>
                </div>
              </div>
            </div>            
            <div class="row">
              <a id="boton"></a>
              <div class="col-lg-4 col-lg-offset-8 col-xs-12">
               {!! Form::open(['id'=>'form','onsubmit'=>'return false']) !!}
               <div class="input-group" >
                {!!Form::text('nombre',null,['id'=>'nombre', 'class'=>'form-control','placeholder'=>'Buscar por título','required'])!!}
                <div class="input-group-btn">
                  <button id="buscar" class="btn btn-info" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>    
                </div>
              </div>
              {!!Form::close()!!}
            </div>
          </div>
          <div class="row">
           <div class="  col-lg-12" id="fondopregunta" >
            <div id="margenpregunta">
              <div id="list-tareas" > 
              </div>     
            </div>
          </div>  
        </div>  
        <div class="row">
         <div class="col-lg-12" >
          <div id="textTarea">
            <strong><P>¿ TIENES UNA TAREA QUE QUIERAS COMPARTIR CON OTRAS PERSONAS ?</P> </strong>   
            <a href="/compartir" class="btn btn-default btn-info boton">SUBELA AQUÍ</a>   
          </div>
        </div>  
      </div> 
    </div>
  </div>
</div>
</div>
</div>
@endsection
@section('script') 
<script>
 $(document).ready(function(){
  tareas();
});
 $(document).on("click",".pagination li a",function(e){
  e.preventDefault();
  var url= $(this).attr("href");
  $.ajax({
    type:'get',
    url:url,
    success:function(data){
      $('#list-tareas').empty().html(data); 
    }
  });
});
 var tareas = function(){
  $("#boton").empty();
  $.ajax({
    type:'get',
    url:'{{url('historial')}}',
    success: function(data){
      $('#list-tareas').empty().html(data);
    }
  });
}

$("#buscar").click(function(event)
{       
  $("#boton").empty();
  var nombre = $("#nombre").val();
  var token = $("input[name=_token]").val();
  var route = "{{route('buscar-tarea')}}";
  var dataSting = "nombre="+nombre;
  
  $.ajax({
    url:route,
    headers:{'X-CSRF-TOKEN':token},
    type:'post',
    datatype: 'json',
    data:dataSting,
    success:function(data)
    {
      $('#list-tareas').empty().html(data);
      var button = '<input type="button" id="boton" class="btn btn-success" value="Ver todas" onclick="tareas()"/>';
      $('#boton').append(button);
      $('.alert').delay(2500).hide(400); 
    }
  });
});  
</script>
@endsection