@extends("layouts.master")

@section("title")
    Ficha Kinesiología - OID
@endsection

@section("styles_before")
    <link href="{{ asset("/assets/stylesheets/plugins/fuelux/wizard.css") }}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section("styles")
    <link href="{{ asset("/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css") }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css") }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/assets/images/meta_icons/apple-touch-icon-precomposed.png") }}" rel="apple-touch-icon-precomposed">
    <link href="{{ asset('/assets/stylesheets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css" media="all" />
    {{-- <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" /> --}}
@endsection

@section("body-attr")
    class="contrast-red"
@endsection

@section("scripts")
    {{-- <script src="{{ asset('/assets/javascripts/jquery/jquery.min.js') }}" type="text/javascript"></script>
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
    <script src="{{ asset('/assets/javascripts/theme.js') }}" type="text/javascript"></script> --}}

    <script src="https://use.fontawesome.com/3574066f0b.js"></script>
@endsection

@section("content")
    @include('partials.header')
    <div id='wrapper' class="profile">
        <div id='main-nav-bg'></div>
    @include('partials.nav')
    <!-- AQUI VA EL NAVBAR  -->
        <section id="content">
            <div class="container">
                <div class="row" id="content-wrapper">
                    <div class="col-xs-12">
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='page-header'>
                                    <h1 class='pull-left'>
                                        <i class='fa fa-file-text-o'></i>
                                        Ficha Social
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <h1 class="capitalize">Paciente: {{$beneficiario->nombre}} {{$beneficiario->apellido}}</h1>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <h1 class="capitalize">ID de la ficha: {{$id}}</h1>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="row">
                                </h2>
                                <h4>Antecedentes Ayudas</h4>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <h3>Ayudas Técnicas</h3>
                                        @if(count($ayudas)==0)
                                            <p class="capitalize">El usuario no ha pedido ayuda técnica</p>
                                        @else
                                            <?php $countTecn = 0; ?>
                                             @foreach($ayudas as $ayuda)
                                                @if($ayuda->tipo == 'tecnico')
                                                <p class="capitalize">{{$ayuda->nombre}}</p>
                                                        <?php $countTecn++; ?>
                                                @endif
                                             @endforeach
                                                @if($countTecn==0)
                                                    <p class="capitalize">El usuario no ha pedido ayuda técnica</p>
                                                @endif
                                        @endif

                                    </div>
                                    <div class="col-md-4">
                                        <h3>Ayudas Sociales</h3>
                                        @if(count($ayudas)==0)
                                            <p class="capitalize">El usuario no ha pedido ayuda social</p>
                                        @else
                                            <?php $countSocial = 0; ?>
                                             @foreach($ayudas as $ayuda)
                                                @if($ayuda->tipo == 'social')
                                                <p class="capitalize">{{$ayuda->nombre}}</p>
                                                    <?php $countSocial++; ?>
                                                @endif
                                             @endforeach
                                            @if($countSocial==0)
                                                    <p class="capitalize">El usuario no ha pedido ayuda social</p>
                                                @endif
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <h3>Observación</h3>
                                         @if($observacionAyuda == null)
                                            <p class="capitalize">El usuario no ha ingresado una observación</p>
                                        @else
                                            <p class="capitalize">{{$observacionAyuda->observacion}}</p>

                                        @endif
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
