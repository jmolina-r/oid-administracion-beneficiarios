@extends("layouts.master")

@section("title")
    Informe de cierre - OID
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
                                        <span>Informe de cierre</span>
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
                                                @if(count($errors) > 0)
                                                    <hr class='hr-normal'>
                                                    <div class="alert alert-danger">
                                                        @foreach($errors->all() as $error)
                                                            <p>{{ $error }}</p>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <form role="form" id="formulario_registro" accept-charset="UTF-8" style="margin-bottom: 0;" method="post">
                                                    <input id="idben" name="idben" type="hidden" value="{{$beneficiario->id}}">
                                                    <input type="hidden" class="form-control" id="ben_id" name="ben_id" value="{{$beneficiario->id}}">
                                                    <div class="col-md-12">
                                                        <h4>Información del beneficiario</h4>
                                                        <hr/>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for="nombre">Nombre</label>
                                                        <div class="col-md-8 controls">
                                                            <p>{{ ucfirst($beneficiario->nombre)." ".ucfirst($beneficiario->apellido)}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for="edad">Edad</label>
                                                        <div class="col-md-8 controls">
                                                            <p>{{ $edad }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for="fecha_nacimiento">Fecha de nacimiento</label>
                                                        <div class="col-md-8 controls">
                                                            <p>{{ $beneficiario->fecha_nacimiento }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <h4>Información de alta</h4>
                                                        <hr/>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for="cant_sesiones">Cantidad de sesiones</label>
                                                        <div class="col-md-8 controls">
                                                            <input class="form-control" id="cant_sesiones" name="cant_sesiones" placeholder="Cantidad de sesiones">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for="fecha_inicio">Fecha de inicio</label>
                                                        <div class="col-md-8 controls">
                                                            <input id="fecha_inicio" value-date="" name="fecha_inicio" class="form-control" data-format="DD/MM/YYYY" placeholder="Fecha de inicio" type="date" required>
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                        <div class="help-block with-errors">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for='fecha_termino'>Fecha de termino</label>
                                                        <div class="col-md-8 controls">
                                                            <input id='fecha_termino' value-date='' name='fecha_termino' class='form-control' data-format='DD/MM/YYYY' placeholder='Fecha de termino' type="date" required>
                                                            <span class='input-group-addon'>
                                                                <span class='fa fa-calendar'></span>
                                                            </span>
                                                        </div>
                                                        <div class="help-block with-errors">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for="motivo_atencion">Motivo de atención</label>
                                                        <div class="col-md-8 controls">
                                                            <input class="form-control" id="motivo_atencion" name="motivo_atencion" placeholder="Motivo de atención">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for="objetivos_trabajados">Objetivos trabajados</label>
                                                        <div class="col-md-8 controls">
                                                            <input class="form-control" id="objetivos_trabajados" name="objetivos_trabajados" placeholder="Objetivos trabajados">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for="desercionar">Deserción (Sí/No)</label>
                                                        <div class="col-md-8 controls">
                                                            <select	class="form-control" id="desercionar" name="desercionar">
                                                                <option value=""></option>
                                                                <option value="1">Sí</option>
                                                                <option value="0">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for="culminar_proceso">Culmina proceso (Sí/No)</label>
                                                        <div class="col-md-8 controls">
                                                            <select	class="form-control" id="culminar_proceso" name="culminar_proceso">
                                                                <option value=""></option>
                                                                <option value="1">Sí</option>
                                                                <option value="0">No</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for="observaciones_sugerencias">Observacion y sugerencias</label>
                                                        <div class="col-md-8 controls">
                                                            <input class="form-control" id="observaciones_sugerencias" name="observaciones_sugerencias" placeholder="Observaciones y/o sugerencias">
                                                        </div>
                                                    </div>
                                                    <div class='actions'>
                                                        <button id="continuar_btn" type='submit' class='pull-right btn btn-md btn-success btn-next'>
                                                            Guardar y visualizar para imprimir
                                                        </button>
                                                        <div class="col-md-1 controls">
                                                        <button class='pull-right btn btn-md btn-prev'>
                                                            Volver
                                                        </button>
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
