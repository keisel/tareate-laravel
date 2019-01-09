  @extends('layouts.master')
  @section('title','Nuevo Usuario')
  @section('banner','id="bannerContacto"')
  @section('content')

  <div class="banner-content" >
    <div class="container">  
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">     
          <div class="banner-form" >
           <div class="form-title">
            <h2>NUEVO USUARIO</h2>
          </div>
          @include('layouts.messages') 
          <div class="row">
            <div class="col-lg-12">
              <center><h3 class="section-subheading text-muted " id="colorSubtitulo">Ingresa los datos solicitados</h3></center>
            </div>
          </div>  
          
          <form   role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="form-body text-center">
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input id="name" type="text" class="form-control borde" name="name" value="{{ old('name') }}" placeholder="Tu nombre y apellido *" required>
                
                @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif        
              </div>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">               
                <input id="email" type="email" class="form-control borde" name="email" value="{{ old('email') }}" placeholder="Tu Email *" required>
                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div> 

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control borde" name="password" placeholder="Contraseña*" required>
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">   
                <input id="password-confirm" type="password" class="form-control borde" name="password_confirmation" placeholder="Repetir contraseña*" required>
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif   
              </div>  

              <div class="row">
                <div class="col-lg-6 col-lg-offset-3" >
                  <div id="margenbotonContacto">
                   <center> <button  type="submit" class="btn boton btn-success btn-lg">Registrar</button></center>  
                 </div>
               </div>
             </div>       
           </div>                                  
         </form>                   
       </div>
     </div>
   </div>
 </div>
</div>      
@endsection
