@extends("layouts.master")

@section("title")
    Ficha Fonoaudiologia - OID
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

    <!-- / START - Handler agregar parientes-->
    <script src="{{ asset("/js/area-medica/AgregarPariente.js") }}" type="text/javascript"></script>
    <script src="{{ asset("/js/area-medica/InputsFonoaudiologia.js") }}" type="text/javascript"></script>
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
                                        <span>Evaluación Inicial Fonoaudiologia</span>
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
                                                        <li data-step='5'>
                                                            <span class='step'>5</span>
                                                        </li>
                                                        <li data-step='6'>
                                                            <span class='step'>6</span>
                                                        </li>
                                                        <li data-step='7'>
                                                            <span class='step'>7</span>
                                                        </li>
                                                        <li data-step='8'>
                                                            <span class='step'>8</span>
                                                        </li>
                                                        <li data-step='9'>
                                                            <span class='step'>9</span>
                                                        </li>
                                                        <li data-step='10'>
                                                            <span class='step'>10</span>
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
                                                <form role="form" id="formulario_registro"  action="{{route('area-medica.ficha-evaluacion-inicial.fonoaudiologia.postFono')}}" accept-charset="UTF-8" style="margin-bottom: 0;" method="post">
                                                    <div class='step-content'>
                                                        <!-- STEP 1 -->
                                                        <div class='step-pane active' data-step='1'>
                                                            <input id="id" name="id" type="hidden" value="{{$id}}">
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes familiares (¿Con quién vive?)</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="col-md-3 col-md-offset-3">
                                                                    <h4>Nombre</h4>
                                                                </div>
                                                                <div class="col-md-6 ">
                                                                    <h4>Parentesco</h4>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <h4>Edad</h4>
                                                                </div>
                                                                <div class="col-md-12 col-md-offset-3">
                                                                    <h4>Escolaridad</h4>
                                                                </div>
                                                                <div class="col-md-15 col-md-offset-3">
                                                                    <h4>Ocupación</h4>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-3 controls">
                                                                        <input class="form-control" id="nombre1" name="nombre1" value="{{ old('nombre1') }}"  placeholder="Nombre" type="text">                                                                    </div>
                                                                    <div class="col-md-6 controls">
                                                                        <input class="form-control" id="parentesco1" name="parentesco2" value="{{ old('parentesco1') }}"  placeholder="Parentesco" type="text">
                                                                    </div>
                                                                    <div class="col-md-9 controls">
                                                                        <input class="form-control" id="edad1" name="edad1" value="{{ old('edad1') }}"  placeholder="Edad" type="text">
                                                                    </div>
                                                                    <div class="col-md-12 controls">
                                                                        <input class="form-control" id="escolaridad1" name="escolarida1" value="{{ old('escolaridad1') }}"  placeholder="Escolaridad" type="text">
                                                                    </div>
                                                                    <div class="col-md-15 controls">
                                                                        <input class="form-control" id="ocupacion1" name="ocupacion1" value="{{ old('ocupacion1') }}"  placeholder="Ocupación" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-3 controls">
                                                                        <input class="form-control" id="nombre2" name="nombre2" value="{{ old('nombre2') }}"  placeholder="Nombre" type="text">                                                                    </div>
                                                                    <div class="col-md-6 controls">
                                                                        <input class="form-control" id="parentesco2" name="parentesco2" value="{{ old('parentesco2') }}"  placeholder="Parentesco" type="text">
                                                                    </div>
                                                                    <div class="col-md-9 controls">
                                                                        <input class="form-control" id="edad2" name="edad2" value="{{ old('edad2') }}"  placeholder="Edad" type="text">
                                                                    </div>
                                                                    <div class="col-md-12 controls">
                                                                        <input class="form-control" id="escolaridad2" name="escolarida2" value="{{ old('escolaridad2') }}"  placeholder="Escolaridad" type="text">
                                                                    </div>
                                                                    <div class="col-md-15 controls">
                                                                        <input class="form-control" id="ocupacion2" name="ocupacion2" value="{{ old('ocupacion2') }}"  placeholder="Ocupación" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 2 -->
                                                        <div class='step-pane active' data-step='2'>
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes prenatales</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="planificacion_embarazo">Planificación de embarazo</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="planificacion_embarazo" name="planificacion_embarazo" value="{{ old('planificacion_embarazo') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="aceptacion_embarazo">Aceptación del embarazo</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="aceptacion_embarazo" name="aceptacion_embarazo" value="{{ old('aceptacion_embarazo') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="control_embarazo">Control de embarazo</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="control_embarazo" name="control_embarazo" value="{{ old('control_embarazo') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="ingesta_medicamentos">Ingesta de medicamentos</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="ingesta_medicamentos" name="ingesta_medicamentos" value="{{ old('ingesta_medicamentos') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="ingesta_alcohol_drogas">Ingesta de alcohol/drogas</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="ingesta_alcohol_drogas" name="ingesta_alcohol_drogas" value="{{ old('ingesta_alcohol_drogas') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="consumo_cigarrillo">Consumo de cigarrillo</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="consumo_cigarrillo" name="consumo_cigarrillo" value="{{ old('consumo_cigarrillo') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="estado_emocional">Estado emocional</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="estado_emocional" name="estado_emocional" value="{{ old('estado_emocional') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="enfermedades_embarazo">Enfermedades importantes durante el embarazo</label>
                                                                <div class="col-md-8 controls">
                                                                    <div>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="" id="check_rubeola">Rubeola
                                                                        </label>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="" id="check_diabetes">Diabetes
                                                                        </label>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="" id="check_renal">Enf. Renal
                                                                        </label>
                                                                        <label class="checkbox-inline col-md-3">
                                                                            <input type="checkbox" value="" id="check_hiper">Hipertensión
                                                                        </label>
                                                                    </div>
                                                                    <br/>
                                                                    <div>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="" id="check_nutri">Nutricionales
                                                                        </label>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="" id="check_trauma">Traumatismos
                                                                        </label>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="" id="check_vene">Venéreas
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" value="" id="check_infecciones">Infecciosas
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="otros_prenatal">Otros:</label>
                                                                <textarea class="form-control" rows="4" name="otros_prenatal" id="otros_prenatal"></textarea>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 3 -->
                                                        <div class='step-pane active' data-step='3'>
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes perinatales</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="tipo_parto">Tipo de parto</label>
                                                                <div class="col-md-8 control-label">
                                                                    <input class="form-control" id="tipo_parto" name="tipo_parto" value="{{ old('tipo_parto') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="sufrimiento_fetal">Sufrimiento fetal</label>
                                                                <div class="col-md-8 control-label">
                                                                    <input class="form-control" id="sufrimiento_fetal" name="sufrimiento_fetal" value="{{ old('sufrimiento_fetal') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="edad_gestacional">Edad gestacional</label>
                                                                <div class="col-md-8 control-label">
                                                                    <input class="form-control" id="edad_gestacional" name="edad_gestacional" value="{{ old('edad_gestacional') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="lugar_nacimiento">Lugar de nacimiento</label>
                                                                <div class="col-md-8 control-label">
                                                                    <input class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" value="{{ old('lugar_nacimiento') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="peso">Peso</label>
                                                                <div class="col-md-8 control-label">
                                                                    <input class="form-control" id="peso" name="peso" value="{{ old('peso') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="talla">Talla</label>
                                                                <div class="col-md-8 control-label">
                                                                    <input class="form-control" id="talla" name="talla" value="{{ old('talla') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="apgar">APGAR</label>
                                                                <div class="col-md-8 control-label">
                                                                    <input class="form-control" id="apgar" name="apgar" value="{{ old('apgar') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="complicaciones_parto">Complicaciones durante el parto</label>
                                                                <div class="col-md-8 controls">
                                                                    <div>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="" id="check_asfixia">Asfixia perinatal
                                                                        </label>
                                                                        <label class="checkbox-inline col-md-3">
                                                                            <input type="checkbox" value="" id="check_neumo">Neumonía por infecciones
                                                                        </label>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="" id="check_trauma_peri">Traumatismos
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label for="otros_complicaciones">Otras complicaciones:</label>
                                                                <textarea class="form-control" rows="3" id="otros_complicaciones"></textarea>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="hospitalizaciones">Hospitalizaciones (¿Por qué?)</label>
                                                                <div class="col-md-8 control-label">
                                                                    <input class="form-control" id="hospitalizaciones" name="hospitalizaciones" value="{{ old('hospitalizaciones') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label for="otros_general">Otros:</label>
                                                                <textarea class="form-control" rows="3" id="otros_general"></textarea>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 4 -->
                                                        <div class='step-pane active' data-step='4'>
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes postnatales</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="conexion_medio">Tratamientos posteriores al parto:</label>
                                                                <div class="col-md-9 controls">
                                                                    <div>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="">Cianosis
                                                                        </label>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="">Ictericia
                                                                        </label>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="">Infecciones
                                                                        </label>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="">Traumatismos
                                                                        </label>
                                                                    </div>
                                                                    <br/>
                                                                    <div>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="">Aspiración meconio
                                                                        </label>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="">Cardiacas
                                                                        </label>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="">Malformaciones
                                                                        </label>
                                                                        <label class="checkbox-inline col-md-2">
                                                                            <input type="checkbox" value="">Síndromes
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label">Tipo de alimentación</label>
                                                                <div class="col-md-2 controls">
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="optradio" id="radio_lactancia">Lactancia materna</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="optradio" id="radio_relleno">Relleno</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="optradio" id="radio_mixta">Mixta</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2" name="edad_lactancia">
                                                                    <input class="form-control" placeholder="¿Hasta qué edad?" id="text_lactancia" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="obs_esp">Observaciones o especificaciones:</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" id="obs_esp" name="obs_esp" value="{{ old('obs_esp') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="op_edad">Operaciones (edad):</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" id="op_edad" name="op_edad" value="{{ old('op_edad') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="hosp_edad">Hospitalizaciones (edad):</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" id="hosp_edad" name="hosp_edad" value="{{ old('hosp_edad') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label for="obs_post">Observaciones:</label>
                                                                <textarea class="form-control" rows="3" id="obs_post"></textarea>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 5 -->
                                                        <div class="step-pane active" data-step="5">
                                                            <div class="col-md-12">
                                                                <h3>Desarrollo psicomotor (¿A qué edad?)</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="edad_cabeza">Control cabeza</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="edad_cabeza" name="edad_cabeza" value="{{ old('edad_cabeza') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="sento">Se sentó</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="sento" name="sento" value="{{ old('sento') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="gateo">Gateó</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="gateo" name="gateo" value="{{ old('gateo') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="paro">Se paró</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="paro" name="paro" value="{{ old('paro') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="camino">Caminó</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="camino" name="camino" value="{{ old('camino') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="esfinter_diurno">Control esfínter diurno</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="esfinter_diurno" name="esfinter_diurno" value="{{ old('esfinter_diurno') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="esfinter_nocturno">Control esfínter nocturno</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="esfinter_nocturno" name="esfinter_nocturno" value="{{ old('esfinter_nocturno') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 6 -->
                                                        <div class="step-pane active" data-step="6">
                                                            <div class="col-md-12">
                                                                <h3>Desarrollo del lenguaje (¿A qué edad?)</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="balbuceo">Balbuceó</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="balbuceo" name="balbuceo" value="{{ old('balbuceo') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="sonrio">Sonrió</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="sonrio" name="sonrio" value="{{ old('sonrio') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="primeras_palabras">Dijo sus primeras palabras</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="primeras_palabras" name="primeras_palabras" value="{{ old('primeras_palabras') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="dos_palabras">Dijo frases de 2 palabras</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="dos_palabras" name="dos_palabras" value="{{ old('dos_palabras') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="dijo_oraciones">Dijo oraciones</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="dijo_oraciones" name="dijo_oraciones" value="{{ old('dijo_oraciones') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="hablo_esp">Habló espontáneamente</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="hablo_esp" name="hablo_esp" value="{{ old('hablo_esp') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="siguio_inst">Siguió instrucciones</label>
                                                                <div class="col-md-1">
                                                                    <input class="form-control" id="siguio_inst" name="siguio_inst" value="{{ old('siguio_inst') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <br/>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿El niño (a) mira a los ojos cuando usted lo habla?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio1" id="ojos_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio1" id="ojos_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿El niño (a) mira a los labios cuando habla?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio2" id="labios_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio2" id="labios_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿Intenta comunicarse con palabras?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio3" id="com_palabras_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio3" id="com_palabras_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿Se comunica con jerga?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio4" id="jerga_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio4" id="jerga_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿Se comunica con palabras sueltas?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio5" id="sueltas_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio5" id="sueltas_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿Se comunica a través de gestos?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio6" id="gestos_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio6" id="gestos_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿Usted entiende lo que dice?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio7" id="dice_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio7" id="dice_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿Las personas que no lo conocen entienden lo que dice?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio8" id="conocen_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio8" id="conocen_no">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 7 -->
                                                        <div class="step-pane active" data-step="7">
                                                            <div class="col-md-12">
                                                                <h3>Desarrollo social</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Respeta normas</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio21" id="normas_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio21" id="normas_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Comparte juguetes</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio22" id="juguetes_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio22" id="juguetes_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Juega con otros niños</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio23" id="otros_ninos_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio23" id="otros_ninos_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Cariñoso</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio24" id="carinoso_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio24" id="carinoso_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Hace berrinches</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio25" id="berrinche_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio25" id="berrinche_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Se frustra con facilidad</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio26" id="frustra_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio26" id="frustra_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Irritable</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio27" id="irritable_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio27" id="irritable_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Agresivo</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio28" id="agresivo_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio28" id="agresivo_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Peleador</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio29" id="peleador_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio29" id="peleador_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="interes_social">Intereses</label>
                                                                <div class="col-md-5">
                                                                    <input class="form-control" id="interes_social" name="interes_social" value="{{ old('interes_social') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label for="obs_social">Observaciones:</label>
                                                                <textarea class="form-control" rows="3" id="obs_social"></textarea>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 8 -->
                                                        <div class="step-pane active" data-step="8">
                                                            <div class="col-md-12">
                                                                <h3>Hábitos</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿Usa mamadera?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio31" id="mamadera_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio31" id="mamadera_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿Usa chupete?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio32" id="chupete_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio32" id="chupete_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿Se chupa el dedo?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio33" id="dedo_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio33" id="dedo_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿Come solo?</label>
                                                                <div class="col-md-1">
                                                                    <label class="radio-inline"><input type="radio" name="optradio34" id="solo_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio34" id="solo_no">No</label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="tipo_comida" name="tipo_comida" value="{{ old('tipo_comida') }}"  placeholder="Tipo de comida">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿Se viste solo?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio35" id="viste_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio35" id="viste_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿Permanece con la boca abierta de día?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio36" id="dia_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio36" id="dia_no">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">¿Permanece con la boca abierta de noche?</label>
                                                                <div class="col-md-3">
                                                                    <label class="radio-inline"><input type="radio" name="optradio37" id="noche_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio37" id="noche_no">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 9 -->
                                                        <div class="step-pane active" data-step="9">
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes mórbidos del niño (a)</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Alergias</label>
                                                                <div class="col-md-1">
                                                                    <label class="radio-inline"><input type="radio" name="optradio41" id="morb_alergia_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio41" id="morb_alergia_no">No</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="des_trat1" name="des_trat1" value="{{ old('des_trat1') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Otitis</label>
                                                                <div class="col-md-1">
                                                                    <label class="radio-inline"><input type="radio" name="optradio42" id="morb_oti_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio42" id="morb_oti_no">No</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="des_trat2" name="des_trat2" value="{{ old('des_trat2') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Obesidad</label>
                                                                <div class="col-md-1">
                                                                    <label class="radio-inline"><input type="radio" name="optradio43" id="morb_obe_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio43" id="morb_obe_no">No</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="des_trat3" name="des_trat3" value="{{ old('des_trat3') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Diabetes</label>
                                                                <div class="col-md-1">
                                                                    <label class="radio-inline"><input type="radio" name="optradio44" id="morb_dia_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio44" id="morb_dia_no">No</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="des_trat4" name="des_trat4" value="{{ old('des_trat4') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Cirugías</label>
                                                                <div class="col-md-1">
                                                                    <label class="radio-inline"><input type="radio" name="optradio45" id="morb_cir_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio45" id="morb_cir_no">No</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="des_trat5" name="des_trat5" value="{{ old('des_trat5') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Traumatismos</label>
                                                                <div class="col-md-1">
                                                                    <label class="radio-inline"><input type="radio" name="optradio46" id="morb_tra_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio46" id="morb_tra_no">No</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="des_trat6" name="des_trat6" value="{{ old('des_trat6') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Epilepsia</label>
                                                                <div class="col-md-1">
                                                                    <label class="radio-inline"><input type="radio" name="optradio47" id="morb_epi_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio47" id="morb_epi_no">No</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="des_trat7" name="des_trat7" value="{{ old('des_trat7') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Déficit visual</label>
                                                                <div class="col-md-1">
                                                                    <label class="radio-inline"><input type="radio" name="optradio48" id="morb_vis_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio48" id="morb_vis_no">No</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="des_trat8" name="des_trat8" value="{{ old('des_trat8') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Déficit auditivo</label>
                                                                <div class="col-md-1">
                                                                    <label class="radio-inline"><input type="radio" name="optradio49" id="morb_aud_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio49" id="morb_aud_no">No</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="des_trat9" name="des_trat9" value="{{ old('des_trat9') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3">Parálisis cerebral</label>
                                                                <div class="col-md-1">
                                                                    <label class="radio-inline"><input type="radio" name="optradio50" id="morb_par_si">Sí</label>
                                                                    <label class="radio-inline"><input type="radio" name="optradio50" id="morb_par_no">No</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="des_trat10" name="des_trat10" value="{{ old('des_trat10') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label for="obs_otros_morb">Otros:</label>
                                                                <textarea class="form-control" rows="3" id="obs_otros_morb"></textarea>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 10-->
                                                        <div class="step-pane active" data-step="10">
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes mórbidos familiares</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-2">Enfermedades</label>
                                                                <div class="col-md-2">
                                                                    <div class="checkbox">
                                                                        <label><input type="checkbox" name="check_diabetes"  value="" id="check_diabetes">Diabetes</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <label><input type="checkbox" name="check_hiper" value="" id="check_hiper">Hipertensión</label>
                                                                    </div>
                                                                    <div class="checkbox disabled">
                                                                        <label><input type="checkbox" name="check_epilepsia" value="" id="check_epilepsia">Epilepsia</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <label><input type="checkbox" name="check_def" value="" id="check_def">Deficiencia mental</label>
                                                                    </div>
                                                                    <div class="checkbox disabled">
                                                                        <label><input type="checkbox" name="check_autismo" value="" id="check_autismo">Autismo</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="checkbox">
                                                                        <label><input type="checkbox" name="check_leng" value="" id="check_leng">Trastornos del lenguaje</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <label><input type="checkbox" name="check_apr" value="" id="check_apr">Trastornos del aprendizaje</label>
                                                                    </div>
                                                                    <div class="checkbox disabled">
                                                                        <label><input type="checkbox" name="check_visuales" value="" id="check_visuales">Trastornos visuales</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <label><input type="checkbox" name="check_aud" value="" id="check_aud">Trastornos auditivos</label>
                                                                    </div>
                                                                    <div class="checkbox disabled">
                                                                        <label><input type="checkbox" name="check_autismo" value="" id="check_autismo">Trastornos psiquiátricos</label>
                                                                    </div>
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
                <div class="modal-custom">
                    <div class='modal fade' id='confirmation' tabindex='-1'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
                                    <h3 class='modal-title' id='myModalLabel'>Confirmación</h3>
                                </div>
                                <div class='modal-body'>
                                    <h5>Ya ha completado la ficha de evaluación inicial de Fonoaudiología. Favor de verificar que los datos que ingresó son los correctos. <br>
                                        Para guardar pulse el botón Registrar. Si desea realizar un cambio, pulse el botón Volver.</h5>
                                    <hr>
                                </div>
                                <div class='modal-footer'>
                                    <button class='btn btn-default' data-dismiss='modal' type='button'>Volver</button>
                                    <button class='btn btn-success' type='button' onclick="enviarFormulario()">Registrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    /**
                     * Envia el formulario cuando ya fueron revisados todos los datos
                     */
                    function enviarFormulario(){

                        $('#formulario_registro').submit();
                    }
                </script>
            </div>
        </section>
    </div>
@endsection
