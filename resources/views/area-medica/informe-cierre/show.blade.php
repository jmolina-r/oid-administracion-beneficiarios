@extends("layouts.master")

@section("title")
    Ficha de cierre - OID
@endsection

@section("styles_before")
    <link href="{{ asset("/assets/stylesheets/plugins/fuelux/wizard.css") }}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section("styles")
    <link href="{{ asset("/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css") }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css") }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/assets/images/meta_icons/apple-touch-icon-precomposed.png") }}" rel="apple-touch-icon-precomposed">
    <link href="{{ asset('/assets/stylesheets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section("body-attr")
    class="contrast-red"
@endsection

@section("scripts")
    <!-- / jquery [required] -->
    <script src="{{ asset("/assets/javascripts/jquery/jquery.min.js") }}" type="text/javascript"></script>
    <!-- / jquery mobile (for touch events) -->
    <script src="{{ asset("/assets/javascripts/jquery/jquery.mobile.custom.min.js") }}" type="text/javascript"></script>
    <!-- / jquery ui -->
    <script src="{{ asset("/assets/javascripts/jquery/jquery-ui.min.js") }}" type="text/javascript"></script>
    <!-- / jQuery UI Touch Punch -->
    <script src="{{ asset("/assets/javascripts/jquery/jquery.ui.touch-punch.min.js") }}" type="text/javascript"></script>
    <!-- / bootstrap [required] -->
    <script src="{{ asset("/assets/javascripts/bootstrap/bootstrap.js") }}" type="text/javascript"></script>
    <!-- / modernizr -->
    <script src="{{ asset("/assets/javascripts/plugins/modernizr/modernizr.min.js") }}" type="text/javascript"></script>
    <!-- / retina -->
    <script src="{{ asset("/assets/javascripts/plugins/retina/retina.js") }}" type="text/javascript"></script>
    <!-- / theme file [required] -->
    <script src="{{ asset("/assets/javascripts/theme.js") }}" type="text/javascript"></script>
    <!-- / START - page related files and scripts [optional] -->
    <script src="{{ asset("/assets/javascripts/plugins/fuelux/wizard.js") }}" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->


    <!-- / START - moments-->
    <script src="{{ asset("/assets/javascripts/plugins/common/moment.min.js") }}" type="text/javascript"></script>
    <!-- / END - moments-->

    <!-- / START - datepicker-->
    <script src="{{ asset("/assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js") }}" type="text/javascript"></script>
    <!-- / END - datepicker-->

    <!-- / START - Validaciones-->
    <script src="{{ asset("/assets/javascripts/plugins/validate/jquery.validate.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/1000hz-bootstrap-validator/validator.min.js') }}"></script>
    <script src="{{ asset("/assets/javascripts/plugins/validate/additional-methods.js") }}" type="text/javascript"></script>

    <script src="{{ asset('/js/InputValidation.js') }}" type="text/javascript"></script>
    <!-- / END - validaciones-->
@endsection

@section("content")
    @include('partials.header')
    <div id='wrapper' class="profile">
        <div id='main-nav-bg'></div>
            @include('partials.nav')
            <!-- AQUI VA EL NAVBAR  -->
            <section id="content">
                <div class="container">
                    <div class="row" id="content-wrapper">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-header">
                                        <h1 class="pull-left">
                                            <i class="fa fa-pencil-square-o"></i>
                                            <span>Informe de cierre</span>
                                        </h1>
                                        <div class="pull-right">
                                            <ul class="breadcrumb">
                                                <li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box">
                                            <div class='fuelux'>
                                                <div class='wizard' data-initialize='wizard' id='myWizard'>
                                                    @if(count($errors) > 0)
                                                        <hr class='hr-normal'>
                                                        <div class="alert alert-danger">
                                                            @foreach($errors->all() as $error)
                                                                <p>{{ $error }}</p>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                        <div class="col-xs-12">
                                                            <td><a class="btn btn-primary btn-block btn-xs" href="">Ver como PDF</a></td>
                                                            <hr>
                                                            <div class="row">
                                                                </h2>
                                                                <h4>Información del Beneficiario</h4>
                                                                <div class="col-sm-12 col-lg-6">
                                                                    <p class="capitalize"><span class="tit">Nombre</span><br>{{ ucfirst($beneficiario->nombre)." ".ucfirst($beneficiario->apellido) }}</p>
                                                                    <p class="capitalize"><span class="tit">Edad</span><br>{{ $edad }}</p>
                                                                    <p class="capitalize"><span class="tit">Fecha de Nacimiento</span><br>{{ $beneficiario->fecha_nacimiento }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                </h2>
                                                                <h4>Información de Alta</h4>
                                                                <div class="col-md-6">
                                                                    <p class="capitalize"><span class="tit">Cantidad de Prestaciones</span><br>{{ count($prestacionesRealizadas) }}</p>
                                                                    <p class="capitalize"><span class="tit">Fecha de Inicio</span><br>{{ $fechaInicio }}</p>
                                                                    <p class="capitalize"><span class="tit">Fecha de Termino</span><br>{{ $fechaTermino }}</p>
                                                                    <p class="capitalize"><span class="tit">Motivo de Atención</span><br>{{ $motivoAtencion }}</p>
                                                                    <p class="capitalize"><span class="tit">Objetivos trabajados</span>
                                                                        @foreach($prestacionesRealizadas as $prestacion)
                                                                            <br>{{ $prestacion->nombre }}
                                                                        @endforeach
                                                                        </p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p class="capitalize"><span class="tit">Deserción</span><br>{{ $fichaCierre->desercion }}</p>
                                                                    <p class="capitalize"><span class="tit">Culmina Proceso</span><br>{{ $fichaCierre->culmino_proceso }}</p>
                                                                    <p class="capitalize"><span class="tit">Observaciones / Sugerencias</span><br>{{ $fichaCierre->observacion }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
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
    </div>
@endsection
