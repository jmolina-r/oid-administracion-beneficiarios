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
    <!-- / START - page related files and scripts [optional] -->
    <script src="{{ asset('/assets/javascripts/plugins/fuelux/wizard.js') }}" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->
    <!-- / START - moments-->
    <script src="{{ asset("/assets/javascripts/plugins/common/moment.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/common/locale/es.js') }}" type="text/javascript"></script>
    <!-- / END - moments-->

    <!-- / START - datepicker-->
    <script src="{{ asset("/assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js") }}"
            type="text/javascript"></script>
    <!-- / END - datepicker-->

    <!-- / START - Validaciones-->
    <script src="{{ asset("/assets/javascripts/plugins/validate/jquery.validate.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ asset("/assets/javascripts/plugins/validate/additional-methods.js") }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/1000hz-bootstrap-validator/validator.min.js') }}"></script>
    <script src="{{ asset('/assets/javascripts/plugins/charCount/charCount.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/InputValidation.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/malla/Actividades.js') }}" type="text/javascript"></script>

    <script>

    </script>

    <script>


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
                                        <span>Registro otras actividades</span>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class='col-sm-12'>
                                <div class='box'>
                                    <div class='box-content box-padding'>
                                        @if(count($errors) > 0)
                                            <hr class='hr-normal'>
                                            <div class="alert alert-danger">
                                                @foreach($errors->all() as $error)
                                                    <p>{{ $error }}</p>
                                                @endforeach
                                            </div>
                                        @endif
                                        <form role="form" id="formulario-agendar-hora"
                                              action=""
                                              accept-charset="UTF-8" method="post" data-toggle="validator">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <input id="id_hora_agendada" name="id_hora_agendada" type="hidden"
                                                       value="{{$id_hora}}">
                                                <input id="id" name="id" type="hidden" value="{{$id}}">

                                                <div class="form-group">
                                                    <div class="col-xs-12 col-sm-12 col-lg-12 ">
                                                        <div class="col-md-4 controls">
                                                            <div class="form-group">
                                                                <div class="input-group ">
                                                                    <span class="input-group-addon"><span
                                                                                class="fa fa-calendar"></span></span>
                                                                    <input type="text" name="fecha" class="form-control"
                                                                           id="fecha" value="{{$fecha}}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 controls">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><span
                                                                                class="fa fa-clock-o"></span></span>
                                                                    <input type="text" name="hora" class="form-control"
                                                                           id="hora" value="{{$hora}}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-lg-12 ">
                                                        <div class="form-group">
                                                            <div class="col-md-12 controls">

                                                                <h4>Título de la actividad</h4>
                                                                <div class="form-inline form-group">
                                                                     <label class="col-form-label">Actividad:</label>
                                                                    <input type="text" class="form-control" id="actividad"
                                                                           name="actividad"
                                                                            type='text'
                                                                            value="{{$tipo}}">

                                                                    <div class="help-block with-errors"></div>


                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">

                                                <button type="button" id="btn-delete" class="btn btn-danger">
                                                    Eliminar
                                                </button>
                                                <button type="button" id="btn-atras" class="btn btn-secondary">
                                                    Atras
                                                </button>
                                                <button type="button" id="btn-update" class="btn btn-primary">
                                                    Actualizar
                                                </button>

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