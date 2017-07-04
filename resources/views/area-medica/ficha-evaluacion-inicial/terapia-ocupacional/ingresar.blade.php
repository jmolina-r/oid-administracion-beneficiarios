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
    <script src="{{ asset('/js/area-medica/IngresoFormulario.js') }}" type="text/javascript"></script>
    <!-- / END - validaciones-->
@endsection

@section("content")
    @include('partials.header')
    <div id='wrapper'>
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
                                        <span>Evaluación Inicial Terapia Ocupacional</span>
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
                                    <div class='box-content box-padding'>
                                        <div class='fuelux'>
                                            <div class='wizard' data-initialize='wizard' id='myWizard'>
                                                <div class='steps-container'>
                                                    <ul class='steps'>
                                                        <li class='active' data-step='1'>
                                                            <span class='step'>1</span>
                                                        </li>
                                                        <li data-step='2'>
                                                            <span class='step'>2</span>
                                                        </li>
                                                        <li data-step='3'>
                                                            <span class='step'>3</span>
                                                        </li>
                                                        <li data-step='4'>
                                                            <span class='step'>4</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class='actions'>
                                                    <button id="continuar_btn" type='submit' class='pull-right btn btn-md btn-success btn-next' data-last='Finalizar'>
                                                        Continuar
                                                        <i class='fa fa-arrow-right'></i>
                                                    </button>
                                                    <button class='pull-right btn btn-md btn-prev'>
                                                        <i class='fa fa-arrow-left'></i>
                                                        Volver
                                                    </button>
                                                </div>
                                                @if(count($errors) > 0)
                                                    <hr class='hr-normal'>
                                                    <div class="alert alert-danger">
                                                        @foreach($errors->all() as $error)
                                                            <p>{{ $error }}</p>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <hr class='hr-normal'>
                                                <form role="form" id="formulario_registro" action="{{route('area-medica.ficha-evaluacion-inicial.terapia-ocupacional.store')}}" accept-charset="UTF-8" style="margin-bottom: 0;" method="post">
                                                    <div class='step-content'>
                                                        <!-- STEP 1 -->
                                                        <div class='step-pane active' data-step='1'>
                                                            <!--<div class="col-md-12">
                                                                <h3>Seleccionar Paciente</h3>
                                                                <hr/>
                                                            </div>-->
                                                            <input id="id" name="id" type="hidden" value="{{$id}}">
                                                            <!--<div class="col-md-12 form-group">
                                                                <label class="control-label" for="rut">Rut</label>
                                                                <div class="controls">
                                                                    <input class="form-control" id="rut" name="rut" placeholder="RUT" type="text">
                                                                </div>
                                                            </div>-->
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes Socio-Familiares</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="nombre_madre">Nombre de la Madre</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="nombre_madre" name="nombre_madre" value="{{ old('nombre_madre') }}"  placeholder="Nombre de la Madre" type="text" required autofocus>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="edad_madre">Edad de la Madre</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="edad_madre" name="edad_madre" value="{{ old('edad_madre') }}"  placeholder="Edad de la Madre" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="ocupacion_madre">Ocupación de la Madre</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="ocupacion_madre" name="ocupacion_madre" value="{{ old('ocupacion_madre') }}"  placeholder="Ocupación de la Madre" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="escolaridad_madre">Escolaridad Madre</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="escolaridad_madre" name="escolaridad_madre" value="{{ old('escolaridad_madre') }}"  placeholder="Escolaridad Madre" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="horario_trabajo_madre">Horario Trabajo Madre</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="horario_trabajo_madre" name="horario_trabajo_madre" value="{{ old('horario_trabajo_madre') }}"  placeholder="Horario Trabajo Madre" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="nombre_padre">Nombre del Padre</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="nombre_padre" name="nombre_padre" value="{{ old('nombre_padre') }}"  placeholder="Nombre del Padre" type="text" required autofocus>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="edad_padre">Edad del Padre</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="edad_padre" name="edad_padre" value="{{ old('edad_padre') }}"  placeholder="Edad del Padre" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="ocupacion_padre">Ocupación del Padre</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="ocupacion_padre" name="ocupacion_padre" value="{{ old('ocupacion_padre') }}"  placeholder="Ocupación del Padre" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="escolaridad_padre">Escolaridad Padre</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="escolaridad_padre" name="escolaridad_padre" value="{{ old('escolaridad_padre') }}"  placeholder="Escolaridad Padre" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="horario_trabajo_padre">Horario Trabajo Padre</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="horario_trabajo_padre" name="horario_trabajo_padre" value="{{ old('horario_trabajo_padre') }}"  placeholder="Horario Trabajo Padre" type="text">
                                                                </div>
                                                            </div>
                                                            <!--FALTA GENOGRAMA-->
                                                        </div>
                                                        <!-- STEP 2 -->
                                                        <div class='step-pane active' data-step='2'>
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes de Salud</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="tiempo_gestacional">Tiempo de gestación</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="tiempo_gestacional" name="tiempo_gestacional" value="{{ old('tiempo_gestacional') }}"  placeholder="Tiempo de gestación">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="tipo_parto">Tipo de parto</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="tipo_parto" name="tipo_parto" value="{{ old('tipo_parto') }}"  placeholder="Normal,Inducido,Fórceps o cesárea">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="enfermedades_natal_sn">¿Presenta enfermedades pre o post natales?</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="enfermedades_natal_sn" name="enfermedades_natal_sn" value="{{ old('enfermedades_natal_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="observaciones_enfermedades">Observaciones sobre enfermedades</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="observaciones_enfermedades" name="observaciones_enfermedades" value="{{ old('observaciones_enfermedades') }}"  placeholder="Especificar enfermedades">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 3 -->
                                                        <div class='step-pane active' data-step='3'>
                                                            <div class="col-md-12">
                                                                <h3>Historial Clínico del Paciente</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="enfermedades_familiares">Enfermedades Familiares</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="enfermedades_familiares" name="enfermedades_familiares" value="{{ old('enfermedades_familiares') }}"  placeholder="Especificar enfermedades">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="evaluacion_psiquiatra">Evaluación del Neurólogo/Psiquiatra</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="evaluacion_psiquiatra" name="evaluacion_psiquiatra" value="{{ old('evaluacion_psiquiatra') }}"  placeholder="Especificar diagnóstico">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="evaluacion_fonoaudiologo">Evaluación del Fonoaudiólogo</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="evaluacion_fonoaudiologo" name="evaluacion_fonoaudiologo" value="{{ old('evaluacion_fonoaudiologo') }}"  placeholder="Especificar diagnóstico">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="evaluacion_ocupacional">Evaluación del Terapeuta Ocupacional</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="evaluacion_ocupacional" name="evaluacion_ocupacional" value="{{ old('evaluacion_ocupacional') }}"  placeholder="Especificar diagnóstico">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="evaluacion_kinesiologo">Evaluación del Kinesiólogo</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="evaluacion_kinesiologo" name="evaluacion_kinesiologo" value="{{ old('evaluacion_kinesiologo') }}"  placeholder="Especificar diagnóstico">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="otra_evaluacion">Alguna otra evaluación</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="otra_evaluacion" name="otra_evaluacion" value="{{ old('otra_evaluacion') }}"  placeholder="Especificar diagnóstico">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="tratamientos_recibidos">Tratamientos recibidos</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="tratamientos_recibidos" name="tratamientos_recibidos" value="{{ old('tratamientos_recibidos') }}"  placeholder="Especificar diagnóstico">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="medicamentos_sn">¿Medicamentos?</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="medicamentos_sn" name="medicamentos_sn" value="{{ old('medicamentos_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="medicamentos">Nombres Medicamentos</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="medicamentos" name="medicamentos" value="{{ old('medicamentos') }}"  placeholder="Especificar nombres">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="efectos_medicamentos">Efectos Medicamentos</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="efectos_medicamentos" name="efectos_medicamentos" value="{{ old('efectos_medicamentos') }}"  placeholder="Especificar Efectos">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="diagnosticos_previos">Diagnósticos Previos</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="diagnosticos_previos" name="diagnosticos_previos" value="{{ old('diagnosticos_previos') }}"  placeholder="Especificar Detalles">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 4 -->
                                                        <div class='step-pane active' data-step='4'>
                                                            <div class="col-md-12">
                                                                <h3>Desarrollo Evolutivo</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="edad_sento">Edad a la que se sienta solo/a</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="edad_sento" name="edad_sento" value="{{ old('edad_sento') }}"  placeholder="Edad" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="nivel_cognitivo_apar">2. Nivel cognitivo aparente</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="nivel_cognitivo_apar" name="nivel_cognitivo_apar" value="{{ old('nivel_cognitivo_apar') }}"  placeholder="Nivel cognitivo aparente" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="visual">1. Visual</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="visual" name="visual" value="{{ old('visual') }}"  placeholder="Visual" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="auditivo">2. Auditivo</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="auditivo" name="auditivo" value="{{ old('auditivo') }}"  placeholder="Auditivo" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="tactil">3. Táctil</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="tactil" name="tactil" value="{{ old('tactil') }}"  placeholder="Táctil" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="propioceptivo">4. Propioceptivo</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="propioceptivo" name="propioceptivo" value="{{ old('propioceptivo') }}"  placeholder="Propioceptivo" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="vestibular">5. Vestibular</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="vestibular" name="vestibular" value="{{ old('vestibular') }}"  placeholder="Vestibular" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="tono">6. Tono</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="tono" name="tono" value="{{ old('tono') }}"  placeholder="Tono" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="rom">7. ROM</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="rom" name="rom" value="{{ old('rom') }}"  placeholder="ROM" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="dolor">8. Dolor</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="dolor" name="dolor" value="{{ old('dolor') }}"  placeholder="Dolor" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="fm">9. Fuerza Muscular</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="fm" name="fm" value="{{ old('fm') }}"  placeholder="Fuerza Muscular" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="hab_motrices">10. Habilidades Motrices</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="hab_motrices" name="hab_motrices" value="{{ old('hab_motrices') }}"  placeholder="Habilidades Motrices" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="coordinacion">11. Coordinación</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="coordinacion" name="coordinacion" value="{{ old('coordinacion') }}"  placeholder="Coordinacón" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="equilibrio">12. Equilibrio</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="equilibrio" name="equilibrio" value="{{ old('equilibrio') }}"  placeholder="Equilibrio" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{ csrf_field() }}
                                                </form>
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
@endsection
