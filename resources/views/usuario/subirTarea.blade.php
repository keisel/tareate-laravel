  @extends('layouts.master')
  @section('title','Compartir Tarea')
  @section('banner','id="bannerPreguntas"')
  @section('content') 

  <div class="container-fluid" id="fondoHistorial">
    <div class="row" id="bajarHistorial">
      <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        <div class="banner-formHistorial" >
         @include('layouts.messages')  
         <div class="form-body">
          <div id="margenHistorial">
            <div class="row">
              <div class=" col-lg-offset-1 col-lg-6 " >          
               <center><h2>COMPARTIR TAREAS</h2></center> 
             </div>
           </div>
         </div>            

         <div class="row">
          <div class="col-lg-6 col-lg-offset-1" id="fondopregunta" >
            <div id="margenpregunta">
              
              {!!Form::open(['route'=>'compartir.store','method'=>'POST','files'=> true])!!}
              {{ csrf_field() }}

              
              <label class="control-label" for="formGroup" id="colorpreguntas">Título de tu Tarea</label>

              

              <input type="text" class="form-control " placeholder="Título*" id="titulo" name="titulo" required>

              
              <label class="control-label" for="formGroup" id="colorpreguntas">Nombre de la asignatura</label>

              <input type="text" class="form-control " placeholder="Materia*" id="titulo" name="categoria" required>


              <div id="formProfile" class="control-label" for="formGroup">            
               <strong><p>Adjunta tu tarea en un Archivo en Word, PDF donde se pueda ver detalladamente </p></strong>
               
             </div>
             
             <input type="file" name="path" required /> 
             <div id="margenHistorial">
              <center><button  type="submit" class="boton btn btn-success btn-block btn-lg margenPerfil">Subir Tarea</button></center> 
            </div>    
            {!!Form::close()!!}      
            
          </div>
        </div> 
        <div  class="col-lg-4 ">
          <div id="bajarCuadro">
            <div id="payments">  

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

  </div>
</div>
</div>
</div>
</div>
@endsection
@section('script') 
<script>
$(document).ready(function(){
 $('#alert').delay(2500).hide(400); 
});
</script>
@endsection