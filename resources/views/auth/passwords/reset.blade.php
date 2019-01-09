
@extends('layouts.master')
@section('title','Olvido Contraseña')
@section('banner','id="bannerContacto"')
@section('content')

<div class="banner-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
              <div class="banner-form" id="bajarInicio">
                <div class="form-title">
                  <h2>Cambiar contraseñaaaaaaa</h2>
                </div>

              @if (session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                @endif 
     
                <div class="form-body text-center">
 {!!Form::open(['route'=>'reset-password','method'=>'POST'])!!}
          {{ csrf_field() }}
                   <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                                <input id="email" type="email" class="form-control borde" name="email" value="{{ $email or old('email') }}" placeholder="Correo electronico">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                 

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <input id="password" type="password" class="form-control borde" name="password" placeholder="Contraseña">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                <input id="password-confirm" type="password" class="form-control borde" name="password_confirmation" placeholder="Repetir Contraseña">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>

                      
                    <button type="submit" class="boton btn-lg btn-success btn-block">
                       <i class="fa fa-btn fa-refresh"></i> Cambiar contraseña
                    </button>
                      {!!Form::close()!!}                     
                </div>
          

            </div>
          </div>
        </div>
      </div>
    </div>

@endsection