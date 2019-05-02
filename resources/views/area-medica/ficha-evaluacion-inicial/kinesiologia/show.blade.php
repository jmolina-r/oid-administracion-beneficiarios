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
                            <div class="col-sm-12 col-lg-12">
                                <h1 class="capitalize">Tratante: {{ $funcionario->nombre }} {{ $funcionario->apellido }}</h1>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="row">
                                </h2>
                                <h4>Antecedentes Morbidos</h4>
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
                                <h4>Otros Antecedentes</h4>
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
                                <h4>Escala de Valoración Funcional</h4>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <h3>Categoría</h3>
                                    </div>
                                    <div class="col-md-2">
                                        <h3>Puntaje</h3>
                                    </div>
                                    <div class="col-md-5">
                                        <h3>Comentarios</h3>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h3>Autocuidado</h3>
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">1. Alimentación</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valAutocuidado->puntaje_alimentacion }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valAutocuidado->coment_alimentacion }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">2. Arreglo Personal</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valAutocuidado->puntaje_arreglo_pers }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valAutocuidado->coment_arreglo_pers }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">3. Baño</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valAutocuidado->puntaje_bano }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valAutocuidado->coment_bano }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">4. Vestuario Superior</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valAutocuidado->puntaje_vest_sup }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valAutocuidado->coment_vest_sup }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">5. Vestuario Inerior</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valAutocuidado->puntaje_vest_inf }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valAutocuidado->coment_vest_inf }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">6. Aseo Personal</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valAutocuidado->puntaje_aseo_pers }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valAutocuidado->coment_aseo_pers }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Control de Esfinteres</h3>
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">1. Control de Vejiga</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valControlEsfinter->puntaje_control_vejiga }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valControlEsfinter->coment_control_vejiga }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">2. Control de Instestino</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valControlEsfinter->puntaje_control_intestino }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valControlEsfinter->coment_control_intestino }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Movilidad</h3>
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">1. Transferencia cama-silla</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valMovilidad->puntaje_trans_cama_silla }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valMovilidad->coment_trans_cama_silla }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">2. Traslado baño</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valMovilidad->puntaje_traslado_bano }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valMovilidad->coment_traslado_bano }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">3. Traslado ducha</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valMovilidad->puntaje_traslado_ducha }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valMovilidad->coment_traslado_ducha }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Deambulación</h3>
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">1. Desplazarse caminando/sr</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valDeambulacion->puntaje_desp_caminando }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valDeambulacion->coment_desp_caminando }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">2. Subir y bajar escaleras</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valDeambulacion->puntaje_escaleras }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valDeambulacion->coment_escaleras }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Comunicación/Cognitivo</h3>
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">1. Expresión</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valComCog->puntaje_expresion }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valComCog->coment_expresion }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">2. Comprensión</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valComCog->puntaje_comprension }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valComCog->coment_comprension }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Social</h3>
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">1. Interacción social</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valSocial->puntaje_int_social }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valSocial->coment_int_social }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">2. Solución de problemas</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valSocial->puntaje_sol_problemas }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valSocial->coment_sol_problemas }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">3. Memoria</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $valSocial->puntaje_memoria }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $valSocial->coment_memoria }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Evaluación</h4>
                                <div class="col-sm-12 col-lg-6">
                                    <div class="col-sm-12 col-lg-12">
                                        <p class="capitalize"><span class="tit">1. Conexión con el medio</span><br>{{ $valEvaluacion->conexion_medio }}</p>
                                        <p class="capitalize"><span class="tit">2. Nivel cognitivo aparente</span><br>{{ $valEvaluacion->nivel_cognitivo_apar }}</p>
                                    </div>
                                    <h3>Evaluación Sensorial</h3>
                                    <div class="col-sm-12 col-lg-12">
                                        <p class="capitalize"><span class="tit">1. Visual</span><br>{{ $valSensorial->visual }}</p>
                                        <p class="capitalize"><span class="tit">2. Auditivo</span><br>{{ $valSensorial->auditivo }}</p>
                                        <p class="capitalize"><span class="tit">3. Táctil</span><br>{{ $valSensorial->tactil }}</p>
                                        <p class="capitalize"><span class="tit">4. Propioceptivo</span><br>{{ $valSensorial->propioceptivo }}</p>
                                        <p class="capitalize"><span class="tit">5. Vestibular</span><br>{{ $valSensorial->vestibular }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <h3>Evaluación Motora</h3>
                                    <div class="col-sm-12 col-lg-12">
                                        <p class="capitalize"><span class="tit">6. Tono</span><br>{{ $valMotora->tono }}</p>
                                        <p class="capitalize"><span class="tit">7. ROM</span><br>{{ $valMotora->rom }}</p>
                                        <p class="capitalize"><span class="tit">8. Dolor</span><br>{{ $valMotora->dolor }}</p>
                                        <p class="capitalize"><span class="tit">9. Fuerza Muscular</span><br>{{ $valMotora->fm }}</p>
                                        <p class="capitalize"><span class="tit">10. Habilidades Motrices</span><br>{{ $valMotora->hab_motrices }}</p>
                                        <p class="capitalize"><span class="tit">11. Coordinación</span><br>{{ $valMotora->coordinacion }}</p>
                                        <p class="capitalize"><span class="tit">12. Equilibrio</span><br>{{ $valMotora->equilibrio }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <h3>Observaciones: </h3>
                                    <br>{{$fichaKinesiologia->observaciones}}
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
