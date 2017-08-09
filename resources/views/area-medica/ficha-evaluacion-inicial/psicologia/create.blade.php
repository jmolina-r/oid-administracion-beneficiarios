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
    <script src="{{ asset('/js/area-medica/FormularioPsicologia.js') }}" type="text/javascript"></script>
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
                                        <span>Evaluación Inicial Psicología</span>
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
                                                <form role="form" id="formulario_registro" action="{{route('area-medica.ficha-evaluacion-inicial.psicologia.store')}}" accept-charset="UTF-8" style="margin-bottom: 0;" method="post">
                                                    <div class='step-content'>
                                                        <!-- STEP 1 -->
                                                        <div class='step-pane active' data-step='1'>
                                                            <input id="id" name="id" type="hidden" value="{{$id}}">
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes Medicos</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="enfermedades_familiares">Enfermedades Familiares (Psiquiátricas, neurológicas, cognitivas, físicas, etc.)</label>
                                                                <div class="controls">
                                                                    <textarea name="enfermedades_familiares" class='form-control' data-char-allowed='200' data-char-warning='10' placeholder='Enfermedades Familiares (Psiquiátricas, neurológicas, cognitivas, físicas, etc.)' rows='3' style='margin-bottom:10px;' value="{{ old('enfermedades_familiares') }}" id="inputDiagnostico" maxlength="200"></textarea>
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="medicamentos">Medicamentos</label>
                                                                <div class="controls">
                                                                    <textarea name="medicamentos" class='form-control' data-char-allowed='200' data-char-warning='10' placeholder='Medicamentos' rows='3' style='margin-bottom:10px;' value="{{ old('medicamentos') }}" id="inputDiagnostico" maxlength="200"></textarea>
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h4>Tratamiento con especialistas</h4>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="col-md-3 col-md-offset-3">
                                                                    <h4>Nombre</h4>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h4>Sesiones</h4>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="col-md-3 control-label" for="tratamientos_neurologo_nombre">Neurólogo</label>
                                                                    <div class="col-md-3 controls">
                                                                        <input class="form-control onlyletters" id="nombre" name="tratamientos_neurologo_nombre" value="{{ old('tratamientos_neurologo_nombre') }}"  placeholder="Nombre" type="text" maxlength="200">
                                                                    </div>
                                                                    <div class="col-md-6 controls">
                                                                        <input class="form-control" id="sesiones" name="tratamientos_neurologo_sesiones" value="{{ old('tratamientos_neurologo_sesiones') }}"  placeholder="Sesiones" type="text" maxlength="200">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="col-md-3 control-label" for="tratamientos_psiquiatra_nombre">Psiquiatra</label>
                                                                    <div class="col-md-3 controls">
                                                                        <input class="form-control onlyletters" id="nombre" name="tratamientos_psiquiatra_nombre" value="{{ old('tratamientos_psiquiatra_nombre') }}"  placeholder="Nombre" type="text" maxlength="200">
                                                                    </div>
                                                                    <div class="col-md-6 controls">
                                                                        <input class="form-control" id="sesiones" name="tratamientos_psiquiatra_sesiones" value="{{ old('tratamientos_psiquiatra_sesiones') }}"  placeholder="Sesiones" type="text" maxlength="200">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="col-md-3 control-label" for="tratamientos_fonoaudiologo_nombre">Fonoaudiólogo</label>
                                                                    <div class="col-md-3 controls">
                                                                        <input class="form-control onlyletters" id="nombre" name="tratamientos_fonoaudiologo_nombre" value="{{ old('tratamientos_fonoaudiologo_nombre') }}"  placeholder="Nombre" type="text" maxlength="200">
                                                                    </div>
                                                                    <div class="col-md-6 controls">
                                                                        <input class="form-control" id="sesiones" name="tratamientos_fonoaudiologo_sesiones" value="{{ old('tratamientos_fonoaudiologo_sesiones') }}"  placeholder="Sesiones" type="text" maxlength="200">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="col-md-3 control-label" for="tratamientos_ocupacional_nombre">Terapeuta Ocupacional</label>
                                                                    <div class="col-md-3 controls">
                                                                        <input class="form-control onlyletters" id="nombre" name="tratamientos_ocupacional_nombre" value="{{ old('tratamientos_ocupacional_nombre') }}"  placeholder="Nombre" type="text" maxlength="200">
                                                                    </div>
                                                                    <div class="col-md-6 controls">
                                                                        <input class="form-control" id="sesiones" name="tratamientos_ocupacional_sesiones" value="{{ old('tratamientos_ocupacional_sesiones') }}"  placeholder="Sesiones" type="text" maxlength="200">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="col-md-3 control-label" for="tratamientos_neurologo_nombre">Kinesiólogo</label>
                                                                    <div class="col-md-3 controls">
                                                                        <input class="form-control onlyletters" id="nombre" name="tratamientos_kinesiologo_nombre" value="{{ old('tratamientos_kinesiologo_nombre') }}"  placeholder="Nombre" type="text" maxlength="200">
                                                                    </div>
                                                                    <div class="col-md-6 controls">
                                                                        <input class="form-control" id="sesiones" name="tratamientos_kinesiologo_sesiones" value="{{ old('tratamientos_kinesiologo_sesiones') }}"  placeholder="Sesiones" type="text" maxlength="200">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="col-md-3 control-label" for="tratamientos_psicologo_nombre">Psicólogo</label>
                                                                    <div class="col-md-3 controls">
                                                                        <input class="form-control onlyletters" id="nombre" name="tratamientos_psicologo_nombre" value="{{ old('tratamientos_psicologo_nombre') }}"  placeholder="Nombre" type="text" maxlength="200">
                                                                    </div>
                                                                    <div class="col-md-6 controls">
                                                                        <input class="form-control" id="sesiones" name="tratamientos_psicologo_sesiones" value="{{ old('tratamientos_psicologo_sesiones') }}"  placeholder="Sesiones" type="text" maxlength="200">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 2 -->
                                                        <div class='step-pane active' data-step='2'>
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes Familiares: Madre</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <label class="control-label" for="nombre_madre">Nombre</label>
                                                                <div class="controls">
                                                                    <input class="form-control onlyletters" name="nombre_madre" value="{{ old('nombre_madre') }}"  placeholder="Nombre" type="text" maxlength="200" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label class="control-label" for="edad_madre">Edad</label>
                                                                <div class="controls">
                                                                    <input class="form-control onlynumbers" name="edad_madre" value="{{ old('edad_madre') }}"  placeholder="Edad" type="text" maxlength="3" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <label class="control-label" for="rut_madre">RUT</label>
                                                                <div class="controls">
                                                                    <input class="form-control onlyrut" name="rut_madre" value="{{ old('rut_madre') }}"  placeholder="RUT" type="text" maxlength="15" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label class="control-label" for="fecha_nacimiento_madre">Fecha de Nacimiento</label>
                                                                <div class='input-group' id='fecha_nacimiento'>
                                                                    <input class="form-control" data-format='DD/MM/YYYY' name="fecha_nacimiento_madre" value="{{ old('fecha_nacimiento_madre') }}"  placeholder="Fecha de Nacimiento" type="text" maxlength="50" >
                                                                    <span class='input-group-addon'>
                                                                        <span class='fa fa-calendar'></span>
                                                                    </span>
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <label class="control-label" for="escolaridad_madre">Escolaridad</label>
                                                                <div class="controls">
                                                                    <input class="form-control" name="escolaridad_madre" value="{{ old('escolaridad_madre') }}"  placeholder="Escolaridad" type="text" maxlength="200" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label class="control-label" for="telefono_madre">Telefono</label>
                                                                <div class="controls">
                                                                    <input class="form-control onlynumbers" name="telefono_madre" value="{{ old('telefono_madre') }}"  placeholder="Telefono" type="text" maxlength="12" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="ocupacion_madre">Ocupación</label>
                                                                <div class="controls">
                                                                    <input class="form-control" name="ocupacion_madre" value="{{ old('ocupacion_madre') }}"  placeholder="Ocupación" type="text" maxlength="200" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="observaciones_madre">Observaciones</label>
                                                                <div class="controls">
                                                                    <input class="form-control" name="observaciones_madre" value="{{ old('observaciones_madre') }}"  placeholder="Observaciones" type="text" maxlength="200" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 3 -->
                                                        <div class='step-pane active' data-step='3'>
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes Familiares: Padre</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <label class="control-label" for="nombre_padre">Nombre</label>
                                                                <div class="controls">
                                                                    <input class="form-control onlyletters" name="nombre_padre" value="{{ old('nombre_padre') }}"  placeholder="Nombre" type="text" maxlength="200" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label class="control-label" for="edad_padre">Edad</label>
                                                                <div class="controls">
                                                                    <input class="form-control onlynumbers" name="edad_padre" value="{{ old('edad_padre') }}"  placeholder="Edad" type="text" maxlength="3" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <label class="control-label" for="rut_padre">RUT</label>
                                                                <div class="controls">
                                                                    <input class="form-control onlyrut" name="rut_padre" value="{{ old('rut_padre') }}"  placeholder="RUT" type="text" maxlength="15" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label class="control-label" for="fecha_nacimiento_padre">Fecha de Nacimiento</label>
                                                                <div class='input-group' id='fecha_nacimiento2'>
                                                                    <input class="form-control" data-format='DD/MM/YYYY' name="fecha_nacimiento_padre" value="{{ old('fecha_nacimiento_padre') }}"  placeholder="Fecha de Nacimiento" type="text" maxlength="50" >
                                                                    <span class='input-group-addon'>
                                                                        <span class='fa fa-calendar'></span>
                                                                    </span>
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <label class="control-label" for="escolaridad_padre">Escolaridad</label>
                                                                <div class="controls">
                                                                    <input class="form-control" name="escolaridad_padre" value="{{ old('escolaridad_padre') }}"  placeholder="Escolaridad" type="text" maxlength="200" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label class="control-label" for="telefono_padre">Telefono</label>
                                                                <div class="controls">
                                                                    <input class="form-control onlynumbers" name="telefono_padre" value="{{ old('telefono_padre') }}"  placeholder="Telefono" type="text" maxlength="12" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="ocupacion_padre">Ocupación</label>
                                                                <div class="controls">
                                                                    <input class="form-control" name="ocupacion_padre" value="{{ old('ocupacion_padre') }}"  placeholder="Ocupación" type="text" maxlength="200" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="observaciones_padre">Observaciones</label>
                                                                <div class="controls">
                                                                    <input class="form-control" name="observaciones_padre" value="{{ old('observaciones_padre') }}"  placeholder="Observaciones" type="text" maxlength="200" >
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 4 -->
                                                        <div class='step-pane active' data-step='4'>
                                                            <div class="col-md-4">
                                                                <h3>Genograma</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-8 controls">
                                                                <input type="file" name="genograma" ></input>
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
                                    <h5>Ya ha completado la ficha de evaluación inicial de Psicología. Favor de verificar que los datos que ingresó son los correctos. <br>
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
