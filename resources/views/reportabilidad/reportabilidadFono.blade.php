
<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Área Social - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles')
  <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{ asset('/css/social/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

<!-- Atributos del body -->
@section('body-attr')
    class='contrast-red'
@endsection

<!-- Inyeccion de scripts
     No importa que vayan antes del body, en el master layout se estan insertando alfinal.
-->
@section('scripts')
    <!-- / jquery [required] -->
    <script src="{{ asset('/assets/javascripts/jquery/jquery.min.js') }}" type="text/javascript"></script>
    <!-- / jquery mobile (for touch events) -->
    <script src="{{ asset('/assets/javascripts/jquery/jquery.mobile.custom.min.js') }}" type="text/javascript"></script>
    <!-- / jquery ui -->
    <script src="{{ asset('/assets/javascripts/jquery/jquery-ui.min.js') }}" type="text/javascript"></script>
    <!-- / jQuery UI Touch Punch -->
    <script src="{{ asset('/assets/javascripts/jquery/jquery.ui.touch-punch.min.js') }}" type="text/javascript"></script>
    <!-- / bootstrap [required] -->
    <script src="{{ asset('/assets/javascripts/bootstrap/bootstrap.js') }}" type="text/javascript"></script>
    <!-- / modernizr -->
    <script src="{{ asset('/assets/javascripts/plugins/modernizr/modernizr.min.js') }}" type="text/javascript"></script>
    <!-- / retina -->
    <script src="{{ asset('/assets/javascripts/plugins/retina/retina.js') }}" type="text/javascript"></script>
    <!-- / theme file [required] -->
    <script src="{{ asset('/assets/javascripts/theme.js') }}" type="text/javascript"></script>
    
    <!-- / START - page related files and scripts [optional] -->
    <script src="{{ asset('/assets/javascripts/plugins/validate/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/validate/additional-methods.js') }}" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->
    <script src="{{ asset('/js/social/loader.js') }}" type="text/javascript"></script>
   
@endsection

<!-- Contenido del body -->
@section('content')
      @include('partials.header')
      <div id='wrapper'>
        <div id='main-nav-bg'></div>
        @include('partials.nav')
        <section id='content'>
          <div class='container'>
            <div class='row' id='content-wrapper'>
              <div class='col-xs-12'>
                <div class='row'>
                  <div class='col-sm-12'>
                    <div class='page-header'>
                      <h1 class='pull-left'>
                        <i class='fa fa-pencil-square-o'></i>
                        <span>Reportabilidad Fonoaudiología</span>
                      </h1>
                      <div class='pull-right'>
                        <ul class='breadcrumb'>
                          <li>
                            <a href='index.html'>
                              <i class='fa fa-bar-chart-o'></i>
                            </a>
                          </li>
                          <li class='separator'>
                            <i class='fa fa-angle-right'></i>
                          </li>
                          <li>
                            Reportabilidad
                          </li>
                          <li class='separator'>
                            <i class='fa fa-angle-right'></i>
                          </li>
                          <li class='active'>Estadísticas</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <form action="{{route('reportabilidad.reportePsico')}}" accept-charset="UTF-8" class="form" style="margin-bottom: 0;" method="GET">
                <input id="nombres" name="nombres" type="hidden" value="{{$psicologo->nombres}}">
                <input id="apellidos" name="apellidos" type="hidden" value="{{$psicologo->apellidos}}">
                <input id="rut" name="rut" type="hidden" value="{{$psicologo->rut}}">
                <input id="telefono" name="telefono" type="hidden" value="{{$psicologo->telefono}}">
                <input id="direccion" name="direccion" type="hidden" value="{{$psicologo->direccion}}">
                <input id="atencionAnualPsico" name="atencionAnualPsico" type="hidden" value="{{$atencionAnualPsico}}">
                <input id="atencionMensualPsico" name="atencionMensualPsico" type="hidden" value="{{$atencionMensualPsico}}">
                <input id="asistenciaPsico" name="asistenciaPsico" type="hidden" value="{{$asistenciaPsico}}">
                <input id="inasistenciaPsico" name="inasistenciaPsico" type="hidden" value="{{$inasistenciaPsico}}">
                      <div class='row'>
                    <div class='col-sm-12'>
                      <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                        <div class='box-header blue-background'>
                          <div class='title'>Datos personales</div>                        
                        </div>
                         <div class="col-sm-6">
                            <p class="capitalize"><span class="tit">Nombre Completo</span><br>{{ $psicologo->nombres }} {{ $psicologo->apellidos }}</p>
                            <p class="capitalize"><span class="tit">Rut</span><br>{{ $psicologo->rut }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="capitalize"><span class="tit">Telefono</span><br>{{ $psicologo->telefono }}</p>
                            <p class="capitalize"><span class="tit">Dirección</span><br>{{ $psicologo->direccion }}</p>
                        </div>    
                    </div> 
                  </div>
                </div>
                <div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header blue-background'>
                      <div class='title'>Fonoaudiología</div>
                      <div class='actions'>
                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                      </div>
                    </div>
  
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-error'>{{$atencionAnualFono}}</h3>
                          <small>ATENCIONES ANUALES</small>
                          <div class='text-error fa fa-users align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-warning'>{{$atencionMensualFono}}</h3>
                          <small>ATENCIONES MENSUALES</small>
                          <div class='text-warning fa fa-users align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-primary'>{{$asistenciaFono}}</h3>
                          <small>CANTIDAD DE ASISTENCIA DE PACIENTES</small>
                          <div class='text-primary fa fa-book align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-primary'>{{$inasistenciaFono}}</h3>
                          <small>CANTIDAD DE INASISTENCIA DE PACIENTES</small>
                          <div class='text-primary fa fa-book align-left'></div>
                        </div>
              </div>
              </div>
            </div>
                    <button type="submit" class="btn btn-success" style="margin-bottom:5px" />Vista previa a imprimir</button>
                </form>
            @include('partials.footer')
          </div>
            </div>
          </div>
        </section>

      </div>

@endsection
