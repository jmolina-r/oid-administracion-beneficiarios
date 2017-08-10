@extends("layouts.master")

@section("title")
    Ficha Psicología - OID
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

    <script src="https://use.fontawesome.com/3574066f0b.js"></script>
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
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='page-header'>
                                    <h1 class='pull-left'>
                                        <i class='fa fa-file-text-o'></i>
                                        Ficha Evaluación Inicial Psicología
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <h1 class="capitalize">Paciente: {{ $persona->nombre }} {{ $persona->apellido }}</h1>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="row">
                                </h2>
                                <h4>Datos Ficha:</h4>
                                <div class="col-sm-12 col-lg-6">
                                    <p class="capitalize"><span class="tit">Motivo Consulta</span><br>{{ $fichaPsicologia->motivo_consulta }}</p>
                                    <p class="tit">Genograma</p>
                                    <img width="500px" src="/storage/genogramas-psi/{{$fichaPsicologia->genograma}}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Antecedentes Familiares</h4>
                                <div class="col-sm-12 col-lg-12">
                                    <p class="tit">Nombre de la Madre</p>
                                    <p>{{ $antecedentesFamiliares->nombre_madre }}</p>
                                    <p class="tit">Rut de la Madre</p>
                                    <p>{{ $antecedentesFamiliares->rut_madre }}</p>
                                    <p class="tit">Edad de la Madre</p>
                                    <p>{{ $antecedentesFamiliares->edad_madre }}</p>
                                    <p class="tit">Ocupación de la Madre</p>
                                    <p>{{ $antecedentesFamiliares->ocupacion_madre }}</p>
                                    <p class="tit">Escolaridad Madre</p>
                                    <p>{{ $antecedentesFamiliares->escolaridad_madre }}</p>
                                    <p class="tit">Teléfono Madre</p>
                                    <p>{{ $antecedentesFamiliares->telefono_madre }}</p>
                                    <p class="tit">Observaciones Madre</p>
                                    <p>{{ $antecedentesFamiliares->observaciones_madre }}</p>
                                    <p class="tit">Fecha nacimiento Madre</p>
                                    <p>{{ $antecedentesFamiliares->fecha_nacimiento_madre }}</p>
                                    <p class="tit">Nombre de la Padre</p>
                                    <p>{{ $antecedentesFamiliares->nombre_padre }}</p>
                                    <p class="tit">Rut de la Padre</p>
                                    <p>{{ $antecedentesFamiliares->rut_padre }}</p>
                                    <p class="tit">Edad de la Padre</p>
                                    <p>{{ $antecedentesFamiliares->edad_padre }}</p>
                                    <p class="tit">Ocupación del Padre</p>
                                    <p>{{ $antecedentesFamiliares->ocupacion_padre }}</p>
                                    <p class="tit">Escolaridad Padre</p>
                                    <p>{{ $antecedentesFamiliares->escolaridad_padre }}</p>
                                    <p class="tit">Teléfono Padre</p>
                                    <p>{{ $antecedentesFamiliares->telefono_padre }}</p>
                                    <p class="tit">Observaciones Padre</p>
                                    <p>{{ $antecedentesFamiliares->observaciones_padre }}</p>
                                    <p class="tit">Fecha nacimiento Padre</p>
                                    <p>{{ $antecedentesFamiliares->fecha_nacimiento_padre }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Antecedentes Médicos</h4>
                                <p class="tit">Enfermedades Familiares (Psiquiátricas, neurológicas, cognitivas, físicas, etc.)</p>
                                <p>{{ $antecedentesMedicos->enfermedades_familiares }}</p>
                                <p class="tit">Medicamentos</p>
                                <p>{{ $antecedentesMedicos->medicamentos }}</p>
                                <h3>Tratamiento con especialistas</h3>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <h3>Especialista</h3>
                                    </div>
                                    <div class="col-md-2">
                                        <h3>Nombre</h3>
                                    </div>
                                    <div class="col-md-5">
                                        <h3>Sesiones</h3>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Neurólogo</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $antecedentesMedicos->tratamientos_neurologo_nombre }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $antecedentesMedicos->tratamientos_neurologo_sesiones }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Psiquiatra</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $antecedentesMedicos->tratamientos_psiquiatra_nombre }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $antecedentesMedicos->tratamientos_psiquiatra_sesiones }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Fonoaudiólogo</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $antecedentesMedicos->tratamientos_fonoaudiologo_nombre }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $antecedentesMedicos->tratamientos_fonoaudiologo_sesiones }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Terapeuta Ocupacional</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $antecedentesMedicos->tratamientos_ocupacional_nombre }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $antecedentesMedicos->tratamientos_ocupacional_sesiones }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Kinesiólogo</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $antecedentesMedicos->tratamientos_kinesiologo_nombre }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $antecedentesMedicos->tratamientos_kinesiologo_sesiones }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Psicólogo</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $antecedentesMedicos->tratamientos_psicologo_nombre }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $antecedentesMedicos->tratamientos_psicologo_sesiones }}</p>
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
