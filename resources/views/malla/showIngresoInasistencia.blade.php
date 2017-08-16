@extends("layouts.master")

@section("title")
    Malla - OID
@endsection

@section("styles_before")
    <link href="{{ asset("/assets/stylesheets/plugins/fullcalendar/fullcalendar.css") }}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section("styles")
    <link href="{{ asset("/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css") }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css") }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/assets/stylesheets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />

    <link href="{{ asset("assets/stylesheets/plugins/fullcalendar/fullcalendar.css") }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("assets/stylesheets/plugins/wysihtml/wysihtml.css") }}" rel="stylesheet" type="text/css" media="all" />

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

    <script src="{{ asset('/js/malla/inasistencias.js') }}" type="text/javascript"></script>

    <!-- / END - validaciones-->

    <!-- / START - page related files and scripts [optional] -->
    <script src="{{ asset("assets/javascripts/plugins/common/moment.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/javascripts/plugins/fullcalendar/fullcalendar.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/javascripts/plugins/bootbox/bootbox.min.js") }}" type="text/javascript"></script>

    <!-- / END - page related files and scripts [optional] -->
@endsection

@section("content")
    @include('partials.header')
    <div id='wrapper'>
        <div id='main-nav-bg'></div>
    @include('partials.nav')
    <!-- AQUI VA EL NAVBAR  -->
        <section id="content">
            <div class="container">
                <div class="col" id="content-wrapper">
                    <h1>Registro de inasistencia de beneficiario</h1>
                </div>
                <div class="col-md-12 form-group">
                    <br>
                    <label class="col-md-2 control-label" for="paciente-actual">Paciente inasistente:</label>
                    <div class="col-md-4 control-label">
                        <input class="form-control" id="paciente-actual" name="paciente-actual" value="{{ old('paciente') }}"  placeholder="" disabled>
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="col-md-2 control-label" for="area">Ingrese razón de inasistencia</label>
                </div>

                <div class="col-md-12 form-group" id="comentario_inasistencia">
                     <textarea rows="4" cols="50" id="text_inasistencia">
                     </textarea>
                </div>

                <div class="col-md-12 form-group">
                    <button id="boton-finalizar" type="button" class="btn btn-primary enabled col-md-1">
                        Finalizar
                    </button>
                </div>

                @include('partials.footer')
            </div>
        </section>
    </div>
@endsection