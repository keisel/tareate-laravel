@extends('layouts.master')
@section('title','Vista Previa')
@section('banner','id="bannerPreguntas"')
@section('content') 
<div class="container-fluid" id="fondoVistaPrevia">
  <div class="row" id="bajarHistorial">
    <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12">
      <div class="banner-formHistorial" > 
        <div class="container-fluid"  id="margenVerde"> 
          <div id="margenHistorial">
            <div class="row" >  
              <div class=" col-lg-12 center" >          
                <h2>VISTA PREVIA</h2>
              </div>  
            </div>
          </div>
        </div>
      <div class="row margenPdf">
        <div class="col-lg-8" id="fondopregunta" >
          <iframe scrolling="yes" width="720" height="500" src="http://localhost:8000/view-File/{{$tarea->path}}"></iframe>
        </div>
        <div class=" col-lg-3 col-sm-12 col-md-12">
          <div id="payments">            
            <p>Puedes descargar la tarea completa a través del siguiente enlace</p>
            <p>{!!link_to_route('donwload-file',$title='',$parameters=$tarea->path,$attributes=['class'=>'btn btn-download fa fa-download fa-2x','aria-hidden'=>'true'])!!}</p> 
            <strong><p>Recuerda visitar nuestras redes sociales</p></strong>
            
            <div id="redes">        
                  <ul class="list-inline quicklinks">
                    <li ><a  href="#" ><i class="fa fa-facebook" ></i></a></li>
                    <li><a  href="#"><i class="fa fa-twitter "></i> </a></li>
                    <li><a  href="#"><i class="fa fa-instagram "></i></a></li>
                  </ul> 
                </div>
                <h3> Soporte</h3>
                  <strong> <p> 24 horas, los 7 días de la semana.</p></strong>
          </div>
        </div>    
      </div>                              
    </div>
  </div>
</div> 
</div>
@endsection

