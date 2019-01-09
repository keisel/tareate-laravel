
@extends('layouts.master')
@section('title','Contacto')
@section('banner','id="bannerContacto"')
@section('content')

<div class="banner-content" >
  <div class="container">
    <div class="banner-form" >
      <div class="text-center">

        <div class="row">
          <div class="col-lg-12 "  >
          @include('layouts.messages')  
            <div id="margen">
              <h2 class="section-heading" >CONTACTO</h2>
              <h3 class="section-subheading text-muted " id="colorSubtitulo">Escribe tus dudas, preguntas o sugerencias.</h3>
            </div>
          </div>  
        </div>

        <div class="row">           
          <section id="contact">
            <div class="container">  
              <div class="row">
                <div  class="col-lg-6 col-md-6  col-sm-6 col-lg-offset-1 col-sm-offset-1 col-md-offset-1">
                {!!Form::open(['route'=>'mail.store','method'=>'POST'])!!}
            
                    <div class="form-group" >
                      <input type="text" class="form-control borde " placeholder="Tu nombre y apellido *" id="name" name="nombre" required>
                      <p class="help-block text-danger"></p>
                    </div>

                    <div class="form-group">
                      <input  type="email" class="form-control borde" name="email"  placeholder="Tu Email *" id="email"  required>
                      <p class="help-block text-danger"></p>
                    </div>

                    <div class="form-group">
                      <textarea class="form-control borde" placeholder="Tu Mensaje" name="mensaje"  id="message" required rows="4"></textarea>
                      <p class="help-block text-danger"></p>
                    </div> 
                    <div class="row">
          <div class="col-xs-12 " >
            <div id="margenbotonContacto">
              <center> <button  type="submit" class="btn btn-success boton btn-lg"><span  class="fa fa-envelope-o" aria-hidden="true"></span> Enviar Mensaje</button></center>  
            </div>
          </div>
        </div> 
                    {!!Form::close()!!}    
                </div>

                <div  class="col-lg-4 col-md-4  col-sm-4">
                  <div id="bajarCuadro">
                    <div id="redes">
                      <h3 class="section-heading"> Redes Sociales </h3>
                      <ul class="list-inline quicklinks">
                        <li ><a  href="#" ><i class="fa fa-facebook" ></i></a></li>
                        <li><a  href="#"><i class="fa fa-twitter "></i> </a></li>
                        <li><a  href="#"><i class="fa fa-instagram "></i></a></li>
                      </ul>
                      <h3>  Soporte</h3>
                      <strong> <p> 24 horas, los 7 días de la semana.</p></strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>

        
       
      </div>
    </div>      
  </div>
</div>
@endsection
@section('script') 
<script>
$(document).ready(function(){
 $('.alert').delay(3000).hide(400); 
});
</script>
@endsection