  @extends('layouts.master')
  @section('title','Olvido Contraseña')
  @section('banner','id="iniciarSesion"')
  @section('content')

  <div class="banner-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="banner-form" id="bajarInicio">
            <div class="form-title">
              <h2>Resetear contraseña</h2>
            </div>

            @include('layouts.messages')  
            @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
            @endif 
            {!!Form::open(['route'=>'reset-email','method'=>'POST'])!!}
            {{ csrf_field() }}
            

            <div class="form-body text-center">

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control borde" name="email" value="{{ old('email') }}" placeholder="Correo electronico" >
                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif           
              </div>
              
              
              <button type="submit" class="boton btn-lg btn-success btn-block">
               Enviar link de cambio
             </button>
             
           </div>
           {!!Form::close()!!} 

         </div>
       </div>
     </div>
   </div>
 </div>
 @endsection
