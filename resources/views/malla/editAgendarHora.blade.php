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
    <script src="{{ asset('/js/malla/cargaBeneficiarios.js') }}" type="text/javascript"></script>

    <script>
        $(document).on('change', '.asistencia', function () {
            if (($(this).val() == 'Presente')) {
                $(this).closest('tr').find('.prestacion').prop('disabled', false);
            } else {
                $(this).closest('tr').find('.prestacion').prop('value', '-');
                $(this).closest('tr').find('.prestacion').prop('disabled', true);
            }
        })
    </script>

    <script>

        document.getElementById("btn-delete").onclick = function () {
            var respuesta = confirm("¿Seguro que desea eliminar el registro de la malla?");

            if (respuesta == false) {
                return;
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: false,
                url: "/malla/destroy",
                type: "POST",
                data: {
                    idHora: $('#id_hora_agendada').val()
                },
                success: function (data, textStatus, jqXHR) {
                    alert('La hora agendada se ha eliminado correctamente.');
                    window.location.replace("/malla/show2/" + $('#id').val());
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Hubo un error al eliminar la hora. Reintente.');
                }
            });

        }
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
                                        <span>Registro de Asistencia y Prestaciones</span>
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
                                                <input id="id_hora_agendada" name="id_hora_agendada" type="hidden" value="{{$id_hora}}">
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
                                                        <div class="col-md-4 controls">
                                                            <div class="form-group">
                                                                <div class="form-check form-check-inline">
                                                                    <input hidden type="checkbox" id="repetir"
                                                                           class="form-check-input" value="">
                                                                    <label hidden class="form-check-label" id="repetir"
                                                                           name="repetir">Repetir semanalmente</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--
                                                    <div class="col-xs-12 col-sm-12 col-lg-12 ">
                                                        <div class="form-group">
                                                            <div class="col-md-5 controls">
                                                                <div class="form-inline">
                                                                    <label hidden for="sesiones" class="col-form-label">Cantidad
                                                                        de
                                                                        sesiones:</label>
                                                                    <input hidden type="number" min="1" max="12"
                                                                           style="width:25%;" id="cantSesiones"
                                                                           name="cantSesiones" class="form-control "
                                                                            value="1"
                                                                           >
                                                                    <div hidden class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    -->
                                                    <div class="col-xs-12 col-sm-12 col-lg-12 ">
                                                        <div class="form-group">
                                                            <div class="col-md-12 controls">
                                                                <h4>Tipo de sesión</h4>
                                                                <label class="form-check-label"
                                                                       for="individual">Individual</label>
                                                                <input disabled class="form-check-input" type="radio"
                                                                       name="tipo"
                                                                       id="Individual"
                                                                       value="Individual" checked required>
                                                                <label class="form-check-label"
                                                                       for="exampleRadios1">Grupal</label>
                                                                <input disabled class="form-check-input" type="radio"
                                                                       name="tipo"
                                                                       id="Grupal"
                                                                       value="Grupal" required>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-lg-12 ">
                                                        <div class="form-group">
                                                            <div class="col-md-12 controls">
                                                                <!--
                                                                <h4>Seleccionar beneficiarios</h4>
                                                                <div class="form-inline form-group">
                                                                     <label for="rut" class="col-form-label">Ingresar
                                                                        Rut:</label>
                                                                    <input type="text" class="form-control" id="rut"
                                                                           name="rut"
                                                                           placeholder='Ej. 12345678-8' type='text'
                                                                           pattern="\d{3,8}-[\d|kK]{1}" value="">
                                                                    <button type="button" id="btn-agregar-beneficiario"
                                                                            class="btn btn-success">Agregar
                                                                    </button>
                                                                    <div class="help-block with-errors"></div>


                                                                </div>
                                                                -->
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-lg-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 controls">
                                                                <div class="table-responsive-sm">
                                                                    <table class="table" id="tabla-beneficiarios">
                                                                        <thead>
                                                                        <tr>
                                                                            <th style="display:none;"></th>
                                                                            <th>Nombre</th>
                                                                            <th>Rut</th>
                                                                            <th>Asistencia</th>
                                                                            <th>Prestación</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody id="tbody">
                                                                        @foreach($horas_agendadas as $hora)
                                                                            <tr>
                                                                                @php($beneficiario=\App\Beneficiario::where('id',$hora->beneficiario_id)->first())
                                                                                <td style="display:none;">{{$beneficiario->id}}</td>
                                                                                <td>{{$beneficiario->nombre}}</td>
                                                                                <td>{{$beneficiario->rut}}</td>
                                                                                <td><select id='asistencia'
                                                                                            name='asistencia'
                                                                                            class="asistencia"
                                                                                            style="width:100%;">

                                                                                        @if($hora->asist_sn=='Presente')
                                                                                            <option value="Presente"
                                                                                                    selected>Presente
                                                                                            </option>
                                                                                        @else
                                                                                            <option value="Presente">
                                                                                                Presente
                                                                                            </option>
                                                                                        @endif
                                                                                        @if($hora->asist_sn=='Justifica')
                                                                                            <option value="Justifica"
                                                                                                    selected>Justifica
                                                                                            </option>
                                                                                        @else
                                                                                            <option value="Justifica">
                                                                                                Justifica
                                                                                            </option>
                                                                                        @endif
                                                                                        @if($hora->asist_sn=='No Justifica')
                                                                                            <option value="No Justifica"
                                                                                                    selected>
                                                                                                No Justifica
                                                                                            </option>
                                                                                        @else
                                                                                            <option value="No Justifica">
                                                                                                No Justifica
                                                                                            </option>
                                                                                        @endif
                                                                                        @if($hora->asist_sn=='Deserta')
                                                                                            <option value="Deserta"
                                                                                                    selected>
                                                                                                Deserta
                                                                                            </option>
                                                                                        @else
                                                                                            <option value="Deserta">
                                                                                                Deserta
                                                                                            </option>
                                                                                        @endif
                                                                                        @if($hora->asist_sn=='Suspende OID')
                                                                                            <option value="Suspende OID" selected>
                                                                                                Suspende OID
                                                                                            </option>
                                                                                        @else
                                                                                            <option value="Suspende OID">
                                                                                                Suspende OID
                                                                                            </option>
                                                                                        @endif
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <select id='prestacion'
                                                                                            name="prestacion"
                                                                                            class="prestacion"
                                                                                            style="width:100%;">
                                                                                        @foreach($prestaciones as $prestacion)
                                                                                            @if ($prestacion->id== $hora->prestacion_id)
                                                                                                <option value="{{$prestacion->id}}"
                                                                                                        selected>{{$prestacion->nombre}}</option>
                                                                                            @else
                                                                                                <option value="{{$prestacion->id}}">{{$prestacion->nombre}}</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                        @if($hora->prestacion_id==null)
                                                                                                <option selected></option>
                                                                                            @endif
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
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
                                                    Guardar
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





