@extends('layouts.master')
@section('title','Hacemos Tareas')
@section('banner','id="bannerInicio"')
@section('content')


<div class="banner-content" >
  <div class="container">

    <div class="banner-form">
      <div class="text-center">


        <div class="row">
          <div class="col-lg-12 "  >


            <div id="margen">
              <h2 class="section-heading" >¿ PROBLEMAS CON TU TAREA ? </h2>
            </div>
          </div>  
        </div>



        <div class="row">

          <div class="col-lg-2 col-lg-offset-1 ">
            <center > 
              <div id="margenimagen">
                <img href="#" data-placement="top" data-toggle="popover" data-trigger="hover" data-content="Regístrate en nuestra página y sube tu tarea o proyecto."  src="logoultimo/upload.png" class="img-responsive uno">
              </div>
            </center>
            <div id="textopaso">
              <h5>PASO 1</h5>
            </div>
            <div id="textodes">
              <p>Subela</p>
            </div>
          </div>

          <div class="col-lg-2 " >
            <center>
              <div id="margenimagen">
                <img href="#" data-placement="top" data-toggle="popover" data-trigger="hover" data-content="Tenemos profesionales en el área que necesites con quien podrás acordar un precio y realizarán tu tarea."  src="logoultimo/pencil.png" class="img-responsive dos">
              </div>
            </center>

            <div id="textopaso">
              <h5>PASO 2</h5>
            </div>

            <div id="textodes">
              <p>Nosotros la hacemos</p>
            </div>
          </div>

          <div class="col-lg-2 " >
            <center>
              <div id="margenimagen">
                <img  href="#" data-placement="top" data-toggle="popover" data-trigger="hover" data-content="Contarás con un adelanto de tu tarea como garantía de nuestro trabajo."  src="logoultimo/download.png" class="img-responsive tres">
              </div>
            </center>

            <div id="textopaso">
              <h5>PASO 3</h5>
            </div>
            <div id="textodes">
              <p>Te enviamos una parte</p>
            </div>       
          </div>

          <div class="col-lg-2 ">
            <center>
              <div id="margenimagen">
                <img href="#" data-placement="top" data-toggle="popover" data-trigger="hover" data-content="En base a la cotización podrás cancelar a través de distintos métodos de pago." src="logoultimo/dolar.png" class="img-responsive cuatro">
              </div>
            </center>

            <div id="textopaso">
              <h5>PASO 4</h5>
            </div>
            <div id="textodes">
              <p>Pagas</p>
            </div>  
          </div>

          <div class="col-lg-2">
            <center>
              <div id="margenimagen">
                <img href="#" data-placement="top" data-toggle="popover" data-trigger="hover" data-content="Finalmente hacemos entrega de la tarea o proyecto culminado."  src="logoultimo/check.png" class="img-responsive cinco">
              </div>
            </center>
            <div id="textopaso">
              <h5>PASO 5</h5>
            </div>
            <div id="textodes">
              <p>Te enviamos el resto</p>
            </div>  
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 " >
            <div id="margenboton">
              <center><a href="{{ url('/home') }}" target="_blank"> <button  type="button" class="btn btn-success btn-lg boton"><span  class="fa fa-upload" aria-hidden="true" ></span> Subir Tarea</button></a></center>  

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
  $(document).ready(function () {  
    setTimeout(function () {
      $('.uno').popover('show');
    }, 1000);
    setTimeout(function () {
      $('.uno').popover('hide');
    }, 5000);
    setTimeout(function () {
      $('.dos').popover('show');
    }, 5000);
    setTimeout(function () {
      $('.dos').popover('hide');
    }, 9000);
    setTimeout(function () {
      $('.tres').popover('show');
    }, 9000);
    setTimeout(function () {
      $('.tres').popover('hide');
    }, 13000);
    setTimeout(function () {
      $('.cuatro').popover('show');
    }, 13000);
    setTimeout(function () {
      $('.cuatro').popover('hide');
    }, 17000);
    setTimeout(function () {
      $('.cinco').popover('show');
    }, 17000);
    setTimeout(function () {
      $('.cinco').popover('hide');
    }, 20000);
  });

 
</script>
@endsection