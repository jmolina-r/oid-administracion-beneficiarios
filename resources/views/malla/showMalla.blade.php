@extends("layouts.master")

@section("title")
    Malla - OID
@endsection

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

    <!-- / START - page related files and scripts [optional] -->
    <script src="{{ asset("assets/javascripts/plugins/common/moment.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/javascripts/plugins/fullcalendar/fullcalendar.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ asset("assets/javascripts/plugins/bootbox/bootbox.min.js") }}" type="text/javascript"></script>

    <script src="{{ asset('/js/malla/Calendar.js') }}" type="text/javascript"></script>
    <script>
        $("#new-event").on('submit', function (e) {
            var value;
            e.preventDefault();
            value = $("#new-event-input").val();
            if (value.length > 0) {
                $("#events .box-content").prepend("<div class='label label-important external-event'>" + value + "</div>");
                $("#new-event-input").val("");
                return setDraggableEvents();
            }
        });
    </script>

    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
    </script>

    <script>

        function encontrarNombre(rut, start) {
            var nombre_encontrado;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: false,
                url: "/malla/getnombre",
                type: "GET",
                data: {
                    rutBuscado: rut
                },
                success: function (data, textStatus, jqXHR) {
                    var beneficiario_encontrado = $.parseJSON(data);
                    nombre_encontrado = beneficiario_encontrado.nombre;
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('El beneficiario no se encuentra en la base de datos');
                    return;
                }
            });
        }
    </script>

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
                <div class="row" id="content-wrapper">
                    <input id="contentHeight" name="contentHeight" type="hidden" value="{{$contentHeight}}">
                    <input id="minTime" name="minTime" type="hidden" value="{{$minTime}}">
                    <input id="maxTime" name="maxTime" type="hidden" value="{{$maxTime}}">
                    <input id="slotDuration" name="slotDuration" type="hidden" value="{{$slotDuration}}">
                    <input id="slotLabelInterval" name="slotLabelInterval" type="hidden" value="{{$slotLabelInterval}}">
                    <input id="id" name="id_funcionario" type="hidden" value="{{$id}}">

                    <div class='col-xs-12'>
                        <div class='group-header'>
                        </div>
                        <div class="col-xs-12">
                            <div class='box'>
                                <div class='box-content box-padding'>
                                    <div class="form-group">
                                        <h3 class='control-label' for='inputText'>Profesional:</h3>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--
                        <a type="button" class="btn btn-primary" href='{{route('malla.CreateAgendarHora')}}'>
                            Agendar Hora
                        </a>-->
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='box box-bordered blue-border'>
                                            <div class='box-header blue-background'>
                                                <div class='title'>
                                                    <i class='fa fa-calendar'></i>
                                                    Malla de Atenciones
                                                </div>
                                            </div>
                                            <div class='box-content'>
                                                <div class='full-calendar'></div>
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