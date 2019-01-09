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

<body> 
  <p> Nombre: {!!$nombre!!}</p>
    <p> Correo: {!!$email!!}</p>
      <p> Mensaje: {!!$mensaje!!}</p>
</body>
</html>