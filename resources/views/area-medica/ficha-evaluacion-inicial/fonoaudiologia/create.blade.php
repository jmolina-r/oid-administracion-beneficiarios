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
    <script src="{{ asset('/js/area-medica/FormularioFonoaudiologia.js') }}" type="text/javascript"></script>

    <!-- / END - validaciones-->

    <!-- / START - Handler step2 y 3-->
    <script src="{{ asset("/js/area-medica/postFichaFono.js") }}" type="text/javascript"></script>

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
                                        <span>Evaluación Inicial Fonoaudiologia: {{$persona->nombreCompleto()}}</span>
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
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="motivo_consulta">Motivo consulta</label>
                                                                <div class="controls">
                                                                    <textarea name="motivo_consulta" class='form-control' data-char-allowed='200' data-char-warning='10' placeholder='Motivo Consulta' rows='3' style='margin-bottom:10px;' value="{{ old('motivo_consulta') }}" id="motivo_consulta" maxlength="200"></textarea>
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes Familiares (¿Con quién vive?)</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="col-md-2 ">
                                                                    <h4>Nombre</h4>
                                                                </div>
                                                                <div class="col-md-2 ">
                                                                    <h4>Parentesco</h4>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <h4>Edad</h4>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <h4>Escolaridad</h4>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <h4>Ocupación</h4>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="nombre1" name="nombre1" value="{{ old('nombre1') }}"  placeholder="Nombre" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="parentesco1" name="parentesco1" value="{{ old('parentesco1') }}"  placeholder="Parentesco" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="edad1" name="edad1" value="{{ old('edad1') }}"  placeholder="Edad" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="escolaridad1" name="escolaridad1" value="{{ old('escolaridad1') }}"  placeholder="Escolaridad" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="ocupacion1" name="ocupacion1" value="{{ old('ocupacion1') }}"  placeholder="Ocupación" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="nombre2" name="nombre2" value="{{ old('nombre2') }}"  placeholder="Nombre" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="parentesco2" name="parentesco2" value="{{ old('parentesco2') }}"  placeholder="Parentesco" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="edad2" name="edad2" value="{{ old('edad2') }}"  placeholder="Edad" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="escolaridad2" name="escolaridad2" value="{{ old('escolaridad2') }}"  placeholder="Escolaridad" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="ocupacion2" name="ocupacion2" value="{{ old('ocupacion2') }}"  placeholder="Ocupación" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="nombre3" name="nombre3" value="{{ old('nombre3') }}"  placeholder="Nombre" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="parentesco3" name="parentesco3" value="{{ old('parentesco3') }}"  placeholder="Parentesco" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="edad3" name="edad3" value="{{ old('edad3') }}"  placeholder="Edad" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="escolaridad3" name="escolaridad3" value="{{ old('escolaridad3') }}"  placeholder="Escolaridad" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="ocupacion3" name="ocupacion3" value="{{ old('ocupacion3') }}"  placeholder="Ocupación" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="nombre4" name="nombre4" value="{{ old('nombre4') }}"  placeholder="Nombre" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="parentesco4" name="parentesco4" value="{{ old('parentesco4') }}"  placeholder="Parentesco" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="edad4" name="edad4" value="{{ old('edad4') }}"  placeholder="Edad" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="escolaridad4" name="escolaridad4" value="{{ old('escolaridad4') }}"  placeholder="Escolaridad" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="ocupacion4" name="ocupacion4" value="{{ old('ocupacion4') }}"  placeholder="Ocupación" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="nombre5" name="nombre5" value="{{ old('nombre5') }}"  placeholder="Nombre" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="parentesco5" name="parentesco5" value="{{ old('parentesco5') }}"  placeholder="Parentesco" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="edad5" name="edad5" value="{{ old('edad5') }}"  placeholder="Edad" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="escolaridad5" name="escolaridad5" value="{{ old('escolaridad5') }}"  placeholder="Escolaridad" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="ocupacion5" name="ocupacion5" value="{{ old('ocupacion5') }}"  placeholder="Ocupación" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="nombre6" name="nombre6" value="{{ old('nombre6') }}"  placeholder="Nombre" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="parentesco6" name="parentesco6" value="{{ old('parentesco6') }}"  placeholder="Parentesco" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="edad6" name="edad6" value="{{ old('edad6') }}"  placeholder="Edad" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="escolaridad6" name="escolaridad6" value="{{ old('escolaridad6') }}"  placeholder="Escolaridad" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div class="col-md-2 controls">
                                                                        <input class="form-control" id="ocupacion6" name="ocupacion6" value="{{ old('ocupacion6') }}"  placeholder="Ocupación" type="text">
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label class="col-md-3 control-label" for="observaciones_parientes">Observaciones</label>

                                                                    <div class="col-md-12 form-group">
                                                                        <div class="col-md-8 controls">
                                                                            <textarea class="form-control" rows="4" name="observaciones_parientes" id="observaciones_parientes"placeholder="Observaciones"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!-- STEP 2 -->
                                                        <div class='step-pane active' data-step='2'>
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes Prenatales</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="plan_embarazo">Planificación de embarazo</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="plan_embarazo" name="plan_embarazo" value="{{ old('plan_embarazo') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="acept_embarazo">Aceptación del embarazo</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="acept_embarazo" name="acept_embarazo" value="{{ old('acept_embarazo') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="control_embarazo">Control de embarazo</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="control_embarazo" name="control_embarazo" value="{{ old('control_embarazo') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="ingesta_med">Ingesta de medicamentos</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="ingesta_med" name="ingesta_med" value="{{ old('ingesta_med') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="ingesta_oh_drogas">Ingesta de alcohol/drogas</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="ingesta_oh_drogas" name="ingesta_oh_drogas" value="{{ old('ingesta_oh_drogas') }}"  placeholder="">
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
                                                                    <input class="form-control" id="enfermedades_embarazo" name="enfermedades_embarazo" value="{{ old('enfermedades_embarazo') }}"  placeholder="Rubeola/Diabetes/Enf.Renal/Hipertensión/Nutricionales/Traumatismos/Venéreas/Infecciosas/Otros">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="col-md-4 control-label"for="otros_prenatales">Otros:</label>
                                                                <div class="col-md-8 controls">
                                                                    <textarea class="form-control" rows="4" name="otros_prenatales" id="otros_prenatales"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 3 -->
                                                        <div class='step-pane active' data-step='3'>
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes Perinatales</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="tipo_parto">Tipo de parto</label>
                                                                <div class="col-md-8 control-label">
                                                                    <input class="form-control" id="tipo_parto" name="tipo_parto" value="{{ old('tipo_parto') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="suf_fetal">Sufrimiento fetal</label>
                                                                <div class="col-md-8 control-label">
                                                                    <input class="form-control" id="suf_fetal" name="suf_fetal" value="{{ old('suf_fetal') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="edad_gest">Edad gestacional</label>
                                                                <div class="col-md-8 control-label">
                                                                    <input class="form-control" id="edad_gest" name="edad_gest" value="{{ old('edad_gest') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="lugar_naci">Lugar de nacimiento</label>
                                                                <div class="col-md-8 control-label">
                                                                    <input class="form-control" id="lugar_naci" name="lugar_naci" value="{{ old('lugar_naci') }}"  placeholder="">
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
                                                                <label class="col-md-4 control-label" for="comp_parto">Complicaciones durante el parto</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="comp_parto" name="comp_parto" value="{{ old('comp_parto') }}"  placeholder="Asfixia perinatal/Neumonía por infecciones/Traumatismos/Otros">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="hospitalizaciones">Hospitalizaciones (¿Por qué?)</label>
                                                                <div class="col-md-8 control-label">
                                                                    <textarea class="form-control" rows="3" id="hospitalizaciones"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label"for="otros_perinatales">Otros:</label>
                                                                <div class="col-md-8 control-label">
                                                                    <textarea class="form-control" rows="3" id="otros_perinatales"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 4 -->
                                                        <div class='step-pane active' data-step='4'>
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes Postnatales</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="trat_post_parto">Tratamientos posteriores al parto:</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" id="trat_post_parto" name="trat_post_parto" value="{{ old('trat_post_parto') }}"  placeholder="Cianosis/Iectericia/Infecciones/Traumatismos/Cardiacas/Malformaciones/Síndromes">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="tipo_alimenta">Tipo de alimentación</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" id="tipo_alimenta" name="tipo_alimenta" value="{{ old('tipo_alimenta') }}"  placeholder="Lactancia materna ¿Hasta qué edad?/Relleno/Mixta">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="limite_edad_alimenta">¿Hasta qué edad duró la lactancia?</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" id="limite_edad_alimenta" name="edad_lactancia" value="{{ old('limite_edad_alimenta') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="operaciones_edad">Operaciones (edad):</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" id="operaciones_edad" name="operaciones_edad" value="{{ old('operaciones_edad') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="hospitalizaciones_edad">Hospitalizaciones (edad):</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" id="hospitalizaciones_edad" name="hospitalizaciones_edad" value="{{ old('hospitalizaciones_edad') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="observaciones_postnatales">Observaciones:</label>
                                                                <textarea class="form-control" rows="3" id="observaciones_postnatales"></textarea>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 5 -->
                                                        <div class="step-pane active" data-step="5">
                                                            <div class="col-md-12">
                                                                <h3>Desarrollo Psicomotor (¿A qué edad?)</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="control_cabeza">Control cabeza</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="control_cabeza" name="control_cabeza" value="{{ old('control_cabeza') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="sento">Se sentó</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="sento" name="sento" value="{{ old('sento') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="gateo">Gateó</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="gateo" name="gateo" value="{{ old('gateo') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="paro">Se paró</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="paro" name="paro" value="{{ old('paro') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="camino">Caminó</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="camino" name="camino" value="{{ old('camino') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="control_esf_diurno">Control esfínter diurno</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="control_esf_diurno" name="control_esf_diurno" value="{{ old('control_esf_diurno') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="control_esf_nocturno">Control esfínter nocturno</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="control_esf_nocturno" name="control_esf_nocturno" value="{{ old('control_esf_nocturno') }}"  placeholder="">
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
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="balbuceo" name="balbuceo" value="{{ old('balbuceo') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="sonrio">Sonrió</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="sonrio" name="sonrio" value="{{ old('sonrio') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="primeras_palabras">Dijo sus primeras palabras</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="primeras_palabras" name="primeras_palabras" value="{{ old('primeras_palabras') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="frases_dos_palabras">Dijo frases de 2 palabras</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="frases_dos_palabras" name="frases_dos_palabras" value="{{ old('frases_dos_palabras') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="oraciones">Dijo oraciones</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="oraciones" name="oraciones" value="{{ old('oraciones') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="hablo_espo">Habló espontáneamente</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="hablo_espo" name="hablo_espo" value="{{ old('hablo_espo') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="siguio_inst">Siguió instrucciones</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="siguio_inst" name="siguio_inst" value="{{ old('siguio_inst') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <br/>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="mira_ojos">¿El niño (a) mira a los ojos cuando usted lo habla?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="mira_ojos" name="mira_ojos" value="{{ old('mira_ojos') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="mira_labios">¿El niño (a) mira a los labios cuando habla?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="mira_labios" name="mira_labios" value="{{ old('mira_labios') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group" for="comunica_palabras">
                                                                <label class="col-md-3">¿Intenta comunicarse con palabras?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="comunica_palabras" name="comunica_palabras" value="{{ old('comunica_palabras') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group" for="comunica_jergas">
                                                                <label class="col-md-3">¿Se comunica con jerga?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="comunica_jergas" name="comunica_jergas" value="{{ old('comunica_jergas') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group" for="comunica_palabras_sueltas">
                                                                <label class="col-md-3">¿Se comunica con palabras sueltas?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="comunica_palabras_sueltas" name="comunica_palabras_sueltas" value="{{ old('comunica_palabras_sueltas') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group" for="comunica_gestos">
                                                                <label class="col-md-3">¿Se comunica a través de gestos?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="comunica_gestos" name="comunica_gestos" value="{{ old('comunica_gestos') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group" for="entiende_dice">
                                                                <label class="col-md-3">¿Usted entiende lo que dice?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="entiende_dice" name="entiende_dice" value="{{ old('entiende_dice') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group" for="desconocidos_entienden">
                                                                <label class="col-md-3">¿Las personas que no lo conocen entienden lo que dice?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="desconocidos_entienden" name="desconocidos_entienden" value="{{ old('desconocidos_entienden') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 7 -->
                                                        <div class="step-pane active" data-step="7">
                                                            <div class="col-md-12">
                                                                <h3>Desarrollo Social</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="respeta_normas">Respeta normas</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="respeta_normas" name="respeta_normas" value="{{ old('respeta_normas') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group"for="comparte_juguetes">
                                                                <label class="col-md-3">Comparte juguetes</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="comparte_juguetes" name="comparte_juguetes" value="{{ old('comparte_juguetes') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group"for="juega_otros">
                                                                <label class="col-md-3">Juega con otros niños</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="juega_otros" name="juega_otros" value="{{ old('juega_otros') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group"for="carinoso">
                                                                <label class="col-md-3">Cariñoso</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="carinoso" name="carinoso" value="{{ old('carinoso') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group"for="berrinches">
                                                                <label class="col-md-3">Hace berrinches</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="berrinches" name="berrinches" value="{{ old('berrinches') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group"for="frustra_facil">
                                                                <label class="col-md-3">Se frustra con facilidad</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="frustra_facil" name="frustra_facil" value="{{ old('frustra_facil') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group"for="irritable">
                                                                <label class="col-md-3">Irritable</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="irritable" name="irritable" value="{{ old('irritable') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group"for="agresivo">
                                                                <label class="col-md-3">Agresivo</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="agresivo" name="agresivo" value="{{ old('agresivo') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group"for="peleador">
                                                                <label class="col-md-3">Peleador</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="peleador" name="peleador" value="{{ old('peleador') }}"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="intereses">Intereses:</label>
                                                                <div class="col-md-6">
                                                                    <textarea class="form-control" rows="3" id="intereses"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="observaciones_social"for="observaciones_social">Observaciones:</label>
                                                                <div class="col-md-6">
                                                                    <textarea class="form-control" rows="3" id="observaciones_social"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 8 -->
                                                        <div class="step-pane active" data-step="8">
                                                            <div class="col-md-12">
                                                                <h3>Hábitos</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="mamadera">¿Usa mamadera?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="mamadera" name="mamadera" value="{{ old('mamadera') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="chupete">¿Usa chupete?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="chupete" name="chupete" value="{{ old('chupete') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="chupa_dedo">¿Se chupa el dedo?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="chupa_dedo" name="chupa_dedo" value="{{ old('chupa_dedo') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="come_solo_tipo">¿Come solo?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="come_solo_tipo" name="come_solo_tipo" value="{{ old('come_solo_tipo') }}"  placeholder="Si/No/Tipo de comida">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="viste_solo">¿Se viste solo?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="viste_solo" name="viste_solo" value="{{ old('viste_solo') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="boca_abierta_dia">¿Permanece con la boca abierta durante el día?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="boca_abierta_dia" name="boca_abierta_dia" value="{{ old('boca_abierta_dia') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="boca_abierta_noche">¿Permanece con la boca abierta durante la noche?</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="boca_abierta_noche" name="boca_abierta_noche" value="{{ old('boca_abierta_noche') }}"  placeholder="Si/No">
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
                                                                <label class="col-md-3"for="alergias_sn">Alergias</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="alergias_sn" name="alergias_sn" value="{{ old('alergias_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="alergias_desc" name="alergias_desc" value="{{ old('alergias_desc') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="otitis_sn">Otitis</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="otitis_sn" name="otitis_sn" value="{{ old('otitis_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="otitis_desc" name="otitis_desc" value="{{ old('otitis_desc') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="obesidad_sn">Obesidad</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="obesidad_sn" name="obesidad_sn" value="{{ old('obesidad_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="obesidad_desc" name="obesidad_desc" value="{{ old('obesidad_desc') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="diabetes_sn">Diabetes</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="diabetes_sn" name="diabetes_sn" value="{{ old('diabetes_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="diabetes_desc" name="diabetes_desc" value="{{ old('diabetes_desc') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="cirugias_sn">Cirugías</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="cirugias_sn" name="cirugias_sn" value="{{ old('cirugias_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="cirugias_desc" name="cirugias_desc" value="{{ old('cirugias_desc') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="traumatis_sn">Traumatismos</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="traumatis_sn" name="traumatis_sn" value="{{ old('traumatis_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="traumatis_desc" name="traumatis_desc" value="{{ old('traumatis_desc') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="epilepsia_sn">Epilepsia</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="epilepsia_sn" name="epilepsia_sn" value="{{ old('epilepsia_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="epilepsia_desc" name="epilepsia_desc" value="{{ old('epilepsia_desc') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="deficit_visual_sn">Déficit visual</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="deficit_visual_sn" name="deficit_visual_sn" value="{{ old('deficit_visual_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="deficit_visual_desc" name="deficit_visual_desc" value="{{ old('deficit_visual_desc') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="deficit_auditivo_sn">Déficit auditivo</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="deficit_auditivo_sn" name="deficit_auditivo_sn" value="{{ old('deficit_auditivo_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="deficit_auditivo_desc" name="deficit_auditivo_desc" value="{{ old('deficit_auditivo_desc') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="paralisis_cerebral_sn">Parálisis cerebral</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="paralisis_cerebral_sn" name="paralisis_cerebral_sn" value="{{ old('paralisis_cerebral_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="paralisis_cerebral_desc" name="paralisis_cerebral_desc" value="{{ old('paralisis_cerebral_desc') }}"  placeholder="Descripción y tratamiento">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="otros_morbidos">Otros:</label>
                                                                <div class="col-md-6">
                                                                    <textarea class="form-control" rows="3" id="otros_morbidos"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 10-->
                                                        <div class="step-pane active" data-step="10">
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes mórbidos familiares</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="diabetes_sn_mor_fa">Diabetes</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="diabetes_sn_mor_fa" name="diabetes_sn_mor_fa" value="{{ old('diabetes_sn_mor_fa') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="hipertension_sn">Hipertensión</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="hipertension_sn" name="hipertension_sn" value="{{ old('hipertension_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="epilepsia_sn_mor_fa">Epilepsia</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="epilepsia_sn_mor_fa" name="epilepsia_sn_mor_fa" value="{{ old('epilepsia_sn_mor_fa') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="deficiencia_mental_sn">Deficiencia Mental</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="deficiencia_mental_sn" name="deficiencia_mental_sn" value="{{ old('deficiencia_mental_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="autismo_sn">Autismo</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="autismo_sn" name="autismo_sn" value="{{ old('autismo_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="trast_lenguaje_sn">Trastornos del Lenguaje</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="trast_lenguaje_sn" name="trast_lenguaje_sn" value="{{ old('trast_lenguaje_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="trast_aprendizaje_sn">Trastornos de aprendizaje</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="trast_aprendizaje_sn" name="trast_aprendizaje_sn" value="{{ old('trast_aprendizaje_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="trast_visuales_sn">Trastornos visuales</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="trast_visuales_sn" name="trast_visuales_sn" value="{{ old('trast_visuales_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="trast_auditivos_sn">Trastornos auditivos</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="trast_auditivos_sn" name="trast_auditivos_sn" value="{{ old('trast_auditivos_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3"for="trast_psiquiatricos_sn">Trastornos psiquiátricos</label>
                                                                <div class="col-md-3">
                                                                    <input class="form-control" id="trast_psiquiatricos_sn" name="trast_psiquiatricos_sn" value="{{ old('trast_psiquiatricos_sn') }}"  placeholder="Si/No">
                                                                </div>
                                                            </div>
                                                             <div class="controls">
                                                                <label>Observaciones</label>
                                                                <textarea name="observaciones"
                                                                          class='form-control'
                                                                          data-char-allowed='200'
                                                                          data-char-warning='10'
                                                                          rows='15'
                                                                          style='margin-bottom:10px;'
                                                                          value="{{ old('observaciones') }}"
                                                                          id="observaciones"
                                                                          maxlength="10000"></textarea>
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
