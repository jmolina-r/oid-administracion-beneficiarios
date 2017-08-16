
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
                        <span>Reportabilidad Histórica</span>
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
                  <form action="{{route('reportabilidad.reporteHistorica')}}" accept-charset="UTF-8" class="form" style="margin-bottom: 0;" method="GET">
                      <input id="anio" name="anio" type="hidden" value="{{$anio}}">
                      <input id="mes" name="mes" type="hidden" value="{{$mes}}">
                      <input id="cantIngresadosAño" name="cantIngresadosAño" type="hidden" value="{{$cantIngresadosAño}}">
                      <input id="cantIngresadosMes" name="cantIngresadosMes" type="hidden" value="{{$cantIngresadosMes}}">
                      <input id="atencionAnual" name="atencionAnual" type="hidden" value="{{$atencionAnual}}">
                      <input id="atencionMensual" name="atencionMensual" type="hidden" value="{{$atencionMensual}}">
                <div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header blue-background'>
                      <div class='title'>Reportabilidad Histórica</div>
                      <div class='text-right'><span>Fecha: {{$mes}}/{{$anio}}</span></div>
                    </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-error'><?php echo $cantIngresadosAño ?></h3>
                          <small>USUARIOS INGRESADOS EN EL AÑO</small>
                          <div class='text-error fa fa-users align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-warning'><?php echo $cantIngresadosMes ?></h3>
                          <small>USUARIOS INGRESADOS EN EL MES</small>
                          <div class='text-warning fa fa-users align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-primary'><?php echo $atencionAnual ?></h3>
                          <small>ATENCIONES DEL AÑO</small>
                          <div class='text-primary fa fa-book align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-primary'><?php echo $atencionMensual ?></h3>
                          <small>ATENCIONES DEL MES</small>
                          <div class='text-primary fa fa-book align-left'></div>
                        </div>
                        <div class='box-content'>
                            <h3 class='title text-inside text-center'>ATENCIÓN POR ÁREAS</h3>                                    
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-warning'>{{$atencionPsico}}</h3>
                          <small>PSICOLOGÍA - USUARIOS ATENDIDOS EN EL AÑO</small>
                          <div class='text-warning fa fa-smile-o align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-warning'>{{$atencionKines}}</h3>
                          <small>KINESIOLOGÍA - USUARIOS ATENDIDOS EN EL AÑO</small>
                          <div class='text-warning fa fa-wheelchair align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-warning'>{{$atencionFono}}</h3>
                          <small>FONOAUDIOLOGÍA - USUARIOS ATENDIDOS EN EL AÑO</small>
                          <div class='text-warning fa fa-deaf align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-warning'>{{$atencionTers}}</h3>
                          <small>TERAPIA OCUPACIONAL - USUARIOS ATENDIDOS EN EL AÑO</small>
                          <div class='text-warning fa fa-hand-rock-o align-left'></div>
                        </div>
              </div>
              </div>
            </div>
                      <button type="submit" class="btn btn-success col-md-12" style="margin-bottom:5px" />Vista previa a imprimir</button>
                  </form>
            @include('partials.footer')
          </div>
        </section>

      </div>

@endsection
