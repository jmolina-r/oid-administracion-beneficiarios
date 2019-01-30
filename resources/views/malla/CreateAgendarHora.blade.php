@extends("layouts.master")

@section("styles_before")
    <link href="{{ asset("/assets/stylesheets/plugins/fullcalendar/fullcalendar.css") }}" rel="stylesheet"
          type="text/css" media="all"/>
@endsection

@section("styles")
    <link href="{{ asset("/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css") }}"
          rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset("/assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css") }}"
          rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('/assets/stylesheets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css"
          media="all"/>
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all"/>

    <link href="{{ asset("assets/stylesheets/plugins/fullcalendar/fullcalendar.css") }}" rel="stylesheet"
          type="text/css" media="all"/>
    <link href="{{ asset("assets/stylesheets/plugins/wysihtml/wysihtml.css") }}" rel="stylesheet" type="text/css"
          media="all"/>

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
    <script src="{{ asset("/assets/javascripts/jquery/jquery.ui.touch-punch.min.js") }}"
            type="text/javascript"></script>
    <!-- / bootstrap [required] -->
    <script src="{{ asset("/assets/javascripts/bootstrap/bootstrap.js") }}" type="text/javascript"></script>
    <!-- / modernizr -->
    <script src="{{ asset("/assets/javascripts/plugins/modernizr/modernizr.min.js") }}" type="text/javascript"></script>
    <!-- / retina -->
    <script src="{{ asset("/assets/javascripts/plugins/retina/retina.js") }}" type="text/javascript"></script>
    <!-- / theme file [required] -->
    <script src="{{ asset("/assets/javascripts/theme.js") }}" type="text/javascript"></script>


    <!-- / START - moments-->
    <script src="{{ asset("/assets/javascripts/plugins/common/moment.min.js") }}" type="text/javascript"></script>
    <!-- / END - moments-->

    <!-- / START - datepicker-->
    <script src="{{ asset("/assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js") }}"
            type="text/javascript"></script>
    <!-- / END - datepicker-->

    <!-- / START - Validaciones-->
    <script src="{{ asset("/assets/javascripts/plugins/validate/jquery.validate.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/1000hz-bootstrap-validator/validator.min.js') }}"></script>
    <script src="{{ asset("/assets/javascripts/plugins/validate/additional-methods.js") }}"
            type="text/javascript"></script>

    <script src="{{ asset('/js/InputValidation.js') }}" type="text/javascript"></script>

    <!-- / END - validaciones-->

    <script>
        document.getElementById('repetir').onchange = function () {
            document.getElementById('cantSesiones').disabled = !this.checked;
            document.getElementById('cantSesiones').value = 1;
        };
    </script>
@endsection

@section("content")
    @include('partials.header')
    <div id='wrapper'>
        <div id='main-nav-bg'></div>
        @include('partials.nav')
        <section id="content">
            <div class="container">
                <div class="row" id="content-wrapper">
                    <div class='col-xs-12'>
                        <div class="row">
                            <div class='col-sm-12'>
                                <div class='page-header'>
                                    <h1 class='pull-left'>
                                        <i class='fa fa-pencil-square-o'></i>
                                        <span>Agendar Hora</span>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class='col-sm-12'>
                                <div class='box'>
                                    <div class='box-content box-padding'>
                                        <div class="fuelux">
                                            <form role="form" id="formulario-agendar-hora"
                                                  action="{{route('malla.store')}}"
                                                  accept-charset="UTF-8" method="post">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <input id="id" name="id_funcionario" type="hidden" value="{{$id}}">

                                                    <div class="form-group">
                                                        <div class="col-xs-12 col-sm-12 col-lg-12 ">
                                                            <div class="col-md-4 controls">
                                                                <div class="form-group">
                                                                    <div class="input-group ">
                                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                                        <input type="text" name="fecha" class="form-control" id="fecha" value="{{$fecha}}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 controls">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
                                                                        <input type="text" name="hora" class="form-control" id="hora" value="{{$hora}}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 controls">
                                                                <div class="form-group">
                                                                    <div class="form-check form-check-inline">
                                                                        <input type="checkbox" id="repetir" class="form-check-input" value="">
                                                                        <label class="form-check-label" id="repetir" name="repetir">Repetir semanalmente</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                            <div class="col-xs-12 col-sm-12 col-lg-12 ">
                                                                <div class="form-group">
                                                                <div class="col-md-4 controls">
                                                                    <div class="form-inline">
                                                                        <label for="sesiones" class="col-form-label">Cantidad de
                                                                            sesiones:</label>
                                                                        <input type="text" style="width:20%;" id="cantSesiones"
                                                                               name="cantSesiones" class="form-control" value="1"
                                                                               disabled>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>

                                                        <div class="col-xs-12 col-sm-12 col-lg-12 ">
                                                            <div class="form-group">
                                                                <div class="col-md-12 controls">
                                                                    <h4>Tipo de sesión</h4>
                                                                    <label class="form-check-label"
                                                                           for="individual">Individual</label>
                                                                    <input class="form-check-input" type="radio" name="tipo"
                                                                           id="tipo"
                                                                           value="Individual" checked required>
                                                                    <label class="form-check-label"
                                                                           for="exampleRadios1">Grupal</label>
                                                                    <input class="form-check-input" type="radio" name="tipo"
                                                                           id="tipo"
                                                                           value="Grupal" required>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-lg-12 ">
                                                            <div class="form-group">
                                                                <div class="col-md-12 controls">
                                                                    <h4>Seleccionar beneficiarios</h4>
                                                                    <div class="form-inline form-group">
                                                                        <label for="rut" class="col-form-label">Ingresar Rut
                                                                            Beneficiario:</label>
                                                                        <input type="text" class="form-control" id="rut" name="rut"
                                                                               value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary"
                                                                href="{{route('malla.showMalla',$id)}}">
                                                            Atras
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection





