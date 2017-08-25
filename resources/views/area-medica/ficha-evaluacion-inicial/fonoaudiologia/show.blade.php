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
    {{-- <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" /> --}}
@endsection

@section("body-attr")
    class="contrast-red"
@endsection

@section("scripts")
    {{-- <script src="{{ asset('/assets/javascripts/jquery/jquery.min.js') }}" type="text/javascript"></script>
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
    <script src="{{ asset('/assets/javascripts/theme.js') }}" type="text/javascript"></script> --}}

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
                                        Ficha Evaluación Inicial Fonoaudiología
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
                                <h4>Datos Ficha:</h4>
                                <div class="col-sm-12 col-lg-6">
                                    <p class="capitalize"><span class="tit">Motivo Consulta</span><br>{{ $fichaFonoaudiologia->motivo_consulta }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Antecedentes Familiares (¿Con quién vive?)</h4>
                                <div class="col-md-12">
                                    <div class="col-md-2 ">
                                        <p class="capitalize"><span class="tit">Nombre</span></p>
                                    </div>
                                    <div class="col-md-2 ">
                                        <p class="capitalize"><span class="tit">Parentesco</span></p>
                                    </div>
                                    <div class="col-md-2">
                                        <p class="capitalize"><span class="tit">Edad</span></p>
                                    </div>
                                    <div class="col-md-2">
                                        <p class="capitalize"><span class="tit">Escolaridad</span></p>
                                    </div>
                                    <div class="col-md-2">
                                        <p class="capitalize"><span class="tit">Ocupación</span></p>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->nombre1 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->parentesco1 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->edad1 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->escolaridad1 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->ocupacion1 }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->nombre2 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->parentesco2 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->edad2 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->escolaridad2 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->ocupacion2 }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->nombre3 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->parentesco3 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->edad3 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->escolaridad3 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->ocupacion3 }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->nombre4 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->parentesco4 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->edad4 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->escolaridad4 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->ocupacion4 }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->nombre5 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->parentesco5 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->edad5 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->escolaridad5 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->ocupacion5 }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->nombre6 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->parentesco6 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->edad6 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->escolaridad6 }}</p>
                                        </div>
                                        <div class="col-md-2 controls">
                                            <p>{{ $parienteHogarFono->ocupacion6 }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <p class="capitalize"><span class="tit">Observaciones</span><br>{{ $parienteHogarFono->observaciones_parientes }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Antecedentes Prenatales</h4>
                                <div class="col-lg-12">
                                    <p class="tit">Planificación de embarazo</p>
                                    <p>{{ $antecedentesPrenatalesFono->plan_embarazo }}</p>
                                    <p class="tit">Aceptación del embarazo</p>
                                    <p>{{ $antecedentesPrenatalesFono->acept_embarazo }}</p>
                                    <p class="tit">Control de embarazo</p>
                                    <p>{{ $antecedentesPrenatalesFono->control_embarazo }}</p>
                                    <p class="tit">Ingesta de medicamentos</p>
                                    <p>{{ $antecedentesPrenatalesFono->ingesta_med }}</p>
                                    <p class="tit">Ingesta de alcohol/drogas</p>
                                    <p>{{ $antecedentesPrenatalesFono->ingesta_oh_drogas }}</p>
                                    <p class="tit">Consumo de cigarrillo</p>
                                    <p>{{ $antecedentesPrenatalesFono->consumo_cigarrillo }}</p>
                                    <p class="tit">Estado emocional</p>
                                    <p>{{ $antecedentesPrenatalesFono->estado_emocional }}</p>
                                    <p class="tit">Enfermedades importantes durante el embarazo</p>
                                    <p>{{ $antecedentesPrenatalesFono->enfermedades_embarazo }}</p>
                                    <p class="tit">Otros:</p>
                                    <p>{{ $antecedentesPrenatalesFono->otros_prenatales }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Antecedentes Perinatales</h4>
                                <div class="col-lg-12">
                                    <p class="tit">Tipo de parto</p>
                                    <p>{{ $antecedentesPerinatalesFono->tipo_parto }}</p>
                                    <p class="tit">Sufrimiento fetal</p>
                                    <p>{{ $antecedentesPerinatalesFono->suf_fetal }}</p>
                                    <p class="tit">Edad gestacional</p>
                                    <p>{{ $antecedentesPerinatalesFono->edad_gest }}</p>
                                    <p class="tit">Lugar de nacimiento</p>
                                    <p>{{ $antecedentesPerinatalesFono->lugar_naci }}</p>
                                    <p class="tit">Peso</p>
                                    <p>{{ $antecedentesPerinatalesFono->peso }}</p>
                                    <p class="tit">Talla</p>
                                    <p>{{ $antecedentesPerinatalesFono->talla }}</p>
                                    <p class="tit">APGAR</p>
                                    <p>{{ $antecedentesPerinatalesFono->apgar }}</p>
                                    <p class="tit">Complicaciones durante el parto</p>
                                    <p>{{ $antecedentesPerinatalesFono->comp_parto }}</p>
                                    <p class="tit">Hospitalizaciones (¿Por qué?)</p>
                                    <p>{{ $antecedentesPerinatalesFono->hospitalizaciones }}</p>
                                    <p class="tit">Otros:</p>
                                    <p>{{ $antecedentesPerinatalesFono->otros_perinatales }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Antecedentes Postnatales</h4>
                                <div class="col-lg-12">
                                    <p class="tit">Tratamientos posteriores al parto:</p>
                                    <p>{{ $antecedentesPostnatalesFono->trat_post_parto }}</p>
                                    <p class="tit">Tipo de alimentación</p>
                                    <p>{{ $antecedentesPostnatalesFono->tipo_alimenta }}</p>
                                    <p class="tit">¿Hasta qué edad duró la lactancia?</p>
                                    <p>{{ $antecedentesPostnatalesFono->edad_lactancia }}</p>
                                    <p class="tit">Operaciones (edad):</p>
                                    <p>{{ $antecedentesPostnatalesFono->operaciones_edad }}</p>
                                    <p class="tit">Hospitalizaciones (edad):</p>
                                    <p>{{ $antecedentesPostnatalesFono->hospitalizaciones_edad }}</p>
                                    <p class="tit">Observaciones:</p>
                                    <p>{{ $antecedentesPostnatalesFono->observaciones_postnatales }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Desarrollo Psicomotor (¿A qué edad?)</h4>
                                <div class="col-lg-12">
                                    <p class="tit">Control cabeza</p>
                                    <p>{{ $desarrolloPsicomotorEdades->control_cabeza }}</p>
                                    <p class="tit">Se sentó</p>
                                    <p>{{ $desarrolloPsicomotorEdades->sento }}</p>
                                    <p class="tit">Gateó</p>
                                    <p>{{ $desarrolloPsicomotorEdades->gateo }}</p>
                                    <p class="tit">Se paró</p>
                                    <p>{{ $desarrolloPsicomotorEdades->paro }}</p>
                                    <p class="tit">Caminó</p>
                                    <p>{{ $desarrolloPsicomotorEdades->camino }}</p>
                                    <p class="tit">Control esfínter diurno</p>
                                    <p>{{ $desarrolloPsicomotorEdades->control_esf_diurno }}</p>
                                    <p class="tit">Control esfínter nocturno</p>
                                    <p>{{ $desarrolloPsicomotorEdades->control_esf_nocturno }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Desarrollo del lenguaje (¿A qué edad?)</h4>
                                <div class="col-lg-12">
                                    <p class="tit">Balbuceó</p>
                                    <p>{{ $desarrolloLenguajeEdades->balbuceo }}</p>
                                    <p class="tit">Sonrió</p>
                                    <p>{{ $desarrolloLenguajeEdades->sonrio }}</p>
                                    <p class="tit">Dijo sus primeras palabras</p>
                                    <p>{{ $desarrolloLenguajeEdades->primeras_palabras }}</p>
                                    <p class="tit">Dijo frases de 2 palabras</p>
                                    <p>{{ $desarrolloLenguajeEdades->frases_dos_palabras }}</p>
                                    <p class="tit">Dijo oraciones</p>
                                    <p>{{ $desarrolloLenguajeEdades->oraciones }}</p>
                                    <p class="tit">Habló espontáneamente</p>
                                    <p>{{ $desarrolloLenguajeEdades->hablo_espo }}</p>
                                    <p class="tit">Siguió instrucciones</p>
                                    <p>{{ $desarrolloLenguajeEdades->siguio_inst }}</p>
                                    <p class="tit">¿El niño (a) mira a los ojos cuando usted lo habla?</p>
                                    <p>{{ $desarrolloLenguajeEdades->mira_ojos }}</p>
                                    <p class="tit">¿El niño (a) mira a los labios cuando habla?</p>
                                    <p>{{ $desarrolloLenguajeEdades->mira_labios }}</p>
                                    <p class="tit">¿Intenta comunicarse con palabras?</p>
                                    <p>{{ $desarrolloLenguajeEdades->comunica_palabras }}</p>
                                    <p class="tit">¿Se comunica con jerga?</p>
                                    <p>{{ $desarrolloLenguajeEdades->comunica_jergas }}</p>
                                    <p class="tit">¿Se comunica con palabras sueltas?</p>
                                    <p>{{ $desarrolloLenguajeEdades->comunica_palabras_sueltas }}</p>
                                    <p class="tit">¿Se comunica a través de gestos?</p>
                                    <p>{{ $desarrolloLenguajeEdades->comunica_gestos }}</p>
                                    <p class="tit">¿Usted entiende lo que dice?</p>
                                    <p>{{ $desarrolloLenguajeEdades->entiende_dice }}</p>
                                    <p class="tit">¿Las personas que no lo conocen entienden lo que dice?</p>
                                    <p>{{ $desarrolloLenguajeEdades->desconocidos_entienden }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Desarrollo Social</h4>
                                <div class="col-lg-12">
                                    <p class="tit">Respeta normas</p>
                                    <p>{{ $desarrolloSocialFono->respeta_normas }}</p>
                                    <p class="tit">Comparte juguetes</p>
                                    <p>{{ $desarrolloSocialFono->comparte_juguetes }}</p>
                                    <p class="tit">Juega con otros niños</p>
                                    <p>{{ $desarrolloSocialFono->juega_otros }}</p>
                                    <p class="tit">Cariñoso</p>
                                    <p>{{ $desarrolloSocialFono->carinoso }}</p>
                                    <p class="tit">Hace berrinches</p>
                                    <p>{{ $desarrolloSocialFono->berrinches }}</p>
                                    <p class="tit">Se frustra con facilidad</p>
                                    <p>{{ $desarrolloSocialFono->frustra_facil }}</p>
                                    <p class="tit">Irritable</p>
                                    <p>{{ $desarrolloSocialFono->irritable }}</p>
                                    <p class="tit">Agresivo</p>
                                    <p>{{ $desarrolloSocialFono->agresivo }}</p>
                                    <p class="tit">Peleador</p>
                                    <p>{{ $desarrolloSocialFono->peleador }}</p>
                                    <p class="tit">Intereses:</p>
                                    <p>{{ $desarrolloSocialFono->intereses }}</p>
                                    <p class="tit">Observaciones:</p>
                                    <p>{{ $desarrolloSocialFono->observaciones_social }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Hábitos</h4>
                                <div class="col-lg-12">
                                    <p class="tit">¿Usa mamadera?</p>
                                    <p>{{ $habitosSiNoFono->mamadera }}</p>
                                    <p class="tit">¿Usa chupete?</p>
                                    <p>{{ $habitosSiNoFono->chupete }}</p>
                                    <p class="tit">¿Se chupa el dedo?</p>
                                    <p>{{ $habitosSiNoFono->chupa_dedo }}</p>
                                    <p class="tit">¿Come solo?</p>
                                    <p>{{ $habitosSiNoFono->come_solo_tipo }}</p>
                                    <p class="tit">¿Se viste solo?</p>
                                    <p>{{ $habitosSiNoFono->viste_solo }}</p>
                                    <p class="tit">¿Permanece con la boca abierta durante el día?</p>
                                    <p>{{ $habitosSiNoFono->boca_abierta_dia }}</p>
                                    <p class="tit">¿Permanece con la boca abierta durante la noche?</p>
                                    <p>{{ $habitosSiNoFono->boca_abierta_noche }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Antecedentes mórbidos del niño (a)</h4>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-2">
                                        <p class="tit">Ancedente</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="tit">Presencia</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="tit">Descripción</p>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-2">
                                        <p class="tit">Alergias</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>{{ $antecedentesMorbidosSiNoFono->alergias_sn }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $antecedentesMorbidosSiNoFono->alergias_desc }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-2">
                                        <p class="tit">Otitis</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>{{ $antecedentesMorbidosSiNoFono->otitis_sn }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $antecedentesMorbidosSiNoFono->otitis_desc }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-2">
                                        <p class="tit">Obesidad</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>{{ $antecedentesMorbidosSiNoFono->obesidad_sn }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $antecedentesMorbidosSiNoFono->obesidad_desc }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-2">
                                        <p class="tit">Diabetes</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>{{ $antecedentesMorbidosSiNoFono->diabetes_sn }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $antecedentesMorbidosSiNoFono->diabetes_desc }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-2">
                                        <p class="tit">Cirugías</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>{{ $antecedentesMorbidosSiNoFono->cirugias_sn }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $antecedentesMorbidosSiNoFono->cirugias_desc }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-2">
                                        <p class="tit">Traumatismos</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>{{ $antecedentesMorbidosSiNoFono->traumatis_sn }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $antecedentesMorbidosSiNoFono->traumatis_desc }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-2">
                                        <p class="tit">Epilepsia</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>{{ $antecedentesMorbidosSiNoFono->epilepsia_sn }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $antecedentesMorbidosSiNoFono->epilepsia_desc }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-2">
                                        <p class="tit">Déficit visual</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>{{ $antecedentesMorbidosSiNoFono->deficit_visual_sn }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $antecedentesMorbidosSiNoFono->deficit_visual_desc }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-2">
                                        <p class="tit">Déficit auditivo</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>{{ $antecedentesMorbidosSiNoFono->deficit_auditivo_sn }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $antecedentesMorbidosSiNoFono->deficit_auditivo_desc }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-2">
                                        <p class="tit">Parálisis cerebral</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>{{ $antecedentesMorbidosSiNoFono->paralisis_cerebral_sn }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $antecedentesMorbidosSiNoFono->paralisis_cerebral_desc }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-2">
                                        <p class="tit">Otros:</p>
                                    </div>
                                    <div class="col-md-2">
                                        <p>{{ $antecedentesMorbidosSiNoFono->otros_morbidos }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Antecedentes mórbidos familiares</h4>
                                <div class="col-lg-12">
                                    <p class="tit">Diabetes</p>
                                    <p>{{ $antecedentesMorbidosFamiliaresSiNoFono->diabetes_sn_mor_fa }}</p>
                                    <p class="tit">Hipertensión</p>
                                    <p>{{ $antecedentesMorbidosFamiliaresSiNoFono->hipertension_sn }}</p>
                                    <p class="tit">Epilepsia</p>
                                    <p>{{ $antecedentesMorbidosFamiliaresSiNoFono->epilepsia_sn_mor_fa }}</p>
                                    <p class="tit">Deficiencia Mental</p>
                                    <p>{{ $antecedentesMorbidosFamiliaresSiNoFono->deficiencia_mental_sn }}</p>
                                    <p class="tit">Autismo</p>
                                    <p>{{ $antecedentesMorbidosFamiliaresSiNoFono->autismo_sn }}</p>
                                    <p class="tit">Trastornos del Lenguaje</p>
                                    <p>{{ $antecedentesMorbidosFamiliaresSiNoFono->trast_lenguaje_sn }}</p>
                                    <p class="tit">Trastornos de aprendizaje</p>
                                    <p>{{ $antecedentesMorbidosFamiliaresSiNoFono->trast_aprendizaje_sn }}</p>

                                    <p class="tit">Trastornos visuales</p>
                                    <p>{{ $antecedentesMorbidosFamiliaresSiNoFono->trast_visuales_sn }}</p>
                                    <p class="tit">Trastornos auditivos</p>
                                    <p>{{ $antecedentesMorbidosFamiliaresSiNoFono->trast_auditivos_sn }}</p>
                                    <p class="tit">Trastornos psiquiátricos</p>
                                    <p>{{ $antecedentesMorbidosFamiliaresSiNoFono->trast_psiquiatricos_sn }}</p>
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
