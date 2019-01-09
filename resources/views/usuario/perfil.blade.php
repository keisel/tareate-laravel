  @extends('layouts.master')
  @section('title','Perfil')
  @section('banner','id="bannerPreguntas"')
  @section('content') 
  <div class="container-fluid " id="fondoFrecuente" >
    <div class="row" id="bajarCuadro">
     <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 " >

       <ul class="nav nav-tabs nav-justified ">
        <li class="active" id="margenPregunta"><a  href="#home" role="tab" data-toggle="tab"> <span class="glyphicon glyphicon-open"></span> Subir Tarea</a></li>    

        <li id="margenPregunta"><a  href="#TareaSubida" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-open-file" ></span> Tareas Subidas</a></li>

        <li id="margenPregunta"><a  href="#culminadas" role="tab" data-toggle="tab"><span  class="glyphicon glyphicon-envelope"></span> Tareas Culminadas</a></li>

        <li  id="margenPregunta"><a href="#perfil" role="tab" data-toggle="tab"><span  class="glyphicon glyphicon-user"></span> Perfil</a></li>


      </ul>
      <div class="tab-content ">
      @include('layouts.messages') 
        <div class="tab-pane fade in active" id="home">  

          <div class="col-lg-6 ">
            {!!Form::open(['route'=>'tarea.store','method'=>'POST','files'=> true])!!}
            {{ csrf_field() }}

            <label class="control-label" for="formGroup" id="colorpreguntas">Título de tu Tarea</label>

            <input type="text" class="form-control " placeholder="Título*" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
                
             

            <label class="control-label" for="formGroup" id="colorpreguntas">Descripción</label>
            <textarea class="form-control " placeholder="Se lo mas específico que puedas, describe las preguntas de la tarea, el numero de paginas etc." id="descripcion" name="descripcion" value="{{ old('descripcion')}}" required rows="5"></textarea>

            <label class="control-label" for="formGroup" id="colorpreguntas">Categoría</label>
            
            {!! Form::select('categoria',$categoria,null,['id'=>'categoria','class'=>'form-control','required','value'=>'old(categoria)','required']) !!}

            <label class="control-label" for="formGroup" id="colorpreguntas">Fecha de Entrega</label>
            <input type="text" class="form-control datepicker" name="fechaEntrega" placeholder="Ingrese fecha de entrega" value="{{ old('fechaEntrega') }}" required>

            <div id="formProfile" class="control-label" for="formGroup">            
             <strong><p>Si tienes un archivo en Word, un PDF u otro documento que explique detalladamente tu tarea puedes subirlo aqui. </p></strong>

           </div>
          <input type="file" name="path"/> 
           <center><button  type="submit" class="boton btn btn-success btn-block btn-lg margenPerfil">Subir Tarea</button></center>	
           {!!Form::close()!!}      
         </div>
         <div class="clearfix visible-xs"></div>
         <div class="col-lg-4 col-lg-offset-1">
          <div id="bajarCuadro">
            <div id="payments">            
             <strong><p>Evaluaremos tu tarea y te indicaremos el precio a través de tu correo electronico </p></strong>
             <strong><p>Y</p></strong>
             <strong><p>A través de la seccion "Tareas subidas"</p></strong>

             <p>Puedes comunicarte con nosotros por nuestras redes sociales</p>
             <h3 class="section-heading"> Redes Sociales </h3>
             <div id="redes">

              <ul class="list-inline quicklinks">
                <li ><a  href="#" ><i class="fa fa-facebook" ></i></a></li>
                <li><a  href="#"><i class="fa fa-twitter "></i> </a></li>
                <li><a  href="#"><i class="fa fa-instagram "></i></a></li>
              </ul>

            </div>
            <h3>  Soporte</h3>
            <strong> <p> 24 horas, los 7 días de la semana.</p></strong>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade " id="TareaSubida">
      <div class="container-fluid" >
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
      <div class="col-lg-6 col-lg-offset-1 ">
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
          <input class="form-control" type="password" id="password" name="password" placeholder="Contraseña" required> 
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4  control-label" for="formGroup">Repetir Contraseña Nueva </label>
        <div class="col-sm-8 ">
          <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Repetir Contraseña" required> 
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
  </div>
  </div>      	
  </div>    
  </div>
  @endsection
  @section('script') 
  <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
  <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
  <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
  <script> 
    $(document).ready(function(){
      tareas();
       $('.alert-dismissable').delay(2500).hide(400);  
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

    $('.datepicker').datepicker({
      format: "yyyy/mm/dd",
      maxViewMode: 0,
      todayBtn: "linked",
      language: "es", 
      todayHighlight: true,  
      autoclose:true,
    });
  </script>
  @endsection
