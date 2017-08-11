@extends("layouts.master")

@section("title")
    Prestaciones - OID
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

    <!-- / END - page related files and scripts [optional] -->
    <!-- / START - Validaciones-->
    <script src="assets/javascripts/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <!-- / END - validaciones-->
@endsection

@section("content")
    @include('partials.header')
    <div id='wrapper' class="profile">
        <div id='main-nav-bg'></div>
    @include('partials.nav')
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
                                        <span>Lista de Fichas de Evaluación Inicial</span>
                                    </h1>
                                    <div class='pull-right'>
                                        <ul class='breadcrumb'>
                                            <li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ $idUsuario }}
                        @if($fichas == null)
                            hola
                        @endif
                        <div class="row">
                            <div class='col-sm-12'>
                                <td><a class="btn btn-primary btn-block" href="{{route('malla.crearPrestacion')}}">Agregar Nueva Prestación</a></td>
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='box'>
                                    <table class='data-table table table-striped' style='margin-bottom:0;'>
                                        <thead>
                                        <tr>
                                            <th>
                                                <h3>Nombre Prestación</h3>
                                            </th>
                                            <th>
                                                <h3>Área</h3>
                                            </th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($fichas as $ficha)
                                            <tr>
                                                <td>{{$ficha->id}}</td>
                                                <td><a class="btn btn-primary btn-block btn-xs" href="{{route('malla.confirmarEliminarPrestacion', $ficha->id)}}">Eliminar</a></td>
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
        @include('partials.footer')
    </div>
    </section>
    </div>
@endsection