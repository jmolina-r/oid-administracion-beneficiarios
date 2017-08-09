
<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Reportabilidad - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles')

    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />

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
                        <span>Reportabilidad</span>
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
                          <li class='active'>Reportabilidad</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-sm-12'>
                    <div class='box'>
                         <div class='box-content box-statistic' >
                            <div class="nombre" style="display:inline-block">
                                <h4>Reportabilidad General</h4>
                            </div>
                            <div class="boton pull-right" style="display:inline-block">
                                <a href='{{route('reportabilidad.showEstadistica')}}'><input type="button" value="Visualizar" class="btn btn-success" style="margin-bottom:5px" /></a>
                                <a href='{{route('reportabilidad.reporteGeneral')}}'><input type="button" value="Vista previa a imprimir" class="btn btn-primary" style="margin-bottom:5px" /></a>
                            </div>  
                        </div>
                        <div class='box-content box-statistic' >
                            <div class="nombre" style="display:inline-block">
                                <h4>Reportabilidad Kinesiologia</h4>
                            </div>
                            <div class="boton pull-right" style="display:inline-block">
                                <a href='{{route('reportabilidad.reportabilidadKine')}}'><input type="button" value="Visualizar" class="btn btn-success" style="margin-bottom:5px" /></a>
                                <a href='{{route('reportabilidad.reporteKine')}}'><input type="button" value="Vista previa a imprimir" class="btn btn-primary" style="margin-bottom:5px" /></a>
                            </div>  
                        </div>
                        <div class='box-content box-statistic' >
                            <div class="nombre" style="display:inline-block">
                                <h4>Reportabilidad Psicología</h4>
                            </div>
                            <div class="boton pull-right" style="display:inline-block">
                                <a href='{{route('reportabilidad.reportabilidadPsico')}}'><input type="button" value="Visualizar" class="btn btn-success" style="margin-bottom:5px" /></a>
                                <a href='{{route('reportabilidad.reportePsico')}}'><input type="button" value="Vista previa a imprimir" class="btn btn-primary" style="margin-bottom:5px" /></a>
                            </div>  
                        </div>
                        <div class='box-content box-statistic' >
                            <div class="nombre" style="display:inline-block">
                                <h4>Reportabilidad Terapia ocupacional</h4>
                            </div>
                            <div class="boton pull-right" style="display:inline-block">
                                <a href='{{route('reportabilidad.reportabilidadTer')}}'><input type="button" value="Visualizar" class="btn btn-success" style="margin-bottom:5px" /></a>
                                <a href='{{route('reportabilidad.reporteTer')}}'><input type="button" value="Vista previa a imprimir" class="btn btn-primary" style="margin-bottom:5px" /></a>
                            </div>  
                        </div>
                        <div class='box-content box-statistic' >
                            <div class="nombre" style="display:inline-block">
                                <h4>Reportabilidad Social</h4>
                            </div>
                            <div class="boton pull-right" style="display:inline-block">
                                <a href='{{route('reportabilidad.reportabilidadSoc')}}'><input type="button" value="Visualizar" class="btn btn-success" style="margin-bottom:5px" /></a>
                                <a href='{{route('reportabilidad.reporteSoc')}}'><input type="button" value="Vista previa a imprimir" class="btn btn-primary" style="margin-bottom:5px" /></a>
                            </div>  
                        </div>
                        <div class='box-content box-statistic' >
                            <div class="nombre" style="display:inline-block">
                                <h4>Reportabilidad Grupal</h4>
                            </div>
                            <div class="boton pull-right" style="display:inline-block">
                                <a href='{{route('reportabilidad.reportabilidadGru')}}'><input type="button" value="Visualizar" class="btn btn-success" style="margin-bottom:5px" /></a>
                                <a href='{{route('reportabilidad.reporteGru')}}'><input type="button" value="Vista previa a imprimir" class="btn btn-primary" style="margin-bottom:5px" /></a>
                            </div>  
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @include('partials.footer')
          </div>
        </section>

      </div>

@endsection
