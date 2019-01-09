<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="/logoprincipal/logo4.png" sizes="196x196">
  {!!Html::style('css/bootstrap.css')!!}
  {!!Html::style('estilos.css')!!}
  {!!Html::style('font-awesome-4.7.0/css/font-awesome.css')!!} 
  
</head>

<body data-spy="scroll" @yield('banner') data-target=".navigation"> 
  <div id="header">
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand text-logo hidden-xs hidden-sm md-light-logo" href="/" id="subirlogo">{{HTML::image('logoprincipal/fondogrissingular.png')}}</a>

          <a class="navbar-brand text-logo visible-sm" href="/" id="subirlogo">{{HTML::image('logoprincipal/logoblancop.png','img-responsive')}}</a>

          <a class="navbar-brand text-logo visible-xs" href="/">{{HTML::image('logoprincipal/logoblancop.png','img-responsive')}}</a>

        </div>

        <div class="navigation navbar-collapse collapse">
          <ul class="nav navbar-nav menu-right">
            <li><a href="/"><strong> INICIO</strong></a></li>
            <li><a href="/historial-tareas">HISTORIAL DE TAREAS</a></li>
            <li><a href="/preguntas-frecuentes">PREGUNTAS FRECUENTES</a></li>
            @if (Auth::guest())
            <li><a href="/Iniciar-sesion" onclick="javascript:ga('send', 'event', 'header-portal-btn', 'click');" class="btn btn-default btn-success boton">Inicio de Sesión</a></li>
            @else
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
               @if ((Auth::user()->tipo)=='user')
               <li><a href="{{ url('/home') }}"><i class="fa fa-btn fa-sign-out"></i> Mi perfil</a></li>
               @else
               <li><a href="{{ url('/administra') }}"><i class="fa fa-btn fa-sign-out"></i> Mi perfil</a></li>
               @endif
               <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Cerrar sesión</a></li>

             </ul>
           </li>
           @endif
         </ul>
       </div>
     </div>
   </nav>
 </div>

 @yield('content')
 
 <footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4" id="fondopiedepagina">
        <ul class="list-inline quicklinks">
          <li><a id="coloritem" href="/quienes-somos">¿Quiénes somos?</a></li>
          <li><a id="coloritem" href="/contacto">Contáctanos</a></li>
        </ul>
      </div>
      <div class="col-md-4" id="fondopiedepagina">
        <ul class="list-inline quicklinks social">
          <li > <a href="#"> <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i> </a> </li>
          <li > <a href="#"> <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a> </li>
        </ul>
      </div>
      <div class="col-md-4" id="fondopiedepagina">
        <ul class="list-inline quicklinks">
          <li><a id="coloritem" href="/aviso-de-privacidad">Aviso de privacidad</a></li>
          <li><a id="coloritem" href="/terminos-y-condiciones">Terminos y condiciones</a></li>
        </ul>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-12" id="fondopiepagina">
        <ul class="list-inline quicklinks">
          <li><a id="coloritem" href="#">{{HTML::image('logoprincipal/fondogrissingularp.png')}}</a></li>
        </ul>
      </div>

      <div class="col-md-12" id="fondoultimo">
        <ul class="list-inline quicklinks">
          <h6 id="derecho">COPYRIGHT 2017 | TODOS LOS DERECHOS RESERVADOS</h6>
        </ul>
      </div>  
    </div>    
  </div>
</footer>
{!!Html::script('js/jquery-3.1.1.min.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
@yield('script')
</body>
</html>