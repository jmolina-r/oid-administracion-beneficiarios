
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
                                        <span>Reportabilidad Educador</span>
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

                            <input id="nombres" name="nombres" type="hidden" value="{{$educador->nombre}}">
                            <input id="funcionario_id" name="funcionario_id" type="hidden" value="{{$educador->id}}">
                            <input id="apellidos" name="apellidos" type="hidden" value="{{$educador->apellido}}">
                            <input id="rut" name="rut" type="hidden" value="{{$educador->rut}}">
                            <input id="telefono" name="telefono" type="hidden" value="{{$educador->telefono}}">
                            <input id="direccion" name="direccion" type="hidden" value="{{$educador->direccion}}">
                            <input id="atencionAnualEdu" name="atencionAnualEdu" type="hidden" value="{{$atencionAnualEdu}}">
                            <input id="atencionMensualEdu" name="atencionMensualEdu" type="hidden" value="{{$atencionMensualEdu}}">
                            <input id="asistenciaEduAnual" name="asistenciaEduAnual" type="hidden" value="{{$asistenciaEduAnual}}">
                            <input id="asistenciaEduMensual" name="asistenciaEduMensual" type="hidden" value="{{$asistenciaEduMensual}}">
                            <input id="inasistenciaEduAnual" name="inasistenciaEduAnual" type="hidden" value="{{$inasistenciaEduAnual}}">
                            <input id="inasistenciaEduMensual" name="inasistenciaEduMensual" type="hidden" value="{{$inasistenciaEduMensual}}">
                        <input id="justificaEduAnual" name="justificaEduAnual" type="hidden" value="{{$justificaEduAnual}}">
                        <input id="justificaEduMensual" name="justificaEduMensual" type="hidden" value="{{$justificaEduMensual}}">
                        <input id="suspendeOIDEduAnual" name="suspendeOIDEduAnual" type="hidden" value="{{$suspendeOIDEduAnual}}">
                        <input id="suspendeOIDEduMensual" name="suspendeOIDEduMensual" type="hidden" value="{{$suspendeOIDEduMensual}}">
                        <input id="desertaEduAnual" name="desertaEduAnual" type="hidden" value="{{$desertaEduAnual}}">
                        <input id="desertaEduMensual" name="desertaEduMensual" type="hidden" value="{{$desertaEduMensual}}

                            @for ($i = 0; $i < count($nombrePrest); $i++)
                                <input id="nombrePrest" name="nombrePrest[]" type="hidden" value="{{$nombrePrest[$i]}}">
                                <input id="porcentajePrest" name="porcentajePrest[]" type="hidden" value="{{$porcentajePrest[$i]}}">
                            @endfor
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                                        <div class='box-header blue-background'>
                                            <div class='title'>Datos personales</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="capitalize"><span class="tit">Nombre Completo</span><br>{{ $educador->nombre }} {{ $educador->apellido }}</p>
                                            <p class="capitalize"><span class="tit">Rut</span><br>{{ $educador->rut }}</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="capitalize"><span class="tit">Telefono</span><br>{{ $educador->telefono }}</p>
                                            <p class="capitalize"><span class="tit">Dirección</span><br>{{ $educador->direccion }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                                        <div class='box-header blue-background'>
                                                <div class='title'>Edu</div>
                                            <div class='actions'>
                                                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i></a>
                                            </div>
                                        </div>

                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-error'>{{$atencionAnualEdu}}</h3>
                                            <small>ATENCIONES ANUALES - {{date('Y')}}</small>
                                            <div class='text-error fa fa-users align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-warning'>{{$atencionMensualEdu}}</h3>
                                            <small>ATENCIONES MENSUALES - {{date('F')}}</small>
                                            <div class='text-warning fa fa-users align-left'></div>
                                        </div>
                                        <div class='box-content'>
                                            <h3 class='title text-inside text-center'>ASISTENCIA E INASISTENCIA</h3>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-primary'>{{$asistenciaEduAnual}}</h3>
                                            <small>CANTIDAD DE USUARIOS ASISTENTES EN EL AÑO - {{date('Y')}}</small>
                                            <div class='text-primary fa fa-book align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-primary'>{{$asistenciaEduMensual}}</h3>
                                            <small>CANTIDAD DE USUARIOS ASISTENTES EN EL MES - {{date('F')}}</small>
                                            <div class='text-primary fa fa-book align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-primary'>{{$inasistenciaEduAnual}}</h3>
                                            <small>CANTIDAD DE USUARIOS INASISTENTES EN EL AÑO {{date('Y')}}</small>
                                            <div class='text-primary fa fa-book align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-primary'>{{$inasistenciaEduMensual}}</h3>
                                            <small>CANTIDAD DE USUARIOS INASISTENTES EN EL MES - {{date('F')}}</small>
                                            <div class='text-primary fa fa-book align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-primary'>{{$justificaEduMensual}}</h3>
                                            <small>CANTIDAD DE USUARIOS JUSTIFICADOS EN EL MES - {{date('F')}}</small>
                                            <div class='text-primary fa fa-book align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-primary'>{{$justificaEduAnual}}</h3>
                                            <small>CANTIDAD DE USUARIOS JUSTIFICADOS EN EL AÑO- {{date('F')}}</small>
                                            <div class='text-primary fa fa-book align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-primary'>{{$suspendeOIDEduMensual}}</h3>
                                            <small>CANTIDAD DE USUARIOS SUSPENCIÓN OID EN EL MES - {{date('F')}}</small>
                                            <div class='text-primary fa fa-book align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-primary'>{{$suspendeOIDEduAnual}}</h3>
                                            <small>CANTIDAD DE USUARIOS SUSPENCIÓN OID EN EL AÑO- {{date('F')}}</small>
                                            <div class='text-primary fa fa-book align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-primary'>{{$desertaEduMensual}}</h3>
                                            <small>CANTIDAD DE USUARIOS DESERTORES EN EL MES - {{date('F')}}</small>
                                            <div class='text-primary fa fa-book align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-primary'>{{$desertaEduAnual}}</h3>
                                            <small>CANTIDAD DE USUARIOS DESERTORES EN EL AÑO- {{date('F')}}</small>
                                            <div class='text-primary fa fa-book align-left'></div>
                                        </div>
                                        <div class='box-content'>
                                            <h3 class='title text-inside text-center'>PRESTACIONES</h3>
                                        </div>
                                        @for ($i = 0; $i < count($nombrePrest); $i++)
                                            <div class='box-content box-statistic text-right'>
                                                <h3 class='title text-info'>{{$porcentajePrest[$i]}}</h3>
                                                <small>{{$nombrePrest[$i]}}</small>
                                                <div class='text-info fa fa-wheelchair align-left'></div>
                                            </div>
                                        @endfor


                                    </div>
                                </div>
                            </div>

                        @include('partials.footer')
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection