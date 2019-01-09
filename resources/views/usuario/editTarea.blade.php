  @extends('layouts.master')
  @section('title','Historial de Tareas')
  @section('banner','id="bannerPreguntas"')
  @section('content') 


  @include('layouts.messages') 

  <div class="container-fluid" id="fondoFrecuente" >
    <div class="row" id="bajarCuadro">
     <div class="col-lg-10 col-md-8 col-md-offset-1 col-sm-9 col-xs-12" >

       <ul class="nav nav-tabs nav-justified ">
        <li  id="margenPregunta"><a  href="#home" role="tab" data-toggle="tab"> <span class="glyphicon glyphicon-open"></span> Subir Tarea</a></li>    

        <li id="margenPregunta"><a  href="#TareaSubida" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-open-file" ></span> Tareas Subidas</a></li>

        <li class="active" id="margenPregunta"><a href="#editar" role="tab" data-toggle="tab"><span  class="glyphicon glyphicon-edit"></span> Editar Tarea</a></li>

        <li id="margenPregunta"><a  href="#culminadas" role="tab" data-toggle="tab"><span  class="glyphicon glyphicon-envelope"></span> Tareas culminadas</a></li>

        <li  id="margenPregunta"><a href="#perfil" role="tab" data-toggle="tab"><span  class="glyphicon glyphicon-user"></span> Perfil</a></li>


      </ul>

      <div class="tab-content ">
        <div class="tab-pane fade " id="home">  

          <div class="col-lg-6 col-xs-12 ">
            {!!Form::open(['route'=>'tarea.store','method'=>'POST','files'=> true])!!}
            {{ csrf_field() }}

            <label class="control-label" for="formGroup" id="colorpreguntas">Título de tu Tarea</label>



            <input type="text" class="form-control " placeholder="Título*" id="titulo" name="titulo" required>



            <label class="control-label" for="formGroup" id="colorpreguntas">Descripción</label>
            <textarea class="form-control " placeholder="Se lo mas específico que puedas, describe las preguntas de la tarea, el numero de paginas etc." id="descripcion" name="descripcion" required rows="3"></textarea>

            <label class="control-label" for="formGroup" id="colorpreguntas">Categoría</label>

            {!! Form::select('categoria',$categoria,null,['id'=>'categoria','class'=>'form-control']) !!}

            <label class="control-label" for="formGroup" id="colorpreguntas">Fecha de Entrega</label>
            <input type='date' class="form-control" name="fechaEntrega" required/>

            <label class="control-label" for="formGroup" id="colorpreguntas">Si tienes un archivo en Word, un PDF u otro documento que explique detalladamente tu tarea puedes subirlo aqui. </label>  
            <input type="file" name="path"/> 

            <center><button  type="submit" class="btn btn-success btn-block btn-lg margenPerfil"><span  class="fa fa-upload" aria-hidden="true"></span> Subir Tarea</button></center>	
            {!!Form::close()!!}      
          </div>
          <div class="clearfix visible-xs"></div>
          <div class="col-lg-4 col-lg-offset-1">
            <div id="payments">            
             <p>Evaluaremos tu tarea y te indicaremos el precio a través de tu correo electronico</p>

           </div>
         </div>

       </div>

       <div class="tab-pane fade " id="TareaSubida">
        <div class="container" id="vistaPrevia">
          <div id="list-tareas">

          </div>


        </div>
      </div>

      <div class="tab-pane fade" id="culminadas">
       <div class="container" id="vistaPrevia">
        <div id="list-tareas">

        </div>
      </div>
    </div>


    <div class="tab-pane fade" id="perfil">
     <div class="container-fluid" id="bajarCuadro">
      <div class="row">
        <div class="col-lg-5 col-lg-offset-1 ">
          <h3 > HOLA, {{ Auth::user()->name }}!!</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-lg-offset-1">
          <div class="form-horizontal" id="UsuarioNuevo">       

           {!!Form::model($usuario,['route'=>['usuario.update',$usuario->id],'method'=>'PUT'])!!}

           <div class="form-group">
            <label class="col-sm-4  control-label" for="formGroup">Nombre y Apellido</label>
            <div class="col-sm-8 ">
              {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'tu nombre*','required'])!!}
              
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-4  control-label" for="formGroup" id="margenCampoPerfil">Correo electronico</label>
            <div class="input-group col-sm-7">
             <span class="input-group-addon">@</span>
             {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'tu correo*','required'])!!} 
           </div>
         </div>

         <div class="form-group">
          <label class="col-sm-4  control-label" for="formGroup" id="margenCampoPerfil">Telefono</label>
          <div class="input-group col-sm-7 ">
           <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
           {!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'tu telefono*','required'])!!}        
         </div>
         <span class="help-block col-sm-8 col-lg-offset-4">Ingresa el numero con el codigo de tu país. Ejemplo:+58...</span>
       </div>


       <div class="form-group">
        <label class="col-sm-4  control-label" for="formGroup" >Preferencia de pago</label>
        <div class=" col-sm-8 ">

          <select name= "pago"  >
            @if(($usuario->pago)=='')
            <option value="">Seleccione un metodo de pago</option> @else
            <option value="{{$usuario->pago}}">{{$usuario->pago}}</option>
            @endif

            @if(($usuario->pago)!='paypal')
            <option value='paypal'>Paypal</option>
            @endif
            @if(($usuario->pago)!='bsf')
            <option value='bsf'>Bolivares Fuertes</option>
            @endif
            @if(($usuario->pago)!='bitcoin')
            <option value='bitcoin'>Bitcoin</option>
            @endif
          </select>
        </div>  
      </div>

      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-4">
          <center><button type="submit" class="btn btn-success ">Actualizar</button> </center>
        </div>
      </div>

      {!!Form::close()!!}  
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-lg-offset-1">
    <div class="form-horizontal" id="UsuarioNuevo">  
     {!!Form::model($usuario,['route'=>['cambiarPassword',$usuario->id],'method'=>'POST'])!!}
     {{ csrf_field() }}

     <div class="form-group">


      <div class="col-sm-8 col-sm-offset-4">
        <center><label for="formGroup">Cambiar Contraseña</label> </center>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-4  control-label" for="formGroup">Contraseña Nueva</label>
      <div class="col-sm-8 ">
        <input class="form-control" type="password" id="password" name="password" placeholder="Contraseña"> 
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-4  control-label" for="formGroup">Repetir Contraseña Nueva </label>
      <div class="col-sm-8 ">
        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Repetir Contraseña"> 
      </div>
    </div>



    <div class="form-group">
      <div class="col-sm-8 col-sm-offset-4">
        <center><button type="submit" class="btn btn-success "> Cambiar</button> </center>
      </div>
    </div>
    {!!Form::close()!!}       
  </div>
