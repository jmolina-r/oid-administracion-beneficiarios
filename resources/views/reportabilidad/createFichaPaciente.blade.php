
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
    <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Edades", "Cantidad", { role: "style" } ],
        ["Estimulación Temprana", <?php echo $estimulacionTemprana ?>, "#b87333"],
        ["3-5", <?php echo $edad3_5 ?>, "silver"],
        ["6-10", <?php echo $edad6_10 ?>, "gold"],
        ["11-20", <?php echo $edad11_20  ?>, "color: #e5e4e2"],
        ["21-30", <?php echo $edad21_30  ?>, "silver"],
        ["31-40", <?php echo $edad31_40  ?>, "gold"],
        ["41-50", <?php echo $edad41_50  ?>, "silver"],
        ["51-60", <?php echo $edad51_60  ?>, "gold"],
        ["61-70", <?php echo $edad61_70  ?>, "silver"],
        ["71-80", <?php echo $edad71_80 ?>, "gold"],
        ["81-90", <?php echo $edad81_90 ?>, "silver"],
        ["91-100", <?php echo $edad91_100 ?>, "gold"],
        ["101-110", <?php echo $edad101_110  ?>, "silver"],
        ["111-120", <?php echo $edad111_120 ?>, "gold"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "",
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
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
                        <span>Reportabilidad General</span>
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
                  <form action="{{route('reportabilidad.reporteGene')}}" accept-charset="UTF-8" class="form" style="margin-bottom: 0;" method="GET">
                      <input id="cant" name="cant" type="hidden" value="{{$cant}}">
                      <input id="porcentajeRSTramite" name="porcentajeRSTramite" type="hidden" value="{{$porcentajeRSTramite}}">
                      <input id="porcentajeFemenino" name="porcentajeFemenino" type="hidden" value="{{$porcentajeFemenino}}">
                      <input id="porcentajeMasculino" name="porcentajeMasculino" type="hidden" value="{{$porcentajeMasculino}}">
                      <input id="ingresoAnual" name="ingresoAnual" type="hidden" value="{{$ingresoAnual}}">
                      <input id="ingresoMensual" name="ingresoMensual" type="hidden" value="{{$ingresoMensual}}">
                      <input id="porcentajeCredencialEntregada" name="porcentajeCredencialEntregada" type="hidden" value="{{$porcentajeCredencialEntregada}}">
                      <input id="porcentajeCredencialTramite" name="porcentajeCredencialTramite" type="hidden" value="{{$porcentajeCredencialTramite}}">
                      <input id="atencionAnual" name="atencionAnual" type="hidden" value="{{$atencionAnual}}">
                      <input id="atencionMensual" name="atencionMensual" type="hidden" value="{{$atencionMensual}}">
                      <input id="porcentajeAdulto" name="porcentajeAdulto" type="hidden" value="{{$porcentajeAdulto}}">
                      <input id="porcentajeJoven" name="porcentajeJoven" type="hidden" value="{{$porcentajeJoven}}">
                      <input id="porcentajeAdultoMayor" name="porcentajeAdultoMayor" type="hidden" value="{{$porcentajeAdultoMayor}}">
                      <input id="porcentajeFonasa" name="porcentajeFonasa" type="hidden" value="{{$porcentajeFonasa}}">
                      <input id="porcentajeFonasaTramoA" name="porcentajeFonasaTramoA" type="hidden" value="{{$porcentajeFonasaTramoA}}">
                      <input id="porcentajeFonasaTramoB" name="porcentajeFonasaTramoB" type="hidden" value="{{$porcentajeFonasaTramoB}}">
                      <input id="porcentajeFonasaTramoC" name="porcentajeFonasaTramoC" type="hidden" value="{{$porcentajeFonasaTramoC}}">
                      <input id="porcentajeFonasaTramoD" name="porcentajeFonasaTramoD" type="hidden" value="{{$porcentajeFonasaTramoD}}">
                      <input id="porcentajeIsapre" name="porcentajeIsapre" type="hidden" value="{{$porcentajeIsapre}}">
                      <input id="preBasico" name="preBasico" type="hidden" value="{{$preBasico}}">
                      <input id="basicoIncompleto" name="basicoIncompleto" type="hidden" value="{{$basicoIncompleto}}">
                      <input id="basicoCompleto" name="basicoCompleto" type="hidden" value="{{$basicoCompleto}}">
                      <input id="medioIncompleto" name="medioIncompleto" type="hidden" value="{{$medioIncompleto}}">
                      <input id="medioCompleto" name="medioCompleto" type="hidden" value="{{$medioCompleto}}">
                      <input id="tecnicoIncompleto" name="tecnicoIncompleto" type="hidden" value="{{$tecnicoIncompleto}}">
                      <input id="tecnicoCompleto" name="tecnicoCompleto" type="hidden" value="{{$tecnicoCompleto}}">
                      <input id="universitarioIncompleto" name="universitarioIncompleto" type="hidden" value="{{$universitarioIncompleto}}">
                      <input id="universitarioCompleto" name="universitarioCompleto" type="hidden" value="{{$universitarioCompleto}}">
                      <input id="trabajador" name="trabajador" type="hidden" value="{{$trabajador}}">
                      <input id="estudiante" name="estudiante" type="hidden" value="{{$estudiante}}">
                      <input id="duenoCasa" name="duenoCasa" type="hidden" value="{{$duenoCasa}}">
                      <input id="pensionado" name="pensionado" type="hidden" value="{{$pensionado}}">
                      <input id="cesante" name="cesante" type="hidden" value="{{$cesante}}">
                      <input id="isapreCruzBlanca" name="isapreCruzBlanca" type="hidden" value="{{$isapreCruzBlanca}}">
                      <input id="isapreColmena" name="isapreColmena" type="hidden" value="{{$isapreColmena}}">
                      <input id="isapreMasVida" name="isapreMasVida" type="hidden" value="{{$isapreMasVida}}">
                      <input id="isapreConsalud" name="isapreConsalud" type="hidden" value="{{$isapreConsalud}}">
                      <input id="isapreBanmedica" name="isapreBanmedica" type="hidden" value="{{$isapreBanmedica}}">
                      <input id="isapreVidaTres" name="isapreVidaTres" type="hidden" value="{{$isapreVidaTres}}">
                      <input id="isapreCodelco" name="isapreCodelco" type="hidden" value="{{$isapreCodelco}}">
                      <input id="isapreDipreca" name="isapreDipreca" type="hidden" value="{{$isapreDipreca}}">
                      <input id="isapreCapredena" name="isapreCapredena" type="hidden" value="{{$isapreCapredena}}">
                      <input id="isapreFerroSalud" name="isapreFerroSalud" type="hidden" value="{{$isapreFerroSalud}}">
                      <input id="isapreOtro" name="isapreOtro" type="hidden" value="{{$isapreOtro}}">
                <div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0; '>
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
                          <small>CANTIDAD INGRESOS MENSUALES - {{date('F')}}</small>
                          <div class='text-warning fa fa-book align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                          <h3 class='title text-primary'><?php echo $ingresoAnual ?></h3>
                          <small>CANTIDAD INGRESOS ANUALES - {{date('Y')}}</small>
                          <div class='text-primary fa fa-book align-left'></div>
                        </div>


              </div>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header blue-background'>
                      <div class='title'>Usuarios</div>
                      <div class='actions'>
                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                      </div>
                    </div>
                    <div class='box-content box-statistic text-right'>
                          <h3 class='title text-info'><?php echo number_format($porcentajeFemenino,2,'.',''); echo '%'?></h3>
                          <small>INSCRITOS FEMENINOS</small>
                          <div class='text-info fa fa-venus align-left'></div>
                        </div>
                    <div class='box-content box-statistic text-right'>
                          <h3 class='title text-muted'><?php echo number_format($porcentajeMasculino,2,'.',''); echo '%'?></h3>

                          <small>INSCRITOS MASCULINOS</small>
                          <div class='text-muted fa fa-mars align-left'></div>
                     </div>
                      <div class='box-content box-statistic text-right'>

                          <h3 class='title text-inverse'><?php echo intval($porcentajeCredencialEntregada); echo '%'?></h3>

                          <small>CREDENCIAL DE DISCAPACIDAD ENTREGADAS</small>
                          <div class='text-inverse fa fa-credit-card align-left'></div>
                     </div>
                     <div class='box-content box-statistic text-right'>
                          <h3 class='title text-inverse'><?php echo intval($porcentajeCredencialTramite); echo '%'?></h3>
                          <small>CREDENCIAL DE DISCAPACIDAD EN TRÁMITE</small>
                          <div class='text-inverse fa fa-credit-card align-left'></div>
                     </div>
                     <div class='box-content box-statistic text-right'>
                          <h3 class='title text-info'><?php echo intval($porcentajeRSTiene); echo '%'?></h3>
                          <small>REGISTRO SOCIAL DE HOGARES</small>
                          <div class='text-info fa fa-home align-left'></div>
                     </div>
                     <div class='box-content box-statistic text-right'>
                          <h3 class='title text-info'><?php echo intval($porcentajeRSTramite); echo '%'?></h3>
                          <small>REGISTRO SOCIAL DE HOGARES EN TRÁMITE</small>
                          <div class='text-info fa fa-home align-left'></div>
                     </div>
                     <div class='box-content box-statistic text-right'>
                              <h3 class='title text-primary'><?php echo $porcentajeParticipaOrgSocial; echo '%'?></h3>
                              <small>PARTICIPACIÓN ORGANIZACIÓN SOCIAL</small>
                              <div class='text-primary fa fa-users align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                              <h3 class='title text-warning'>{{$porcentajeReahbAnual}}%</h3>
                              <small>REHABILITACIONES ANUALES</small>
                              <div class='text-warning fa fa-heart align-left'></div>
                        </div>
                        <div class='box-content box-statistic text-right'>
                              <h3 class='title text-warning'>{{$porcentajeReahbMensual}}%</h3>
                              <small>REHABILITACIONES MENSUALES</small>
                              <div class='text-warning fa fa-heart align-left'></div>
                        </div>
                     <div class='col-sm-6 sinpadding'>
                        <div class='box-content'>
                            <h3 class='title text-error text-center'>SALUD</h3>
                          
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
                              <h3 class='title text-invisor text-center'>NIVEL EDUACIONAL</h3>
                        </div>
                        <div class='box-content box-statistic col-sm-12 sinpadding'>
                       <div  id="donutchart" style="width: 100%; height: 100%;"></div>
                     </div>
                     <div class='box-content box-statistic col-sm-12 text-right'>
                              <h3 class='title text-invisor text-center'>SITUACION LABORAL</h3>
                        </div>
                        <div class='box-content box-statistic col-sm-12 sinpadding'>
                       <div  id="chartthree" style="width: 100%; height: 100%;"></div>
                     </div>
                     <div class='box-content box-statistic col-sm-12 text-right'>
                              <h3 class='title text-invisor text-center'>RANGO DE EDADES</h3>
                        </div>
                        <div class='box-content box-statistic col-sm-12 sinpadding'>
                        <div  id="columnchart_values" style="width: 100%; height: 100%;"></div>
                       
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
                      <button type="submit" class="btn btn-success col-sm-12" style="margin-bottom:5px" />Vista previa a imprimir</button>
                  </form>
            @include('partials.footer')
          </div>
        </section>

      </div>

@endsection
