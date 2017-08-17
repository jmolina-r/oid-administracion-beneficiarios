@extends("layouts.master")

@section("title")
    Ficha de Cierre - OID
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
                                                <div class="col-md-12">
                                                    <h4>Información del Beneficiario</h4>
                                                    <hr/>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label class="col-md-4 control-label" for="nombre">Nombre</label>
                                                    <div class="col-md-8 controls">
                                                        <p class="capitalize">{{ ucfirst($beneficiario->nombre)." ".ucfirst($beneficiario->apellido)}}</p>
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
                                                    <h4>Información de Alta</h4>
                                                    <hr/>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label class="col-md-4 control-label" for="cant_sesiones">Cantidad de Prestaciones</label>
                                                    <div class="col-md-8 controls">
                                                        <p></p>
                                                        <p>{{ count($prestacionesRealizadas) }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label class="col-md-4 control-label" for="fecha_inicio">Fecha de inicio</label>
                                                    <div class="col-md-8 controls">
                                                        <p>{{ $fechaInicio }}</p>
                                                    </div>
                                                    <div class="help-block with-errors">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label class="col-md-4 control-label" for='fecha_termino'>Fecha de termino</label>
                                                    <div class="col-md-8 controls">
                                                        <p>{{ $fechaTermino }}</p>
                                                    </div>
                                                    <div class="help-block with-errors">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label class="col-md-4 control-label" for="motivo_atencion">Motivo de atención</label>
                                                    <div class="col-md-8 controls">
                                                        <p class="capitalize">{{ $motivoAtencion }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label class="col-md-4 control-label" for="objetivos_trabajados">Objetivos trabajados</label>
                                                    <div class="col-md-8 controls">
                                                        @foreach($prestacionesRealizadas as $prestacion)
                                                            <p class="capitalize">- {{ $prestacion->nombre }}</p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <hr/>
                                                </div>
                                                <form class='validate-form' method="POST" action="{{ route('area-medica.informe-cierre.store') }}">
                                                    <input id="idBeneficiario" name="idBeneficiario" type="hidden" value="{{$beneficiario->id}}">
                                                    <input id="ficha" name="ficha" type="hidden" value="{{$ficha}}">
                                                    <input id="area" name="area" type="hidden" value="{{$area}}">
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for="desercion">Deserción</label>
                                                        <div class="col-md-8 controls">
                                                            <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                <input name='desercion' id="desercion" type='radio' value='si'>
                                                                Si
                                                            </label>
                                                            <label class='radio radio-inline'>
                                                                <input name='desercion' id="desercion" type='radio' value='no'>
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for="culminar_proceso">Culmina proceso</label>
                                                        <div class="col-md-8 controls">
                                                            <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                <input name='culminar_proceso' id="culminar_proceso" type='radio' value='si'>
                                                                Si
                                                            </label>
                                                            <label class='radio radio-inline'>
                                                                <input name='culminar_proceso' id="culminar_proceso" type='radio' value='no'>
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-4 control-label" for="observaciones_sugerencias">Observacion y sugerencias</label>
                                                        <div class="col-md-8 controls">
                                                            <textarea name="observaciones_sugerencias" class='form-control' data-char-allowed='191' data-char-warning='10' placeholder='Observaciones y/o sugerencias' rows='3' style='margin-bottom:10px;' id="observaciones_sugerencias" maxlength="191"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class='actions'>
                                                        <button id="continuar_btn" type='submit' class='pull-right btn btn-md btn-success btn-next'>
                                                            Guardar
                                                        </button>
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
