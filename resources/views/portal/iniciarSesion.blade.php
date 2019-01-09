
@extends('layouts.master')
@section('title','Iniciar Sesion')
@section('banner','id="iniciarSesion"')
@section('content')

<div class="banner-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="banner-form" >
          <div class="form-title">
            <h2>INICIO DE SESIÓN</h2>
          </div>

          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            @include('layouts.messages') 
            <div class="form-body text-center">

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control borde" name="email" value="{{ old('email') }}" placeholder="Correo electronico" required>
                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif    
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control borde" name="password" placeholder="Contraseña" required>

                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif   

              </div>

              <div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember"> Permanezca conectado
                  </label>
                </div> 
              </div>

              <center><button class="btn btn-lg btn-success btn-block boton" type="submit">Entrar</button></center>

              <div class="checkbox">
                <center><p class="help-block"><a href="{{ url('/password/reset') }}"><strong>¿Olvidaste tu contraseña?</strong></a></p></center>
              </div>

              <div class="checkbox">
                <center><p class="help-block"><a href="nuevo-usuario"><strong>Crear Usuario</strong></a></p></center>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection