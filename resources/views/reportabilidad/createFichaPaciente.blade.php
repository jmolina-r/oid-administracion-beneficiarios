
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
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Tramo A',<?php echo $porcentajeFonasaTramoA ?>],
          ['Tramo B',<?php echo $porcentajeFonasaTramoB ?>],
          ['Tramo C',<?php echo $porcentajeFonasaTramoC ?>],
          ['Tramo D',<?php echo $porcentajeFonasaTramoD ?>]
        ]);

        var options = {
          title: 'TRAMOS FONASA',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Prebasico',<?php echo $preBasico ?>],
          ['Basico incompleto',<?php echo $basicoIncompleto ?>],
          ['Basico completo',<?php echo $basicoCompleto ?>],
          ['Medio incompleto',<?php echo $medioIncompleto ?>],
          ['Medio completo',<?php echo $medioCompleto ?>],
          ['Tecnico incompleto',<?php echo $tecnicoIncompleto ?>],
          ['Tecnico completo', <?php echo $tecnicoCompleto ?>],
          ['Universitario incompleto',<?php echo $universitarioIncompleto ?>],
          ['Universitario completo',<?php echo $universitarioCompleto ?>]
        ]);

        var options = {
          title: 'PORCENTAJE EDUCACIONAL',
         
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
       google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Trabajador',<?php echo $trabajador ?>],
          ['Estudiante',<?php echo $estudiante ?>],
          ['Dueño casa',<?php echo $duenoCasa ?>],
          ['Pensionado',<?php echo $pensionado ?>],
          ['Cesante',<?php echo $cesante ?>]
        ]);

        var options = {
          title: 'SITUACION LABORAL',
         
        };

        var chart = new google.visualization.PieChart(document.getElementById('chartthree'));
        chart.draw(data, options);
      }
    </script>
     <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        
          ['Task', 'Hours per Day'],
          ['Cruz Blanca',<?php echo $isapreCruzBlanca ?>],
          ['Colmena',<?php echo $isapreColmena ?>],
          ['Mas vida',<?php echo $isapreMasVida ?>],
          ['Consalud',<?php echo $isapreConsalud ?>],
          ['Banmedica',<?php echo $isapreBanmedica ?>],
          ['Vida Tres',<?php echo $isapreVidaTres ?>],
          ['Codelco', <?php echo $isapreCodelco ?>],
          ['Dipreca',<?php echo $isapreDipreca ?>],
          ['Capredena',<?php echo $isapreCapredena ?>],
          ['Ferro Salud',<?php echo $isapreFerroSalud ?>],
          ['Otras',<?php echo $isapreOtro ?>],
        ]);

        var options = {
          title: 'TIPOS DE ISAPRE',
         
        };

        var chart = new google.visualization.PieChart(document.getElementById('pieechart'));
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
                        <span>Asistente Social</span>
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
                <div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header blue-background'>
                      <div class='title'>OID</div>
                      <div class='actions'>
                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                      </div>
                    </div>
  
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-error'><?php echo $cant ?></h3>
                          <small>CANTIDAD TOTAL DE USUARIOS</small>
                          <div class='text-error fa fa-users align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-warning'><?php echo $ingresoMensual ?></h3>
                          <small>CANTIDAD INGRESOS MENSUALES</small>
                          <div class='text-warning fa fa-book align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-primary'><?php echo $ingresoAnual ?></h3>
                          <small>CANTIDAD INGRESOS ANUALES</small>
                          <div class='text-primary fa fa-book align-left'></div>
                        </div>
              </div>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header green-background'>
                      <div class='title'>Usuarios</div>
                      <div class='actions'>
                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                      </div>
                    </div>
                    <div class='box-content box-statistic text-right'>
                          <h3 class='title text-info'><?php echo intval($porcentajeFemenino); echo '%'?></h3>
                          <small>INSCRITOS FEMENINOS</small>
                          <div class='text-info fa fa-venus align-left'></div>
                        </div>
                    <div class='box-content box-statistic text-right'>
                          <h3 class='title text-muted'><?php echo intval($porcentajeMasculino); echo '%'?></h3>
                          <small>INSCRITOS MASCULINOS</small>
                          <div class='text-muted fa fa-mars align-left'></div>
                     </div>
                      <div class='box-content box-statistic text-right'>
                          <h3 class='title text-inverse'><?php echo intval($porcentajeCredencial); echo '%'?></h3>
                          <small>CREDENCIAL DE DISCAPACIDAD ENTREGADAS</small>
                          <div class='text-inverse fa fa-credit-card align-left'></div>
                     </div>
                     <div class='col-sm-6 sinpadding'>
                        <div class='box-content box-statistic text-right'>
                            <h3 class='title text-error'><br></h3>
                            <small>SALUD</small>
                            <div class='text-error fa fa-ambulance align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                              <h3 class='title text-error'><?php echo intval($porcentajeFonasa); echo '%'?></h3>
                              <small>USUARIOS FONASA</small>
                              <div class='text-error fa fa-ambulance align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                              <h3 class='title text-error'><?php echo intval($porcentajeIsapre); echo '%'?></h3>
                              <small>USUARIOS ISAPRE</small>
                              <div class='text-error fa fa-ambulance align-left'></div>
                        </div>
                     </div>
                     <div class='box-content box-statistic col-sm-6 sinpadding'>
                       <div  id="piechart" style="width: 100%; height: 100%;"></div>
                     </div>
                     <div class='box-content box-statistic col-sm-12 sinpadding'>
                       <div  id="pieechart" style="width: 100%; height: 100%;"></div>
                     </div>
                       <div class='box-content box-statistic col-sm-12 text-right'>
                              <h3 class='title text-error'><br></h3>
                              <small>NIVEL EDUACIONAL</small>
                              <div class='text-invisor fa fa-book align-left'></div>
                        </div>
                        <div class='box-content box-statistic col-sm-12 sinpadding'>
                       <div  id="donutchart" style="width: 100%; height: 100%;"></div>
                     </div>
                     <div class='box-content box-statistic col-sm-12 text-right'>
                              <h3 class='title text-error'><br></h3>
                              <small>SITUACION LABORAL</small>
                              <div class='text-invisor fa fa-book align-left'></div>
                        </div>
                        <div class='box-content box-statistic col-sm-12 sinpadding'>
                       <div  id="chartthree" style="width: 100%; height: 100%;"></div>
                     </div>
                     </div>
                     
                
                </div>
                
              </div>
               
                <div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header blue-background'>
                      <div class='title'>Atenciones Global</div>
                      <div class='actions'>
                        <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                        </a>
                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                      </div>
                    </div>
                    <div class='box-content box-statistic text-right'>
                          <h3 class='title text-info'><?php echo $atencionMensual ?></h3>
                          <small>ATENCIONES MENSUALES</small>
                          <div class='text-info fa fa-file-text align-left'></div>
                        </div>
                    <div class='box-content box-statistic text-right'>
                          <h3 class='title text-info'><?php echo $atencionAnual ?></h3>
                          <small>ATENCIONES ANUALES</small>
                          <div class='text-info fa fa-file-text align-left'></div>
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