</div>
</div>



</div>
</div>
<div class="tab-pane fade in active" id="editar">  

  <div class="col-lg-6 col-xs-12 ">
    {!!Form::model($tareaEdit,['route'=>['tarea.update',$tareaEdit->id],'method'=>'PUT','files'=> true])!!}


    <label class="control-label" for="formGroup" id="colorpreguntas">Título de tu Tarea</label>


    {!!Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Título*','required'])!!}

    <label class="control-label" for="formGroup" id="colorpreguntas">Descripción</label>

    {!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Se lo mas específico que puedas, describe las preguntas de la tarea, el numero de paginas etc.*','required','rows'=>'3'])!!}

    <label class="control-label" for="formGroup" id="colorpreguntas">Categoría</label>

    {!! Form::select('categoria',$categoria,null,['id'=>'categoria','class'=>'form-control']) !!}

    <label class="control-label" for="formGroup" id="colorpreguntas">Fecha de Entrega</label>

    {!!Form::date('fechaEntrega',null,['class'=>'form-control','placeholder'=>'fechaEntrega*','required'])!!}

    <label class="control-label" for="formGroup" id="colorpreguntas">Si tienes un archivo en Word, un PDF u otro documento que explique detalladamente tu tarea puedes subirlo aqui. </label>  
    <input type="file" name="path"/> 

    <center><button  type="submit" class="btn btn-success btn-block btn-lg margenPerfil"><span  class="fa fa-upload" aria-hidden="true"></span> Actualizar Tarea</button></center> 
    {!!Form::close()!!}  

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



  var tareas = function()
  {
    $.ajax({
      type:'get',
      url:'{{url('listall')}}',
      success: function(data){

        $('#list-tareas').empty().html(data);
      }
    });

  }

</script>
@endsection
