@extends("layouts.master")

@section("title")
    Ficha Educación - OID
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@endsection

@section("body-attr")
    class="contrast-red"
@endsection

@section("scripts")
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
                                        Ficha Evaluación Inicial Educación
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <h1 class="capitalize">Paciente: {{ $persona->nombre }} {{ $persona->apellido }}</h1>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <h1 class="capitalize">Tratante: {{ $funcionario->nombre }} {{ $funcionario->apellido }}</h1>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="col-sm-4 col-lg-4"><h3 class="capitalize">Edad: {{$fichaEducacion->edad}}</h3></div>
                                <div class="col-sm-4 col-lg-4"><h3 class="capitalize">Meses: {{$fichaEducacion->meses}}</h3></div>
                                <div class="col-sm-4 col-lg-4"><h3 class="capitalize">Días: {{$fichaEducacion->dias}}</h3></div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="row">
                                </h2>
                                <h4>1.- Test Coordinación</h4>
                                <div class="col-sm-12 col-lg-12">
                                    <p class="capitalize"><span class="tit">1. Traslada agua de un vaso a otro sin derramarla</span><br>{{ $test_coordinacion->traslada }}</p>
                                    <p class="capitalize"><span class="tit">2. Construye un puente con tres cubos con modelo presente</span><br>{{ $test_coordinacion->construye_puente}}</p>
                                    <p class="capitalize"><span class="tit">3. Construye una torre de 8 cubos o más</span><br>{{ $test_coordinacion->construye_torre }}</p>
                                    <p class="capitalize"><span class="tit">4. Desaboto</span><br>{{ $test_coordinacion->desabotona}}</p>
                                    <p class="capitalize"><span class="tit">5. Abotona</span><br>{{ $test_coordinacion->abotona }}</p>
                                    <p class="capitalize"><span class="tit">6. Enhebra una aguja</span><br>{{ $test_coordinacion->enhebra}}</p>
                                    <p class="capitalize"><span class="tit">7. Desata cordones</span><br>{{ $test_coordinacion->desata }}</p>
                                    <p class="capitalize"><span class="tit">8. Copia una línea recta</span><br>{{ $test_coordinacion->copia_recta }}</p>
                                    <p class="capitalize"><span class="tit">9. Copia un circulo</span><br>{{ $test_coordinacion->copia_circulo }}</p>
                                    <p class="capitalize"><span class="tit">10.Copia una cruz</span><br>{{ $test_coordinacion->copia_cruz }}</p>
                                    <p class="capitalize"><span class="tit">11. Copia un triangulo</span><br>{{ $test_coordinacion->copia_triang }}</p>
                                    <p class="capitalize"><span class="tit">12. Copia un cuadrado</span><br>{{ $test_coordinacion->copia_cuadra }}</p>
                                    <p class="capitalize"><span class="tit">13. Dibuja 9 o más partes de la figura humana</span><br>{{ $test_coordinacion->dibuja_9 }}</p>
                                    <p class="capitalize"><span class="tit">14. Dibuja 6 o más partes de la figura humana</span><br>{{ $test_coordinacion->dibuja_6 }}</p>
                                    <p class="capitalize"><span class="tit">15. Dibuja 3 o más partes de la figura humana</span><br>{{ $test_coordinacion->dibuja_3 }}</p>
                                    <p class="capitalize"><span class="tit">16. Ordena por tamaño</span><br>{{ $test_coordinacion->ordena }}</p>


                                </div>

                            </div>
                            <div class="row">
                                <h4>2.- Test Lenguaje</h4>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">1. Reconoce grande y chico:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p1}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Grande
                                        @if($test_lenguaje->p1_grande!=null)<i class="far fa-check-square"></i>
                                            @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Chico
                                        @if($test_lenguaje->p1_chico!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">2.Reconoce más y menos:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p2}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Más
                                        @if($test_lenguaje->p2_mas!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Menos
                                        @if($test_lenguaje->p2_menos!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">3.Nombra animales</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p3}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Perro
                                        @if($test_lenguaje->p3_perro!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Gato
                                        @if($test_lenguaje->p3_gato!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Chancho
                                        @if($test_lenguaje->p3_pato!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Pato
                                        @if($test_lenguaje->p3_pato!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Paloma
                                        @if($test_lenguaje->p3_paloma!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Oveja
                                        @if($test_lenguaje->p3_oveja!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Tortuga
                                        @if($test_lenguaje->p3_tortuga!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Gallina
                                        @if($test_lenguaje->p3_gallina!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">4.Nombra objetos:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p4}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Paraguas
                                        @if($test_lenguaje->p4_paraguas!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Vela
                                        @if($test_lenguaje->p4_vela!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Escoba
                                        @if($test_lenguaje->p4_escoba!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Tetera
                                        @if($test_lenguaje->p4_tetera!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Zapato
                                        @if($test_lenguaje->p4_zapatos!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Reloj
                                        @if($test_lenguaje->p4_reloj!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Serrucho
                                        @if($test_lenguaje->p4_serrucho!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Taza
                                        @if($test_lenguaje->p4_taza!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">5.Reconoce largo y corto:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p5}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Largo
                                        @if($test_lenguaje->p5_largo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Corto
                                        @if($test_lenguaje->p5_largo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">6.Verbaliza acciones:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p6}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Cortando
                                        @if($test_lenguaje->p6_cortando!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Saltando
                                        @if($test_lenguaje->p6_saltando!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Planchando
                                        @if($test_lenguaje->p6_planchando!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Comiendo
                                        @if($test_lenguaje->p6_comiendo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">7.Conoce la utilidad de objetos:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p7}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Cuchara
                                        @if($test_lenguaje->p7_cuchara!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Lápiz
                                        @if($test_lenguaje->p7_lapiz!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Jabón
                                        @if($test_lenguaje->p7_jabon!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Escoba
                                        @if($test_lenguaje->p7_escoba!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Cama
                                        @if($test_lenguaje->p7_cama!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Tijera
                                        @if($test_lenguaje->p7_tijera!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">8. Discrimina pesado y liviano:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p8}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Pesado
                                        @if($test_lenguaje->p8_pesado!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Liviano
                                        @if($test_lenguaje->p8_liviano!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">9.Verbaliza su nombre y apellido:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p9}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Nombre
                                        @if($test_lenguaje->p9_nombre!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Apellido
                                        @if($test_lenguaje->p9_apellido!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">10.Identifica su sexo:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p10}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">11.Conoce el nombre de sus padres:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p11}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Papá
                                        @if($test_lenguaje->p11_papa!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Mamá
                                        @if($test_lenguaje->p11_mama!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">12.Da respuestas coherentes a situaciones planteadas:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p12}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Hambre
                                        @if($test_lenguaje->p12_hambre!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Cansado
                                        @if($test_lenguaje->p12_cansado!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Frío
                                        @if($test_lenguaje->p12_frio!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">13.Comprende preposiciones:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p13}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3"> Detrás
                                        @if($test_lenguaje->p13_detras!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Sobre
                                        @if($test_lenguaje->p13_sobre!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3"> Bajo
                                        @if($test_lenguaje->p13_bajo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">14.Razona por analogías compuestas:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p14}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">Hielo
                                        @if($test_lenguaje->p14_hielo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Ratón
                                        @if($test_lenguaje->p14_raton!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Mamá
                                        @if($test_lenguaje->p14_mama!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">15.Nombra colores:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p15}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">Azul
                                        @if($test_lenguaje->p15_azul!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Amarrillo
                                        @if($test_lenguaje->p15_amarillo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Rojo
                                        @if($test_lenguaje->p15_rojo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">16.Señala colores:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p16}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">Azul
                                        @if($test_lenguaje->p16_azul!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Amarrillo
                                        @if($test_lenguaje->p16_amarillo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Rojo
                                        @if($test_lenguaje->p16_rojo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">17.Nombra figuras geométricas:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p17}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">Círculo
                                        @if($test_lenguaje->p17_circulo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Cuadrado
                                        @if($test_lenguaje->p17_cuadrado!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Triángulo
                                        @if($test_lenguaje->p17_tringulo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">18.Señala figuras geométricas:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p18}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">Círculo
                                        @if($test_lenguaje->p18_circulo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Cuadrado
                                        @if($test_lenguaje->p18_cuadrado!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Triángulo
                                        @if($test_lenguaje->p18_tringulo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">19.Describe escenas:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p19}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">13
                                        @if($test_lenguaje->p19_13!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">14
                                        @if($test_lenguaje->p19_14!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">20.Reconoce absurdos:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p20}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">21.Usa plurales:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p21}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">22.Reconoce antes y después:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p22}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">Antes
                                        @if($test_lenguaje->p22_antes!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Después
                                        @if($test_lenguaje->p22_despues!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">23.Define palabras:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p23}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">Manzana
                                        @if($test_lenguaje->p23_manzana!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Pelota
                                        @if($test_lenguaje->p23_pelota!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Zapato
                                        @if($test_lenguaje->p23_zapato!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Abrigo
                                        @if($test_lenguaje->p23_abrigo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">24.Nombra características de objetos:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_lenguaje->p24 }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">Pelota
                                        @if($test_lenguaje->p24_pelota!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Globo
                                        @if($test_lenguaje->p24_globo!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-3">Bolsa
                                        @if($test_lenguaje->p24_bolsa!=null)<i class="far fa-check-square"></i>
                                        @else
                                            <i class="far fa-square"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <h4>3.-Test Motricidad</h4>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">1.Salta con los dos pies juntos en el mismo lugar:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_motricidad->salta }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">2.Camina diez pasos llevando un vaso lleno de agua:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_motricidad->camina }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">3.Lanza una pelota en una dirección determinada:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_motricidad->lanza}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">4.Se para en un pie sin apoyo 10 segundos o más:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_motricidad->para_10}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">5.Se para en un pie sin apoyo 5 segundos o más:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_motricidad->para_5 }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">6.Se para en un pie 1 segundos o más:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_motricidad->para_1 }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">7.Camina en punta de pies seis o más pasos:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_motricidad->camina_punta}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">8.Salta 20 cms. con los pies juntos:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_motricidad->salta_20}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">9.Salta en un pie tres o más veces sin apoyo:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_motricidad->salta_3 }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">10.Coge una pelota:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_motricidad->coge }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">11.Camina hacia delante topando punta y talón:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_motricidad->camina_adelante }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <p class="tit">12.Camina hacia atrás topando punta y talón:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$test_motricidad->camina_atras }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h4>Resultados</h4>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <h3>Test</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <h3>Puntaje Bruto</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <h3>Puntaje T</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <h3>Categoría</h3>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <p class="tit">Coordinación</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="tit">{{$fichaEducacion->total_coordinacion}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="tit">{{$fichaEducacion->pt_coordinacion}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="tit">{{$fichaEducacion->categ_coordinacion}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <p class="tit">Lenguaje</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="tit">{{$fichaEducacion->total_lenguaje}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="tit">{{$fichaEducacion->pt_lenguaje }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="tit">{{$fichaEducacion->categ_lenguaje}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <p class="tit">Motricidad</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="tit">{{$fichaEducacion->total_motricidad}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="tit">{{$fichaEducacion->pt_motricidad }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="tit">{{$fichaEducacion->categ_motricidad}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h3>Observación</h3>
                                </div>
                                <div class="col-md-12">
                                    <p>{{$fichaEducacion->observacion}}</p>
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
