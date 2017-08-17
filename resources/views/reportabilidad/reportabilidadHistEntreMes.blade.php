
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
                  <form action="{{route('reportabilidad.reporteHistEntreMes')}}" accept-charset="UTF-8" class="form" style="margin-bottom: 0;" method="GET">
                      <input id="mesuno" name="mesuno" type="hidden" value="{{$mesuno}}">
                      <input id="aniouno" name="aniouno" type="hidden" value="{{$aniouno}}">
                      <input id="mesdos" name="mesdos" type="hidden" value="{{$mesdos}}">
                      <input id="aniodos" name="aniodos" type="hidden" value="{{$aniodos}}">
                      <input id="cantIngresadosAño2" name="cantIngresadosAño2" type="hidden" value="{{$cantIngresadosAño2}}">
                      <input id="cantAtencionAño2" name="cantAtencionAño2" type="hidden" value="{{$cantAtencionAño2}}">
                      <input id="atencionPsico" name="atencionPsico" type="hidden" value="{{$atencionPsico}}">
                      <input id="atencionKines" name="atencionKines" type="hidden" value="{{$atencionKines}}">
                      <input id="atencionFono" name="atencionFono" type="hidden" value="{{$atencionFono}}">
                      <input id="atencionTers" name="atencionTers" type="hidden" value="{{$atencionTers}}">
                <div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header blue-background'>
                      <div class='title'>Reportabilidad Histórica</div>
                      <div class='text-right'><span>Periodo: {{$mesuno}}-{{$aniouno}} / {{$mesdos}}-{{$aniodos}}</span></div>
                    </div>
                         <div class='box-content box-statistic text-right'>
                          <h3 class='title text-info'>{{$cantIngresadosAño2}}</h3>
                          <small>USUARIOS INGRESADOS EN EL PERIODO</small>
                          <div class='text-info fa fa-users align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-error'>{{$cantAtencionAño2}}</h3>
                          <small>USUARIOS ATENDIDOS EN EL PERIODO</small>
                          <div class='text-error fa fa-users align-left'></div>
                        </div>
                        <div class='box-content'>
                            <h3 class='title text-inside text-center'>ATENCIÓN POR ÁREAS</h3>                                    
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-warning'>{{$atencionPsico}}</h3>
                          <small>PSICOLOGÍA - USUARIOS ATENDIDOS EN EL PERIODO</small>
                          <div class='text-warning fa fa-smile-o align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-warning'>{{$atencionKines}}</h3>
                          <small>KINESIOLOGÍA - USUARIOS ATENDIDOS EN EL PERIODO</small>
                          <div class='text-warning fa fa-wheelchair align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-warning'>{{$atencionFono}}</h3>
                          <small>FONOAUDIOLOGÍA - USUARIOS ATENDIDOS EN EL PERIODO</small>
                          <div class='text-warning fa fa-deaf align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-warning'>{{$atencionTers}}</h3>
                          <small>TERAPIA OCUPACIONAL - USUARIOS ATENDIDOS EN EL PERIODO</small>
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
