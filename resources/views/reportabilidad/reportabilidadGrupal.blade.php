
<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Reportabilidad - OID
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
   <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        
          ['Task', 'Hours per Day'],
          ['Kinesiologos',<?php echo $atencionAnualKines ?>],
          ['Fonoaudiologos',<?php echo $atencionAnualFonos ?>],
          ['Psicologos',<?php echo $atencionAnualPsicos ?>],
          ['Terapeuticos',<?php echo $atencionAnualTers ?>]
        ]);

        var options = {
          title: 'Atenciones Anuales',
         
        };

        var chart = new google.visualization.PieChart(document.getElementById('pieschart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        
          ['Task', 'Hours per Day'],
          ['Kinesiologos',<?php echo $atencionMensualKines ?>],
          ['Fonoaudiologos',<?php echo $atencionMensualFonos ?>],
          ['Psicologos',<?php echo $atencionMensualPsicos ?>],
          ['Terapeuticos',<?php echo $atencionMensualTers ?>]
        ]);

        var options = {
          title: 'Atenciones Mensuales',
         
        };

        var chart = new google.visualization.PieChart(document.getElementById('piesschart'));
        chart.draw(data, options);
      }
    </script>
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
                        <span>Reportabilidad Grupal</span>
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
                  <form action="{{route('reportabilidad.reporteGru')}}" accept-charset="UTF-8" class="form" style="margin-bottom: 0;" method="GET">
                      <input id="atencionAnualKines" name="atencionAnualKines" type="hidden" value="{{$atencionAnualKines}}">
                      <input id="atencionMensualKines" name="atencionMensualKines" type="hidden" value="{{$atencionMensualKines}}">
                      <input id="atencionAnualFonos" name="atencionAnualFonos" type="hidden" value="{{$atencionAnualFonos}}">
                      <input id="atencionMensualFonos" name="atencionMensualFonos" type="hidden" value="{{$atencionMensualFonos}}">
                      <input id="atencionAnualPsicos" name="atencionAnualPsicos" type="hidden" value="{{$atencionAnualPsicos}}">
                      <input id="atencionMensualPsicos" name="atencionMensualPsicos" type="hidden" value="{{$atencionMensualPsicos}}">
                      <input id="atencionAnualTers" name="atencionAnualTers" type="hidden" value="{{$atencionAnualTers}}">
                      <input id="atencionMensualTers" name="atencionMensualTers" type="hidden" value="{{$atencionMensualTers}}">
                      <input id="totalAnual" name="totalAnual" type="hidden" value="{{$totalAnual}}">
                      <input id="totalMensual" name="totalMensual" type="hidden" value="{{$totalMensual}}">
                <div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header blue-background'>
                      <div class='title'>Grupal</div>
                      <div class='actions'>
                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                      </div>
                    </div>

                    <div class='box-content box-statistic col-sm-12 sinpadding'>
                    @if( $totalAnual == 0)
                            <p>No existen atenciones anuales actualmente</p>
                    @else
                        <div  id="pieschart" style="width: 100%; height: 100%;"></div>
                    @endif
                     </div>
                     <div class='box-content box-statistic col-sm-12 sinpadding'>
                     @if( $totalMensual == 0)
                         <p>No existen atenciones mensuales actualmente</p>
                     @else
                         <div  id="piesschart" style="width: 100%; height: 100%;"></div>
                     @endif
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
