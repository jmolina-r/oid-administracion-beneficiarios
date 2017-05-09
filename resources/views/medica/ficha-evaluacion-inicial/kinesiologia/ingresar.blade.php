
<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Ficha Kinesiología - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles_before')
    <link href="{{ asset('/assets/stylesheets/plugins/fuelux/wizard.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('styles')
    <link href="{{ asset('/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href='{{ asset('/assets/images/meta_icons/apple-touch-icon-precomposed.png') }}' rel='apple-touch-icon-precomposed'>
@endsection

<!-- Atributos del body -->
@section('body-attr')
    class='contrast-red'
@endsection

<!-- Inyeccion de scripts
     No importa que vayan antes del body, en el master layout se estan insertando alfinal.
   -->
@section('scripts')
    <!-- / jquery [required] -->
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
    <!-- / START - page related files and scripts [optional] -->
    <script src="{{ asset('/assets/javascripts/plugins/fuelux/wizard.js') }}" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->


    <!-- / START - moments-->
    <script src="{{ asset('/assets/javascripts/plugins/common/moment.min.js') }}" type="text/javascript"></script>
    <!-- / END - moments-->
    <!-- / START - datepicker-->
    <script src="{{ asset('/assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <!-- / END - datepicker-->
    <!-- / START - Validaciones-->
    <script src="{{ asset('/assets/javascripts/plugins/validate/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/validate/additional-methods.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/js/beneficiario/RegistroBeneficiario.js') }}" type="text/javascript"></script>

    <!-- / END - validaciones-->
@endsection

