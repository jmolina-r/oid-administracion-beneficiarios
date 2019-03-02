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
        //href="{{route("malla.showMalla",1)}}"
        $('#consultar_malla').click(function () {
            //console.log('El texto seleccionado es:',$('select[name="id_funcionario"] option:selected').val());
            var id_funcionario = $('select[name="id_funcionario"] option:selected').val();

            var href = $("#consultar_malla").attr("href");
            //console.log('El texto :', href);

            href = href.substring(0, href.length - 1);
            //console.log('El texto :', href)
            href2 = $("#consultar_malla").attr("href", href + id_funcionario);
            //console.log('El texto :', href2);

        });
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
                    @if(count($usuarios)>0)
                    @if(Auth::user()->hasAnyRole(['admin', 'secretaria']))
                        <div class="col-xs-12">
                            <div class='group-header'>
                            <div class='box'>
                                <div class='box-content box-padding'>
                                    <div class="form-group">
                                        <h3 class='control-label' for='inputText'>Seleccione la malla de desea ver</h3>
                                        <select style="width:100%;" id='id_funcionario' name='id_funcionario'
                                                class='form-control capitalize select-tag'>
                                            @foreach($usuarios as $usuario)
                                                @if($usuario->nombre == "Kinesiologo" || $usuario->nombre == "Psicologo" || $usuario->nombre == "Terapeuta ocupacional" || $usuario->nombre == "Fonoaudiologo")
                                                    <option value="{{ $usuario->id }}">{{ App\Funcionario::where('id',$usuario->funcionario_id)->first()->getNombreCompleto() }}
                                                        ({{ $usuario->nombre }})
                                                    </option>
                                                    {{$usuario->funcionario_id}}
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='col-sm-12'>
                            <td><a id='consultar_malla' class="btn btn-primary btn-block" href="{{route('malla.showMalla',1)}}">
                                    Ver Malla</a>
                            </td>
                        </div>
                        </div>
                    @endif
                        @else
                        <div class="col-xs-12">
                        <div class='group-header'>
                            <div class='box'>
                                <div class='box-content box-padding'>
                                    <div class="form-group">
                                        <p class='control-label'>No se encuentran mallas disponibles. Por favor, verificar que existan cuentas de usuario para los funcionarios registrados en el sistema</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    @endif
                </div>
                @include('partials.footer')
            </div>
        </section>
    </div>
@endsection
