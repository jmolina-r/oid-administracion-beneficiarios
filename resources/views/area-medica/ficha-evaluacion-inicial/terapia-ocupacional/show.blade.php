@extends("layouts.master")

@section("title")
    Ficha Terapia Ocupacional - OID
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
                                        Ficha Evaluación Inicial Terapia Ocupacional
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
                                    <p class="capitalize"><span class="tit">Motivo Consulta</span><br>{{ $fichaTerapiaOcupacional->motivo_consulta }}</p>
                                    <p class="capitalize"><span class="tit">Derivado por</span><br>{{ $fichaTerapiaOcupacional->derivado_por }}</p>
                                    <p class="capitalize"><span class="tit">Relación con el paciente</span><br>{{ $fichaTerapiaOcupacional->relacion_paciente }}</p>
                                    <p class="capitalize"><span class="tit">Observaciones Generales</span><br>{{ $fichaTerapiaOcupacional->observaciones_generales }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Antecedentes Socio-Familiares</h4>
                                <div class="col-sm-12 col-lg-12">
                                    <p class="tit">Nombre de la Madre</p>
                                    <p>{{ $antecedentesSocioFamiliares->nombre_madre }}</p>
                                    <p class="tit">Edad de la Madre</p>
                                    <p>{{ $antecedentesSocioFamiliares->edad_madre }}</p>
                                    <p class="tit">Ocupación de la Madre</p>
                                    <p>{{ $antecedentesSocioFamiliares->ocupacion_madre }}</p>
                                    <p class="tit">Escolaridad Madre</p>
                                    <p>{{ $antecedentesSocioFamiliares->escolaridad_madre }}</p>
                                    <p class="tit">Horario de trabajo Madre</p>
                                    <p>{{ $antecedentesSocioFamiliares->horario_trabajo_madre }}</p>
                                    <p class="tit">Nombre de la Padre</p>
                                    <p>{{ $antecedentesSocioFamiliares->nombre_padre }}</p>
                                    <p class="tit">Edad de la Padre</p>
                                    <p>{{ $antecedentesSocioFamiliares->edad_padre }}</p>
                                    <p class="tit">Ocupación del Padre</p>
                                    <p>{{ $antecedentesSocioFamiliares->ocupacion_padre }}</p>
                                    <p class="tit">Escolaridad Padre</p>
                                    <p>{{ $antecedentesSocioFamiliares->escolaridad_padre }}</p>
                                    <p class="tit">Horario de trabajo Padre</p>
                                    <p>{{ $antecedentesSocioFamiliares->horario_trabajo_padre }}</p>
                                    <p class="tit">Genograma</p>
                                    <img width="500px" src="/storage/genogramas-to/{{$antecedentesSocioFamiliares->genograma}}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Antecedentes de Salud</h4>
                                <div class="col-sm-12 col-lg-12">
                                    <p class="tit">Tiempo de gestación</p>
                                    <p>{{ $antecedentesSalud->tiempo_gestacional }}</p>
                                    <p class="tit">Tipo de parto</p>
                                    <p>{{ $antecedentesSalud->tipo_parto }}</p>
                                    <p class="tit">¿Presenta enfermedades pre o post natales?</p>
                                    <p>{{ $antecedentesSalud->enfermedades_natal_sn }}</p>
                                    <p class="tit">Observaciones sobre enfermedades</p>
                                    <p>{{ $antecedentesSalud->observaciones_enfermedades }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Historial Clínico</h4>
                                <div class="col-sm-12 col-lg-12">
                                    <p class="tit">Enfermedades Familiares</p>
                                    <p>{{ $historialClinico->enfermedades_familiares }}</p>
                                    <p class="tit">Evaluación del Neurólogo/Psiquiatra</p>
                                    <p>{{ $historialClinico->evaluacion_psiquiatra }}</p>
                                    <p class="tit">Evaluación del Fonoaudiólogo</p>
                                    <p>{{ $historialClinico->evaluacion_fonoaudiologo }}</p>
                                    <p class="tit">Evaluación del Terapeuta Ocupacional</p>
                                    <p>{{ $historialClinico->evaluacion_ocupacional }}</p>
                                    <p class="tit">Evaluación del Kinesiólogo</p>
                                    <p>{{ $historialClinico->evaluacion_kinesiologo }}</p>
                                    <p class="tit">Evaluación Psicólogo</p>
                                    <p>{{ $historialClinico->evaluacion_psicologo }}</p>
                                    <p class="tit">Alguna otra evaluación</p>
                                    <p>{{ $historialClinico->otra_evaluacion }}</p>
                                    <p class="tit">Tratamientos recibidos</p>
                                    <p>{{ $historialClinico->tratamientos_recibidos }}</p>
                                    <p class="tit">¿Medicamentos?</p>
                                    <p>{{ $historialClinico->medicamentos_sn }}</p>
                                    <p class="tit">Nombres Medicamentos</p>
                                    <p>{{ $historialClinico->medicamentos }}</p>
                                    <p class="tit">Efectos Medicamentos</p>
                                    <p>{{ $historialClinico->efectos_medicamentos }}</p>
                                    <p class="tit">Diagnósticos Previos</p>
                                    <p>{{ $historialClinico->diagnosticos_previos }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Desarrollo Evolutivo</h4>
                                <div class="col-sm-12 col-lg-12">
                                    <p class="tit">Edad a la que se sentó solo/a</p>
                                    <p>{{ $desarrolloEvolutivo->edad_sento }}</p>
                                    <p class="tit">Edad en que caminó</p>
                                    <p>{{ $desarrolloEvolutivo->edad_camino }}</p>
                                    <p class="tit">Edad en que pronunció su primera palabra con sentido</p>
                                    <p>{{ $desarrolloEvolutivo->edad_palabra }}</p>
                                    <p class="tit">¿Tiene control Esfínteres Vesical?</p>
                                    <p>{{ $desarrolloEvolutivo->control_vesical_sn }}</p>
                                    <p class="tit">Edad a la que comenzó a controlar los esfínteres Vesical</p>
                                    <p>{{ $desarrolloEvolutivo->edad_control_vesical }}</p>
                                    <p class="tit">Control Vesical Diurno</p>
                                    <p>{{ $desarrolloEvolutivo->vesical_diurno }}</p>
                                    <p class="tit">Control Vesical Nocturno</p>
                                    <p>{{ $desarrolloEvolutivo->vesical_nocturno }}</p>
                                    <p class="tit">¿Tiene control Esfínteres Anal?</p>
                                    <p>{{ $desarrolloEvolutivo->control_anal_sn }}</p>
                                    <p class="tit">Edad a la que comenzó a controlar los Esfínteres Anal</p>
                                    <p>{{ $desarrolloEvolutivo->edad_control_anal }}</p>
                                    <p class="tit">Control Anal Diurno</p>
                                    <p>{{ $desarrolloEvolutivo->anal_diurno }}</p>
                                    <p class="tit">Control Anal Nocturno</p>
                                    <p>{{ $desarrolloEvolutivo->anal_nocturno }}</p>
                                    <p class="tit">Observaciones Desarrollo</p>
                                    <p>{{ $desarrolloEvolutivo->observaciones }}</p>
                                </div>
                                <h5>En relación con su motricidad gruesa se aprecia:</h5>
                                <div class="col-sm-12 col-lg-12">
                                    <p class="tit">Estabilidad al caminar</p>
                                    <p>{{ $desarrolloEvolutivo->estabilidad_caminar_sna }}</p>
                                    <p class="tit">Caídas Frecuentes</p>
                                    <p>{{ $desarrolloEvolutivo->caidas_frecuentes_sna }}</p>
                                    <p class="tit">Dominancia Lateral</p>
                                    <p>{{ $desarrolloEvolutivo->dominancia_lateral_sna }}</p>
                                </div>
                                <h5>En relación con su motricidad fina el niño(a) logra:</h5>
                                <div class="col-sm-12 col-lg-12">
                                    <p class="tit">Garra</p>
                                    <p>{{ $desarrolloEvolutivo->garra_sna }}</p>
                                    <p class="tit">Pinza</p>
                                    <p>{{ $desarrolloEvolutivo->pinza_sna }}</p>
                                    <p class="tit">¿Cómo logra pinzar?</p>
                                    <p>{{ $desarrolloEvolutivo->como_pinza }}</p>
                                    <p class="tit">Dibuja</p>
                                    <p>{{ $desarrolloEvolutivo->dibuja_sna }}</p>
                                    <p class="tit">Escribe</p>
                                    <p>{{ $desarrolloEvolutivo->escribe_sna }}</p>
                                    <p class="tit">Corta</p>
                                    <p>{{ $desarrolloEvolutivo->corta_sna }}</p>
                                </div>
                                <h5>¿Cómo se comporta frente a?</h5>
                                <div class="col-sm-12 col-lg-12">
                                    <p class="tit">Estimulos Visuales</p>
                                    <p>{{ $desarrolloEvolutivo->estimulos_visuales }}</p>
                                    <p class="tit">Estimulos Auditivos</p>
                                    <p>{{ $desarrolloEvolutivo->estimulos_auditivos }}</p>
                                    <p class="tit">Estimulos Gustativos</p>
                                    <p>{{ $desarrolloEvolutivo->estimulos_gustativos }}</p>
                                    <p class="tit">Estimulos Táctiles</p>
                                    <p>{{ $desarrolloEvolutivo->estimulos_tactiles }}</p>
                                    <p class="tit">Estimulos Olfativos</p>
                                    <p>{{ $desarrolloEvolutivo->estimulos_olfativos }}</p>
                                </div>
                                <h5>En cuanto a su alimentación:</h5>
                                <div class="col-sm-12 col-lg-12">
                                    <p class="tit">¿Come solo?/a</p>
                                    <p>{{ $desarrolloEvolutivo->come_solo_sn }}</p>
                                    <p class="tit">¿Acepta sólidos?</p>
                                    <p>{{ $desarrolloEvolutivo->acepta_solido_sn }}</p>
                                    <p class="tit">¿Acepta semisólidos?</p>
                                    <p>{{ $desarrolloEvolutivo->acepta_semisolido_sn }}</p>
                                    <p class="tit">¿Acepta líquidos?</p>
                                    <p>{{ $desarrolloEvolutivo->acepta_liquidos_sn }}</p>
                                    <p class="tit">¿Prefiere ciertas temperaturas?</p>
                                    <p>{{ $desarrolloEvolutivo->temperatura_preferida }}</p>
                                    <p class="tit">¿Prefiere ciertos sabores?</p>
                                    <p>{{ $desarrolloEvolutivo->sabores_preferidos }}</p>
                                    <p class="tit">¿Prefiere ciertos colores?</p>
                                    <p>{{ $desarrolloEvolutivo->colores_preferidos }}</p>
                                    <p class="tit">Ejemplos de lo que come</p>
                                    <p>{{ $desarrolloEvolutivo->ejemplo_comida }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Actividades vida diaria</h4>
                                <h5>Criterios: Dominado (D),Parcial (P) o Emergente (E)</h5>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <h3>Actividad</h3>
                                    </div>
                                    <div class="col-md-2">
                                        <h3>Puntaje</h3>
                                    </div>
                                    <div class="col-md-5">
                                        <h3>Comentario</h3>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h3>Cuidados personales</h3>
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Alimentación</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->alimentacion }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_alimen }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Arreglo personal</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->arreglo_personal }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_arreglo }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Baño</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->banio }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_banio }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Vestuario tren superior</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->vestuario_superior }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_superior }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Vestuario tren inferior</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->vestuario_inferior }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_inferior }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Ponerse los zapatos (amarre)</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->ponerse_zapatos }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_zapatos }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Aseo perianal</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->aseo_perianal }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_aseo }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Lavar los dientes</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->lavado_dental }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_dental }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h3>Control de esfínteres</h3>
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Manejo vesical</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->manejo_vesical }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_vesical }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Manejo anal</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->manejo_anal }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_anal }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h3>Labores cotidianas en el hogar y la escuela</h3>
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Prepararse algo de comer</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->preparar_comida }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_comida }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Poner la mesa</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->poner_mesa }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_mesa }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Limpieza ligera (barrer,sacudir)</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->limpieza_ligera }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_ligera }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Mantener su espacio en orden</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->espacio_ordenado }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_orden }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h3>Actividades instrumetales</h3>
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Manejo del dinero</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->manejo_dinero }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_dinero }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Ir de compras</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->ir_compras }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_compras }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Locomoción</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->locomocion }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_locomocion }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h3>Habilidades sociales</h3>
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Resolución de problemas</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->resolver_problemas }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_problemas }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Adecuación social</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->adecuacion_social }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_adecuacion }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Seguir instrucciones</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->seguir_instrucciones }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_instrucciones }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-5">
                                        <p class="tit">Expresar necesidades básicas</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <p>{{ $actividadesVidaDiaria->expresar_necesidades }}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-5">
                                        <p>{{ $actividadesVidaDiaria->comentario_necesidades }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Habilidades Sociales</h4>
                                <div class="col-sm-12 col-lg-12">
                                    <p class="tit">Contacto visual</p>
                                    <p>{{ $habilidadesSociales->contacto_visual }}</p>
                                    <p class="tit">Sonrisa social</p>
                                    <p>{{ $habilidadesSociales->sonrisa_social }}</p>
                                    <p class="tit">Seguimiento visual a personas</p>
                                    <p>{{ $habilidadesSociales->seguimiento_personas }}</p>
                                    <p class="tit">Seguimiento visual a objetos</p>
                                    <p>{{ $habilidadesSociales->seguimiento_objetos }}</p>
                                    <p class="tit">Investigación visual</p>
                                    <p>{{ $habilidadesSociales->investigacion_visual }}</p>
                                    <p class="tit">Investigación motora(Hurga)</p>
                                    <p>{{ $habilidadesSociales->investigacion_motora }}</p>
                                    <p class="tit">Atención conjunta</p>
                                    <p>{{ $habilidadesSociales->atencion_conjunta }}</p>
                                    <p class="tit">Imitación gestual</p>
                                    <p>{{ $habilidadesSociales->imitacion_gestual }}</p>
                                    <p class="tit">Imitación vocal</p>
                                    <p>{{ $habilidadesSociales->imitacion_vocal }}</p>
                                    <p class="tit">Imitación motora</p>
                                    <p>{{ $habilidadesSociales->imitacion_motora }}</p>
                                    <p class="tit">Acepta situaciones repetitivas</p>
                                    <p>{{ $habilidadesSociales->situaciones_repetidas }}</p>
                                    <p class="tit">Acepta situaciones nuevas</p>
                                    <p>{{ $habilidadesSociales->situaciones_nuevas }}</p>
                                    <p class="tit">Intención comunicacional</p>
                                    <p>{{ $habilidadesSociales->intencion_comunicacional }}</p>
                                    <p class="tit">Cariñoso</p>
                                    <p>{{ $habilidadesSociales->carinioso }}</p>
                                    <p class="tit">Juego solitario</p>
                                    <p>{{ $habilidadesSociales->juego_solitario }}</p>
                                    <p class="tit">Juego paralelo</p>
                                    <p>{{ $habilidadesSociales->juego_paralelo }}</p>
                                    <p class="tit">Juego interactivo</p>
                                    <p>{{ $habilidadesSociales->juego_interactivo }}</p>
                                    <p class="tit">Usa gestos adecuados para comunicarse</p>
                                    <p>{{ $habilidadesSociales->gestos_adecuados }}</p>
                                    <p class="tit">Inicia coneversación</p>
                                    <p>{{ $habilidadesSociales->inicia_conversacion }}</p>
                                    <p class="tit">Formula peticiones</p>
                                    <p>{{ $habilidadesSociales->formula_peticiones }}</p>
                                    <p class="tit">Pide aclaración de dudas</p>
                                    <p>{{ $habilidadesSociales->aclarar_dudas }}</p>
                                    <p class="tit">Alterna roles emisor/receptor</p>
                                    <p>{{ $habilidadesSociales->emisor_receptor }}</p>
                                    <p class="tit">¿Juega con niños de su edad?</p>
                                    <p>{{ $habilidadesSociales->ninios_edad }}</p>
                                    <p class="tit">¿Tiene preferencias por cierto sexo, edad o tipos de personas?n</p>
                                    <p>{{ $habilidadesSociales->preferencia_tipo_persona }}</p>
                                    <p class="tit">¿Cuáles son sus mayores intereses?</p>
                                    <p>{{ $habilidadesSociales->mayores_intereses }}</p>
                                    <p class="tit">¿Qué actividades o cosas no le gustan?</p>
                                    <p>{{ $habilidadesSociales->cosas_no_gustan }}</p>
                                    <p class="tit">¿A qué juega?</p>
                                    <p>{{ $habilidadesSociales->juegos }}</p>
                                </div>
                                <div class="col-lg-12">
                                    <h3>Observaciones</h3>
                                    <b>{{$fichaTerapiaOcupacional->observaciones}}
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
