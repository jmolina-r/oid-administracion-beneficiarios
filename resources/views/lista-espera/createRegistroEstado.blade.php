<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Demandas - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles_before')
    <link href="{{ asset('/assets/stylesheets/plugins/fuelux/wizard.css') }}" rel="stylesheet" type="text/css"
          media="all"/>
@endsection

@section('styles')
    <link href="{{ asset('/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css') }}"
          rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('/assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css') }}"
          rel="stylesheet" type="text/css" media="all"/>
    <link href='{{ asset('/assets/images/meta_icons/apple-touch-icon-precomposed.png') }}'
          rel='apple-touch-icon-precomposed'>
    <link href="{{ asset('/assets/stylesheets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css"
          media="all"/>
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all"/>

@endsection

<!-- Atributos del body -->
@section('body-attr')
    class='contrast-red'
@endsection

@section('scripts')
    <!-- / jquery [required] -->
    <script src="{{ asset('/assets/javascripts/jquery/jquery.min.js') }}" type="text/javascript"></script>
    <!-- / jquery mobile (for touch events) -->
    <script src="{{ asset('/assets/javascripts/jquery/jquery.mobile.custom.min.js') }}" type="text/javascript"></script>
    <!-- / jquery ui -->
    <script src="{{ asset('/assets/javascripts/jquery/jquery-ui.min.js') }}" type="text/javascript"></script>
    <!-- / jQuery UI Touch Punch -->
    <script src="{{ asset('/assets/javascripts/jquery/jquery.ui.touch-punch.min.js') }}"
            type="text/javascript"></script>
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
    <!-- / Beneficiario select tag -->
    <script src="{{ asset('assets/javascripts/plugins/select2/select2.js') }}" type="text/javascript"></script>
    <!-- / START - moments-->
    <script src="{{ asset('/assets/javascripts/plugins/common/moment.min.js') }}" type="text/javascript"></script>
    <!-- / END - moments-->
    <!-- / START - datepicker-->
    <script src="{{ asset('/assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js') }}"
            type="text/javascript"></script>
    <!-- / END - datepicker-->
    <!-- / START - Validaciones-->
    <script src="{{ asset('/assets/javascripts/plugins/validate/jquery.validate.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/validate/additional-methods.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/1000hz-bootstrap-validator/validator.min.js') }}"></script>
    <script src="{{ asset('/js/InputValidation.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/charCount/charCount.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
        });
    </script>
    <script>
        $('#btn-guardar').click(function () {

            document.getElementById("select-descripcion").style.visibility = 'hidden';
        });
    </script>
    <script>
        var selectOne = document.getElementById("select-estado");

        selectOne.addEventListener("change", function () {
            if (this.options[this.selectedIndex].value == '1') {
                document.getElementById("select-descripcion").style.visibility = 'hidden';
                document.getElementById("labelDescripcion").style.visibility = 'hidden';

            } else {
                document.getElementById("select-descripcion").style.visibility = 'visible';
                document.getElementById("labelDescripcion").style.visibility = 'visible';
            }
        }, false);
    </script>
    <script>



            $('#btn-guardar').click(function () {

                var respuesta = confirm("¿Seguro que desea guardar el registro?");

                if (respuesta == false) {
                    return;
                }

                var descripcion = document.getElementById("select-descripcion");
                var estado = document.getElementById("select-estado");
                var descripcion_id = descripcion.options[descripcion.selectedIndex].value;
                var estado_id = estado.options[estado.selectedIndex].value;
                var demanda_beneficiario_id = $('#id').val();

                console.log(demanda_beneficiario_id);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/beneficiario/guardarHistorialDemanda",
                    data: {
                        demanda_beneficiario_id: demanda_beneficiario_id,
                        descripcion_id: descripcion_id,
                        estado_id: estado_id,
                    },
                    type: "POST",

                    success: function (data, textStatus, jqXHR) {
                        alert("Nuevo estado registrado correctamente.");
                        window.location.replace("/beneficiario/listaEspera/show/" + $('#id_demanda').val());
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Hubo un error, reintente.");
                    }
                });

            });

            $('#btn-volver').click(function () {
                window.location.replace("/beneficiario/listaEspera/show/" + $('#id_demanda').val());
            });

    </script>
@endsection

<!-- Contenido del body -->
@section('content')
    @include('partials.header')



    <div id='wrapper'>
        <div id='main-nav-bg'></div>
        @include('partials.nav')
        <section id='content'>
            <div class='container'>
                <div class='row' id='content-wrapper'>
                    <div class='col-xs-12'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='page-header'>
                                    <h1 class='pull-left'>
                                        <i class='fa fa-pencil-square-o'></i>
                                        <span>Registrar nuevo Estado</span>
                                    </h1>
                                    <div class='pull-right'>
                                        <ul class='breadcrumb'>
                                            <li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(count($errors) > 0)
                            <hr class='hr-normal'>
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div class='row'>
                            <div class='col-md-12'>
                                <h3 class="modal-title">
                                    Nombre: {{$beneficiario->nombre}} {{$beneficiario->apellido}}</h3>
                                &nbsp;
                                <div class='box'>
                                    <input id="id" name="id" type="hidden" value="{{$demanda_beneficiario_id}}">
                                    <input id="id_demanda" name="id_demanda" type="hidden" value="{{$demanda->id}}">
                                    <div class="col-md-12">
                                        <label class="control-label">Estado</label>
                                        <select id="select-estado" class="form-control">
                                            @foreach($estados as $estado)
                                                <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    &nbsp;
                                    <div class="col-md-12">
                                        <label style="visibility: hidden;" id="labelDescripcion" class="control-label">Descripción</label>
                                        <select style="visibility: hidden;" id="select-descripcion"
                                                name="select-descripcion"
                                                class="form-control">
                                            @foreach($descripciones as $descripcion)
                                                <option id={{$descripcion->id}} value="{{$descripcion->id}}">{{$descripcion->nombre}}</option>
                                            @endforeach
                                        </select>
                                        &nbsp;
                                    </div>


                                    <div class="col-md-6">
                                        <button id="btn-volver" class="btn btn-primary btn-block"
                                           >Volver</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button id='btn-guardar' class='btn btn-block btn-success'>
                                            Guardar
                                        </button>
                                    </div>
                                    <hr>
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