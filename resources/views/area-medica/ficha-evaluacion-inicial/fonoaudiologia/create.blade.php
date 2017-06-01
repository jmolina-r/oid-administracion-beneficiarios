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
    <script src="{{ asset("/js/area-medica/IngresoFormulario.js") }}" type="text/javascript"></script>
    <!-- / END - validaciones-->

    <!-- / START - Handler agregar parientes-->
    <script src="{{ asset("/js/area-medica/AgregarPariente.js") }}" type="text/javascript"></script>
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
                                                <form role="form" id="formulario-registro" action="{{route('area-medica.ficha-evaluacion-inicial.kinesiologia.store')}}" accept-charset="UTF-8" style="margin-bottom: 0;" method="post">
                                                    <div class='step-content'>
                                                        <!-- STEP 1 -->
                                                        <div class='step-pane active' data-step='1'>
                                                            <input id="id" name="id" type="hidden" value="{{$id}}">
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes familiares (¿Con quién vive?)</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="nombre">Nombre</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}"  placeholder="Nombre" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="parentesco">Parentesco</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="parentesco" name="parentesco" value="{{ old('parentesco') }}"  placeholder="Parentesco" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="edad">Edad</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="edad" name="edad" value="{{ old('edad') }}"  placeholder="Edad" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="escolaridad">Escolaridad</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="escolaridad" name="escolaridad" value="{{ old('escolaridad') }}"  placeholder="Escolaridad" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="ocupacion">Ocupación</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="ocupacion" name="ocupacion" value="{{ old('ocupacion') }}"  placeholder="Ocupación" type="text">
                                                                </div>
                                                            </div>
                                                            <button id="boton-agregar-pariente" type="button" class="btn btn-primary enabled">
                                                                Agregar
                                                            </button>
                                                            <table class="table table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nombre</th>
                                                                    <th>Parentesco</th>
                                                                    <th>Edad</th>
                                                                    <th>Escolaridad</th>
                                                                    <th>Ocupación</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- STEP 2 -->
                                                        <div class='step-pane active' data-step='2'>
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes prenatales</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="situacion_familiar">2. Antecedentes prenatales</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="situacion_familiar" name="situacion_familiar" value="{{ old('situacion_familiar') }}"  placeholder="¿con quien?¿accesibilidad?">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="situacion_laboral">2. Situación Laboral</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="situacion_laboral" name="situacion_laboral" value="{{ old('situacion_laboral') }}"  placeholder="Situación Laboral">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="asiste_centro_rhb">3. ¿Asiste algún centro de RHB?</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="asiste_centro_rhb" name="asiste_centro_rhb" value="{{ old('asiste_centro_rhb') }}"  placeholder="¿Asiste algún centro de RHB?">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="motivo_consulta">4. Motivo de Consulta</label>
                                                                <div class="col-md-8 controls">
                                                                    <input class="form-control" id="motivo_consulta" name="motivo_consulta" value="{{ old('motivo_consulta') }}"  placeholder="Motivo de Consulta">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 3 -->
                                                        <div class='step-pane active' data-step='3'>
                                                            <div class="col-md-12">
                                                                <h3>Escala de Valoración Funcional</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="col-md-4">
                                                                    <h4>Categoría</h4>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <h4>Puntaje</h4>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h4>Comentarios</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5>Autocuidado</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_alimentacion">1. Alimentación</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_alimentacion" name="puntaje_alimentacion" value="{{ old('puntaje_alimentacion') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_alimentacion" name="coment_alimentacion" value="{{ old('coment_alimentacion') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label " for="puntaje_arreglo_pers">2. Arreglo Personal</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_arreglo_pers" name="puntaje_arreglo_pers" value="{{ old('puntaje_arreglo_pers') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_arreglo_pers" name="coment_arreglo_pers" value="{{ old('coment_arreglo_pers') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_bano">3. Baño</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_bano" name="puntaje_bano" value="{{ old('puntaje_bano') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_bano" name="coment_bano" value="{{ old('coment_bano') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_vest_sup">4. Vestuario Superior</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_vest_sup" name="puntaje_vest_sup" value="{{ old('puntaje_vest_sup') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_vest_sup" name="coment_vest_sup" value="{{ old('coment_vest_sup') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_vest_inf">5. Vestuario Inerior</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_vest_inf" name="puntaje_vest_inf" value="{{ old('puntaje_vest_inf') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_vest_inf" name="coment_vest_inf" value="{{ old('coment_vest_inf') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_aseo_pers">6. Aseo Personal</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_aseo_pers" name="puntaje_aseo_pers" value="{{ old('puntaje_aseo_pers') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_aseo_pers" name="coment_aseo_pers" value="{{ old('coment_aseo_pers') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5>Control de Esfinteres</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_control_vejiga">1. Control de Vejiga</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_control_vejiga" name="puntaje_control_vejiga" value="{{ old('puntaje_control_vejiga') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_control_vejiga" name="coment_contrl_vejiga" value="{{ old('coment_contrl_vejiga') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_control_intestino">2. Control de Instestino</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_control_intestino" name="puntaje_control_intestino" value="{{ old('puntaje_control_intestino') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_control_intestino" name="coment_control_intestino" value="{{ old('coment_control_intestino') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5>Movilidad</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_trans_cama_silla">1. Transferencia cama-silla</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_trans_cama_silla" name="puntaje_trans_cama_silla" value="{{ old('puntaje_trans_cama_silla') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_trans_cama_silla" name="coment_trans_cama_silla" value="{{ old('coment_trans_cama_silla') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_traslado_bano">2. Traslado baño</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_traslado_bano" name="puntaje_traslado_bano" value="{{ old('puntaje_traslado_bano') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_traslado_bano" name="coment_traslado_bano" value="{{ old('coment_traslado_bano') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_traslado_ducha">3. Traslado ducha</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_traslado_ducha" name="puntaje_traslado_ducha" value="{{ old('puntaje_traslado_ducha') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_traslado_ducha" name="coment_traslado_ducha" value="{{ old('coment_traslado_ducha') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5>Deambulación</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_desp_caminando">1. Desplazarse caminando/sr</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_desp_caminando" name="puntaje_desp_caminando" value="{{ old('puntaje_desp_caminando') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_desp_caminando" name="coment_desp_caminando" value="{{ old('coment_desp_caminando') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_escaleras">2. Subir y bajar escaleras</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_escaleras" name="puntaje_escaleras" value="{{ old('puntaje_escaleras') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_escaleras" name="coment_escaleras" value="{{ old('coment_escaleras') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5>Comunicación/Cognitivo</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_expresion">1. Expresión</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_expresion" name="puntaje_expresion" value="{{ old('puntaje_expresion') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_expresion" name="coment_expresion" value="{{ old('coment_expresion') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_comprension">2. Comprensión</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_comprension" name="puntaje_comprension" value="{{ old('puntaje_comprension') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_comprension" name="coment_comprension" value="{{ old('coment_comprension') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5>Social</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_int_social">1. Interacción social</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_int_social" name="puntaje_int_social" value="{{ old('puntaje_int_social') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_int_social" name="coment_int_social" value="{{ old('coment_int_social') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label" for="puntaje_sol_problemas">2. Solución de problemas</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_sol_problemas" name="puntaje_sol_problemas" value="{{ old('puntaje_sol_problemas') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_sol_problemas" name="coment_sol_problemas" value="{{ old('coment_sol_problemas') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label" for="puntaje_memoria">3. Memoria</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers" id="puntaje_memoria" name="puntaje_memoria" value="{{ old('puntaje_memoria') }}"  placeholder="Puntuación" type="text">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_memoria" name="coment_memoria" value="{{ old('coment_memoria') }}"  placeholder="Comentario" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 4 -->
                                                        <div class='step-pane active' data-step='4'>
                                                            <div class="col-md-12">
                                                                <h3>Evaluación</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="conexion_medio">1. Conexión con el medio</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="conexion_medio" name="conexion_medio" value="{{ old('conexion_medio') }}"  placeholder="Conexión con el medio" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="nivel_cognitivo_apar">2. Nivel cognitivo aparente</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="nivel_cognitivo_apar" name="nivel_cognitivo_apar" value="{{ old('nivel_cognitivo_apar') }}"  placeholder="Nivel cognitivo aparente" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h4>Evaluación Sensorial</h4>
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
                                                            <div class="col-md-12">
                                                                <h4>Evaluación Motora</h4>
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