<!-- Contenido del body -->
@section('content')
    <header>
        <nav class='navbar navbar-default'>
            <a class='navbar-brand' href='/principal'>
                <3 OID
            </a>
            <a class='toggle-nav btn pull-left' href='#'>
                <i class='fa fa-bars'></i>
            </a>

        </nav>
    </header>
    <div id='wrapper'>
        <div id='main-nav-bg'></div>
        <nav id='main-nav'>
            <div class='navigation'>
                <div class='search'>
                    <form action='search_results.html' method='get'>
                        <div class='search-wrapper'>
                            <input type="text" name="q" value="" class="search-query form-control" placeholder="Search..." autocomplete="off" />
                            <button class='btn btn-link fa fa-search' name='button' type='submit'></button>
                        </div>
                    </form>
                </div>
                <ul class='nav nav-stacked'>
                    <li class='active'>
                        <a href='/principal'>
                            <i class='fa fa-tachometer'></i>
                            <span>Servicio Administrativo OID</span>
                        </a>
                    </li>
                    <li class=''>
                        <a class="dropdown-collapse" href="#"><i class='fa fa-pencil-square-o'></i>
                            <span>Beneficiarios</span>
                            <i class='fa fa-angle-down angle-down'></i>
                        </a>
                        <ul class='nav nav-stacked'>
                            <li class=''>
                                <a href=''>
                                    <div class='icon'>
                                        <i class='fa fa-caret-right'></i>
                                    </div>
                                    <span>Registro Beneficiario</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- AQUI VA EL NAVBAR  -->
        <section id='content'>
            <div class='container'>
                <div class='row' id='content-wrapper'>
                    <div class='col-xs-12'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='page-header'>
                                    <h1 class='pull-left'>
                                        <i class='fa fa-pencil-square-o'></i>
                                        <span>Evaluación Inicial Kinesiología</span>
                                    </h1>
                                    <div class='pull-right'>
                                        <ul class='breadcrumb'>
                                            <li>
                                                <a href='index.html'>
                                                    <i class='fa fa-bar-chart-o'></i>
                                                </a>
                                            </li>
                                            <li class='separator'>
                                                <i class='fa fa-angle-right'></i>
                                            </li>
                                            <li>
                                                Forms
                                            </li>
                                            <li class='separator'>
                                                <i class='fa fa-angle-right'></i>
                                            </li>
                                            <li class='active'>Wizard</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='box'>
                                    <div class='box-content box-padding'>
                                        <div class='fuelux'><div class='wizard' data-initialize='wizard' id='myWizard'>
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
                                                    </ul>
                                                </div>
                                                <div class='actions'>
                                                    <button class='pull-right btn btn-md btn-success btn-next' data-last='Finish'>
                                                        Continuar
                                                        <i class='fa fa-arrow-right'></i>
                                                    </button>
                                                    <button class='pull-right btn btn-md btn-prev'>
                                                        <i class='fa fa-arrow-left'></i>
                                                        Volver
                                                    </button>
                                                </div>
                                                <hr class='hr-normal'>
                                                <form action="#" accept-charset="UTF-8" class="form" style="margin-bottom: 0;" method="post"><div class='step-content'>
                                                        <!-- STEP 1 -->
                                                        <div class='step-pane active' data-step='1'>
                                                            <div class="col-md-12">
                                                                <h3>Seleccionar Paciente</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='control-label' for='inputText'>Nombre de usuario</label>
                                                                <div class='controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Nombre de usuario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='control-label' for='inputText'>Cédula de identidad</label>
                                                                <div class='controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Cédula de identidad' type='text'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 2 -->
                                                        <div class='step-pane' data-step='2'>
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes Morbidos</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-4 control-label' for='inputText'>1. Patologías Concomitantes</label>
                                                                <div class='col-md-8 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Patologías Concomitantes' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-4 control-label' for='inputText'>2. Alergias</label>
                                                                <div class='col-md-8 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Alergias' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-4 control-label' for='inputText'>3. Medicamentos</label>
                                                                <div class='col-md-8 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Medicamentos' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-4 control-label' for='inputText'>4. Antecedentes Quirúrgicos</label>
                                                                <div class='col-md-8 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Antecedentes Quirúrgicos' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-4 control-label' for='inputText'>5. Aparatos</label>
                                                                <div class='col-md-8 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Aparatos' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-4 control-label' for='inputText'>6. Hábitos</label>
                                                                <div class='col-md-8 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Hábitos' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <div class="col-md-4">
                                                                    <label class='col-md-5 control-label' for='inputText'>¿Fuma?</label>
                                                                    <div class='col-md-7 controls'>
                                                                        <input class='form-control' id='inputText' placeholder='¿Fuma?' type='text'>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class='col-md-5 control-label' for='inputText'>¿Bebe OH?</label>
                                                                    <div class='col-md-7 controls'>
                                                                        <input class='form-control' id='inputText' placeholder='¿Bebe OH?' type='text'>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class='col-md-5 control-label' for='inputText'>Act. física</label>
                                                                    <div class='col-md-7 controls'>
                                                                        <input class='form-control' id='inputText' placeholder='Act. fisica' type='text'>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 3 -->
                                                        <div class='step-pane' data-step='3'>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-4 control-label' for='inputTextArea'>1. Situación Familiar</label>
                                                                <div class='col-md-8 controls'>
                                                                    <textarea class='form-control' id='inputTextArea' placeholder='¿con quien?¿accesibilidad?' rows='3'></textarea>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-4 control-label' for='inputTextArea'>2. Situación Laboral</label>
                                                                <div class='col-md-8 controls'>
                                                                    <textarea class='form-control' id='inputTextArea' placeholder='Situación Laboral' rows='3'></textarea>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-4 control-label' for='inputTextArea'>3. ¿Asiste algún centro de RHB?</label>
                                                                <div class='col-md-8 controls'>
                                                                    <textarea class='form-control' id='inputTextArea' placeholder='¿Asiste algún centro de RHB?' rows='3'></textarea>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-4 control-label' for='inputTextArea'>4. Motivo de Consulta</label>
                                                                <div class='col-md-8 controls'>
                                                                    <textarea class='form-control' id='inputTextArea' placeholder='Motivo de Consulta' rows='3'></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 4 -->
                                                        <div class='step-pane' data-step='4'>
                                                            <div class='col-md-12'>
                                                                <h3>Escala de Valoración Funcional</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <div class='col-md-4'>
                                                                    <h4>Categoría</h4>
                                                                </div>
                                                                <div class='col-md-2'>
                                                                    <h4>Puntaje</h4>
                                                                </div>
                                                                <div class='col-md-6'>
                                                                    <h4>Comentarios</h4>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <h5>Autocuidado</h5>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>1. Alimentación</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>2. Arreglo Personal</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>3. Baño</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>4. Vestuario Superior</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>5. Vestuario Inerior</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>6. Aseo Personal</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <h5>Control de Esfinteres</h5>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>1. Control de Vejiga</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>2. Control de Instestino</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <h5>Movilidad</h5>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>1. Transferencia cama-silla</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>2. Traslado baño</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>3. Traslado ducha</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <h5>Deambulación</h5>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>1. Desplazarse caminando/sr</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>2. Subir y bajar escaleras</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <h5>Comunicación/Cognitivo</h5>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>1. Expresión</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>2. Comprensión</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <h5>Social</h5>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>1. Interacción social</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <label class='col-md-4 control-label' for='inputText'>2. Solución de problemas</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-4 control-label' for='inputText'>3. Memoria</label>
                                                                <div class='col-md-2 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación' type='text'>
                                                                </div>
                                                                <div class='col-md-6 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Comentario' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-4 control-label' for='inputText'>Puntuación Total</label>
                                                                <div class='col-md-3 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Puntuación Total' type='text'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 5 -->
                                                        <div class='step-pane' data-step='5'>
                                                            <div class='col-md-12'>
                                                                <h3>Evaluación</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>1. Conexión con el medio</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Conexión con el medio' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>2. Nivel cognitivo aparente</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Nivel cognitivo aparente' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <h4>Evaluación Sensorial</h4>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>1. Visual</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Visual' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>2. Auditivo</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Auditivo' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>3. Táctil</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Táctil' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>4. Propioceptivo</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Propioceptivo' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>5. Vestibular</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Vestibular' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <h4>Evaluación Motora</h4>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>6. Tono</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Tono' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>7. ROM</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='ROM' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>8. Dolor</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Dolor' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>9. Fuerza Muscular</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Fuerza Muscular' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>10. Habilidades Motrices</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Habilidades Motrices' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>11. Coordinación</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Coordinacón' type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12 form-group'>
                                                                <label class='col-md-3 control-label' for='inputText'>12. Equilibrio</label>
                                                                <div class='col-md-9 controls'>
                                                                    <input class='form-control' id='inputText' placeholder='Equilibrio' type='text'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer id='footer'>
                    <div class='footer-wrapper'>
                        <div class='row'>
                            <div class='col-sm-6 text'>
                                Copyright © 2016 Your Project Name
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </section>
    </div>
@endsection
