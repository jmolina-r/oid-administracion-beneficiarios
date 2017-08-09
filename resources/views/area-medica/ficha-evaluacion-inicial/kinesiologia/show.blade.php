@extends("layouts.master")

@section("title")
    Ficha Kinesiología - OID
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
                                        Ficha Evaluación Inicial Kinesiología
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <h1 class="capitalize">Paciente: {{ $persona->nombre }} {{ $persona->apellido }}</h1>
                            </div>
                        </div>
                        <div class="row">
                            </h2>
                            <h4>Antecedentes Morbidos</h4>
                            <div class="arrow-down"></div>
                            <div class="col-sm-12 col-lg-6">
                                <p class="capitalize"><span class="tit">Patologías Concomitantes</span><br>{{ $antecedentesMorbidos->pat_concom }}</p>
                                <p class="capitalize"><span class="tit">Alergias</span><br>{{ $antecedentesMorbidos->alergias }}</p>
                                <p class="capitalize"><span class="tit">Medicamentos</span><br>{{ $antecedentesMorbidos->medicamentos }}</p>
                                <p class="capitalize"><span class="tit">Antecedentes Quirúrgicos</span><br>{{ $antecedentesMorbidos->ant_quir }}</p>
                                <p class="capitalize"><span class="tit">Aparatos</span><br>{{ $antecedentesMorbidos->aparatos }}</p>
                                </div>
                            <div class="col-sm-12 col-lg-6">
                                <p class="capitalize"><span class="tit">¿Fuma?</span><br>{{ $antecedentesMorbidos->fuma_sn }}</p>
                                <p class="capitalize"><span class="tit">¿Bebe OH?</span><br>{{ $antecedentesMorbidos->alcohol_sn }}</p>
                                <p class="capitalize"><span class="tit">Act. física</span><br>{{ $antecedentesMorbidos->act_fisica_sn }}</p>
                            </div>
                        </div>
                        <div class="row">
                            </h2>
                            <h4>Otros Antecedentes</h4>
                            <div class="arrow-down"></div>
                            <div class="col-sm-12 col-lg-12">
                                <p class="tit">1. Situación Familiar</p>
                                <p>{{ $fichaKinesiologia->situacion_familiar }}</p>
                                <p class="tit">2. Situación Laboral</p>
                                <p>{{ $fichaKinesiologia->situacion_laboral }}</p>
                                <p class="tit">3. ¿Asiste algún centro de RHB?</p>
                                <p>{{ $fichaKinesiologia->asiste_centro_rhb }}</p>
                                <p class="tit">4. Motivo de Consulta</p>
                                <p>{{ $fichaKinesiologia->motivo_consulta }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Autocuidado</h4>
                                <div class="col-sm-12 col-lg-5">
                                    <h4>1. Alimentación</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_alimentacion_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_alimentacion_confirmation">-</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-sm-12 col-lg-5">
                                    <h4>2. Arreglo Personal</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_arreglo_pers_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_arreglo_pers_confirmation">-</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-sm-12 col-lg-5">
                                    <h4>3. Baño</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_bano_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_bano_confirmation">-</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-sm-12 col-lg-5">
                                    <h4>4. Vestuario Superior</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_vest_sup_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_vest_sup_confirmation">-</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-sm-12 col-lg-5">
                                    <h4>5. Vestuario Inerior</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_vest_inf_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_vest_inf_confirmation">-</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-sm-12 col-lg-5">
                                    <h4>6. Aseo Personal</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_aseo_pers_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_aseo_pers_confirmation">-</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Control de Esfinteres</h4>
                                <div class="col-sm-12 col-lg-5">
                                    <h4>1. Control de Vejiga</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_control_vejiga_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_control_vejiga_confirmation">-</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-sm-12 col-lg-5">
                                    <h4>2. Control de Instestino</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_control_intestino_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_control_intestino_confirmation">-</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Movilidad</h4>
                                <div class="col-sm-12 col-lg-5">
                                    <h4>1. Transferencia cama-silla</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_trans_cama_silla_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_trans_cama_silla_confirmation">-</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-sm-12 col-lg-5">
                                    <h4>2. Traslado baño</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_traslado_bano_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_traslado_bano_confirmation">-</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-sm-12 col-lg-5">
                                    <h4>3. Traslado ducha</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_traslado_ducha_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_traslado_ducha_confirmation">-</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Deambulación</h4>
                                <div class="col-sm-12 col-lg-5">
                                    <h4>1. Desplazarse caminando/sr</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_desp_caminando_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_desp_caminando_confirmation">-</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-sm-12 col-lg-5">
                                    <h4>2. Subir y bajar escaleras</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_escaleras_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_escaleras_confirmation">-</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Comunicación/Cognitivo</h4>
                                <div class="col-sm-12 col-lg-5">
                                    <h4>1. Expresión</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_expresion_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_expresion_confirmation">-</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-sm-12 col-lg-5">
                                    <h4>2. Comprensión</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_comprension_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_comprension_confirmation">-</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Social</h4>
                                <div class="col-sm-12 col-lg-5">
                                    <h4>1. Interacción social</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_int_social_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_int_social_confirmation">-</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-sm-12 col-lg-5">
                                    <h4>2. Solución de problemas</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_sol_problemas_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_sol_problemas_confirmation">-</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-sm-12 col-lg-5">
                                    <h4>3. Memoria</h4>
                                </div>
                                <div class="col-sm-12 col-lg-1">
                                    <p id="puntaje_memoria_confirmation">-</p>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <p id="coment_memoria_confirmation">-</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <h4>Evaluación</h4>
                                <div class="col-sm-12 col-lg-12">
                                    <h4>1. Conexión con el medio</h4>
                                    <p id="conexion_medio_confirmation">-</p>
                                    <h4>2. Nivel cognitivo aparente</h4>
                                    <p id="nivel_cognitivo_apar_confirmation">-</p>
                                </div>
                                <h4>Evaluación Sensorial</h4>
                                <div class="col-sm-12 col-lg-12">
                                    <h4>1. Visual</h4>
                                    <p id="visual_confirmation">-</p>
                                    <h4>2. Auditivo</h4>
                                    <p id="auditivo_confirmation">-</p>
                                    <h4>3. Táctil</h4>
                                    <p id="tactil_confirmation">-</p>
                                    <h4>4. Propioceptivo</h4>
                                    <p id="propioceptivo_confirmation">-</p>
                                    <h4>5. Vestibular</h4>
                                    <p id="vestibular_confirmation">-</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <h4>Evaluación Motora</h4>
                                <div class="col-sm-12 col-lg-12">
                                    <h4>6. Tono</h4>
                                    <p id="tono_confirmation">-</p>
                                    <h4>7. ROM</h4>
                                    <p id="rom_confirmation">-</p>
                                    <h4>8. Dolor</h4>
                                    <p id="dolor_confirmation">-</p>
                                    <h4>9. Fuerza Muscular</h4>
                                    <p id="fm_confirmation">-</p>
                                    <h4>10. Habilidades Motrices</h4>
                                    <p id="hab_motrices_confirmation">-</p>
                                    <h4>11. Coordinación</h4>
                                    <p id="coordinacion_confirmation">-</p>
                                    <h4>12. Equilibrio</h4>
                                    <p id="equilibrio_confirmation">-</p>
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
