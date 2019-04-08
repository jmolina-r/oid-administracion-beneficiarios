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
    <!-- / START - page related files and scripts [optional] -->
    <script src="{{ asset("/assets/javascripts/plugins/fuelux/wizard.js") }}" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->


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

    <script src="{{ asset('/js/InputValidation.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/area-medica/FormularioEducacion.js') }}" type="text/javascript"></script>
    <!-- / END - validaciones-->
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
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header">
                                    <h1 class="pull-left">
                                        <i class="fa fa-pencil-square-o"></i>
                                        <span>Evaluación Inicial Educación</span>
                                    </h1>
                                    <div class="pull-right">
                                        <ul class="breadcrumb">
                                            <li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box">
                                    <div class='box-content box-padding'>
                                        <div class='fuelux'>
                                            <div class='wizard' data-initialize='wizard' id='myWizard'>
                                                <div class='steps-container'>
                                                    <ul class='steps'>
                                                        <li class='active' data-step='1'>
                                                            <span class='step'>1</span>
                                                        </li>
                                                        <li data-step='2'>
                                                            <span class='step'>2</span>
                                                        </li>
                                                        <li data-step='3'>
                                                            <span class='step'>3</span>
                                                        </li>
                                                        <li data-step='4'>
                                                            <span class='step'>4</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class='actions'>
                                                    <button id="continuar_btn" type='submit' class='pull-right btn btn-md btn-success btn-next' data-last='Finalizar'>
                                                        Continuar
                                                        <i class='fa fa-arrow-right'></i>
                                                    </button>
                                                    <button class='pull-right btn btn-md btn-prev'>
                                                        <i class='fa fa-arrow-left'></i>
                                                        Volver
                                                    </button>
                                                </div>
                                                @if(count($errors) > 0)
                                                    <hr class='hr-normal'>
                                                    <div class="alert alert-danger">
                                                        @foreach($errors->all() as $error)
                                                            <p>{{ $error }}</p>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <hr class='hr-normal'>
                                                <form role="form" id="formulario_registro" action="{{route('area-medica.ficha-evaluacion-inicial.educacion.update')}}" accept-charset="UTF-8" style="margin-bottom: 0;" method="post">
                                                    <div class='step-content'>
                                                    <!-- STEP 1 -->
                                                        <div class='step-pane active' data-step='1'>
                                                            <input id="id" name="id" type="hidden" value="{{$persona->id}}">
                                                            <input id="fichaId" name="fichaId" type="hidden" value="{{$fichaEducacion->id}}">
                                                            <div class="col-md-12">
                                                                <h3>1. Sub-test coordinación</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="traslada">1. Traslada agua de un vaso a otro sin derramarla</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="traslada" name="traslada" value="{{$test_coordinacion->traslada}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="construye_puente">2. Construye un puente con tres cubos con modelo presente</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="construye_puente" name="construye_puente" value="{{$test_coordinacion->construye_puente}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="construye_torre">3. Construye una torre de 8 cubos o más</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="construye_torre" name="construye_torre" value="{{$test_coordinacion->construye_torre}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="desabotona">4. Desabotona</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="desabotona" name="desabotona" value="{{$test_coordinacion->desabotona}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="abotona">5. Abotona</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="abotona" name="abotona" value="{{$test_coordinacion->abotona}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="desata">6. Enhebra una aguja</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id=desata"" name="enhebra" value="{{$test_coordinacion->enhebra}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="desata">7. Desata cordones</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="desata" name="desata" value="{{$test_coordinacion->desata}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="copia_recta">8. Copia una línea recta</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="copia_recta" name="copia_recta" value="{{$test_coordinacion->copia_recta}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="copia_circulo">9. Copia un circulo</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="copia_circulo" name="copia_circulo" value="{{$test_coordinacion->copia_circulo}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="copia_cruz">10.Copia una cruz</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="copia_cruz" name="copia_cruz" value="{{$test_coordinacion->copia_cruz}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="copia_triang">11. Copia un triangulo</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="copia_triang" name="copia_triang" value="{{$test_coordinacion->copia_triang}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="copia_cuadra">12. Copia un cuadrado</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="copia_cuadra" name="copia_cuadra" value="{{$test_coordinacion->copia_cuadra}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="dibuja_9">13. Dibuja 9 o más partes de la figura humana</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="dibuja_9" name="dibuja_9" value="{{$test_coordinacion->dibuja_9}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="dibuja_6">14. Dibuja 6 o más partes de la figura humana</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="dibuja_6" name="dibuja_6" value="{{$test_coordinacion->dibuja_6}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="dibuja_3">15. Dibuja 3 o más partes de la figura humana</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="dibuja_3" name="dibuja_3" value="{{$test_coordinacion->dibuja_3}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-6" for="ordena">16. Ordena por tamaño</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="ordena" name="ordena" value="{{$test_coordinacion->ordena}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="total1">Total sub test de coordinación:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control onlynumbers" id="total1" name="total1" value="{{ old('total1') }}"  placeholder="" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    <!-- STEP 2 -->
                                                        <div class='step-pane active' data-step='2'>
                                                            <div class="col-md-12">
                                                                <h3>2. Sub-test lenguaje</h3>
                                                                <hr/>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3 col-form-label" for="p1">1. Reconoce grande y chico:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p1" name="p1" value="{{$test_lenguaje->p1}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p1_grande" id="p1_grande">
                                                                    <label class="custom-control-label" for="p1_grande">Grande</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p1_chico" id="p1_chico">
                                                                    <label class="custom-control-label" for="p1_chico">Chico</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group ">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p2">2. Reconoce más y menos:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p2" name="p2" value="{{$test_lenguaje->p2}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p2_mas" id="p2_mas">
                                                                    <label class="custom-control-label" for="p2_mas">Más</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p2_menos" id="p2_menos">
                                                                    <label class="custom-control-label" for="p2_menos">Menos</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p3">3. Nombra animales</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p3" name="p3" value="{{$test_lenguaje->p3}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12  custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p3_perro" id="p3_perro">
                                                                    <label class="custom-control-label" for="p3_perro">Perro</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p3_gato" id="p3_gato">
                                                                    <label class="custom-control-label" for="p3_gato">Gato</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p3_chancho" id="p3_chancho">
                                                                    <label class="custom-control-label" for="p3_chancho">Chancho</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p3_pato" id="p3_pato">
                                                                    <label class="custom-control-label" for="p3_pato">Pato</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12  custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p3_paloma" id="p3_paloma">
                                                                    <label class="custom-control-label" for="p3_paloma">Paloma</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p3_oveja" id="p3_oveja">
                                                                    <label class="custom-control-label" for="p3_oveja">Oveja</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p3_tortuga" id="p3_tortuga">
                                                                    <label class="custom-control-label" for="p3_tortuga">Tortuga</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p3_gallina" id="p3_gallina">
                                                                    <label class="custom-control-label" for="p3_gallina">Gallina</label>
                                                                </div>

                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p4">4.Nombra objetos:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p4" name="p4" value="{{$test_lenguaje->p4}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12  custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p4_paraguas" id="p4_paraguas">
                                                                    <label class="custom-control-label" for="p4_paraguas">Paraguas</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p4_vela" id="p4_vela">
                                                                    <label class="custom-control-label" for="p4_vela">Vela</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" name="p4_escoba" id="p4_escoba">
                                                                    <label class="custom-control-label" for="p4_escoba">Escoba</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p4_tetera" name="p4_tetera">
                                                                    <label class="custom-control-label" for="p4_tetera">Tetera</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12  custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p4_zapatos" name="p4_zapatos">
                                                                    <label class="custom-control-label" for="p4_zapatos">Zapato</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p4_reloj" name="p4_reloj">
                                                                    <label class="custom-control-label" for="p4_reloj">Reloj</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p4_serrucho" name="p4_serrucho">
                                                                    <label class="custom-control-label" for="p4_serrucho">Serrucho</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p4_taza" name="p4_taza">
                                                                    <label class="custom-control-label" for="p4_taza">Taza</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p5">5.Reconoce largo y corto:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p5" name="p5" value="{{$test_lenguaje->p5}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p5_largo" name="p5_largo">
                                                                    <label class="custom-control-label" for="p5_largo">Largo</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p5_largo" name="p5_largo">
                                                                    <label class="custom-control-label" for="p5_largo">Corto</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p6">6.Verbaliza acciones:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p6" name="p6" value="{{$test_lenguaje->p6}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12  custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p6_cortando" name="p6_cortando">
                                                                    <label class="custom-control-label" for="p6_cortando">Cortando</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p6_saltando" name="p6_saltando">
                                                                    <label class="custom-control-label" for="p6_saltando">Saltando</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p6_planchando" name="p6_planchando">
                                                                    <label class="custom-control-label" for="p6_planchando">Planchando</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p6_comiendo" name="p6_comiendo">
                                                                    <label class="custom-control-label" for="p6_comiendo">Comiendo</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p7">7.Conoce la utilidad de objetos:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p7" name="p7" value="{{$test_lenguaje->p7}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12  custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p7_cuchara" name="p7_cuchara">
                                                                    <label class="custom-control-label" for="p7_cuchara">Cuchara</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p7_lapiz" name="p7_lapiz">
                                                                    <label class="custom-control-label" for="p7_lapiz">Lápiz</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p7_jabon" name="p7_jabon">
                                                                    <label class="custom-control-label" for="p7_jabon">Jabón</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p7_escoba" name="p7_escoba">
                                                                    <label class="custom-control-label" for="p7_escoba">Escoba</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p7_cama" name="p7_cama">
                                                                    <label class="custom-control-label" for="p7_cama">Cama</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p7_tijera" name="p7_tijera">
                                                                    <label class="custom-control-label" for="p7_tijera">Tijera</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p8">8. Discrimina pesado y liviano:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p8" name="p8" value="{{$test_lenguaje->p8}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p8_pesado" name="p8_pesado">
                                                                    <label class="custom-control-label" for="p8_pesado">Pesado</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p8_liviano" name="p8_liviano">
                                                                    <label class="custom-control-label" for="p8_liviano">Liviano</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p9">9.Verbaliza su nombre y apellido:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p9" name="p9" value="{{$test_lenguaje->p9}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p9_nombre" name="p9_nombre">
                                                                    <label class="custom-control-label" for="p9_nombre">Nombre</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p9_apellido" name="p9_apellido">
                                                                    <label class="custom-control-label" for="p9_apellido">Apellido</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p10">10.Identifica su sexo:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p10" name="p10" value="{{$test_lenguaje->p10}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p11">11.Conoce el nombre de sus padres:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p11" name="p11" value="{{$test_lenguaje->p11}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p11_papa" name="p11_papa">
                                                                    <label class="custom-control-label" for="p11_papa">Papá</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p11_mama" name="p11_mama">
                                                                    <label class="custom-control-label" for="p11_mama">Mamá</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p12">12.Da respuestas coherentes a situaciones planteadas:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p12" name="p12" value="{{$test_lenguaje->p12}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p12_hambre" name="p12_hambre">
                                                                    <label class="custom-control-label" for="p12_hambre">Hambre</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p12_cansado" name="p12_cansado">
                                                                    <label class="custom-control-label" for="p12_cansado">Cansado</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p12_frio" name="p12_frio">
                                                                    <label class="custom-control-label" for="p12_frio">Frío</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p13">13.Comprende preposiciones:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p13" name="p13" value="{{$test_lenguaje->p13}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p13_detras"name="p13_detras">
                                                                    <label class="custom-control-label" for="p13_detras">Detrás</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p13_sobre"name="p13_sobre">
                                                                    <label class="custom-control-label" for="p13_sobre">Sobre</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p13_bajo"name="p13_bajo">
                                                                    <label class="custom-control-label" for="p13_bajo">Bajo</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p14">14.Razona por analogías compuestas:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p14" name="p14" value="{{$test_lenguaje->p14}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p14_hielo" name="p14_hielo">
                                                                    <label class="custom-control-label" for="p14_hielo">Hielo</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p14_raton" name="p14_raton">
                                                                    <label class="custom-control-label" for="p14_raton">Ratón</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p14_mama" name="p14_mama">
                                                                    <label class="custom-control-label" for="p14_mama">Mamá</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p15">15.Nombra colores:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p15" name="p15" value="{{$test_lenguaje->p15}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p15_azul" name="p15_azul">
                                                                    <label class="custom-control-label" for="p15_azul">Azul</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p15_amarillo" name="p15_amarillo">
                                                                    <label class="custom-control-label" for="p15_amarillo">Amarrillo</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p15_rojo" name="p15_rojo">
                                                                    <label class="custom-control-label" for="p15_rojo">Rojo</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p16">16.Señala colores:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p16" name="p16" value="{{$test_lenguaje->p16}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p16_azul" name="p16_azul">
                                                                    <label class="custom-control-label" for="p16_azul">Azul</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p16_amarillo" name="p16_amarillo">
                                                                    <label class="custom-control-label" for="p16_amarillo">Amarrillo</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p16_rojo" name="p16_rojo">
                                                                    <label class="custom-control-label" for="p16_rojo">Rojo</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p17">17.Nombra figuras geométricas:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p17" name="p17" value="{{$test_lenguaje->p17}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p17_circulo" name="p17_circulo">
                                                                    <label class="custom-control-label" for="p17_circulo">Círculo</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p17_cuadrado" name="p17_cuadrado">
                                                                    <label class="custom-control-label" for="p17_cuadrado">Cuadrado</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p17_tringulo" name="p17_tringulo">
                                                                    <label class="custom-control-label" for="p17_tringulo">Triángulo</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p18">18.Señala figuras geométricas:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p18" name="p18" value="{{$test_lenguaje->p18}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p18_circulo" name="p18_circulo">
                                                                    <label class="custom-control-label" for="p18_circulo">Círculo</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p18_cuadrado" name="p18_cuadrado">
                                                                    <label class="custom-control-label" for="p18_cuadrado">Cuadrado</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p18_triangulo" name="p18_triangulo">
                                                                    <label class="custom-control-label" for="p18_triangulo">Triángulo</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p19">19.Describe escenas:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p19" name="p19" value="{{$test_lenguaje->p19}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p19_13" name="p19_13">
                                                                    <label class="custom-control-label" for="p19_13">13</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p19_14" name="p19_14">
                                                                    <label class="custom-control-label" for="p19_14">14</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="pat_concom">20.Reconoce absurdos:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p20" name="p20" value="{{$test_lenguaje->p20}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p21">21.Usa plurales:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p21" name="p21" value="{{$test_lenguaje->p21}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p22">22.Reconoce antes y después:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p22" name="p22" value="{{$test_lenguaje->p22}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p22_antes" name="p22_antes">
                                                                    <label class="custom-control-label" for="p22_antes">Antes</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p22_despues" name="p22_despues">
                                                                    <label class="custom-control-label" for="p22_despues">Después</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p23">23.Define palabras:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p23" name="p23" value="{{$test_lenguaje->p23}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12  custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p23_manzana" name="p23_manzana">
                                                                    <label class="custom-control-label" for="p23_manzana">Manzana</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p23_pelota" name="p23_pelota">
                                                                    <label class="custom-control-label" for="p23_pelota">Pelota</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p23_zapato" name="p23_zapato">
                                                                    <label class="custom-control-label" for="p23_zapato">Zapato</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p23_abrigo" name="p23_abrigo">
                                                                    <label class="custom-control-label" for="p23_abrigo">Abrigo</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-3" for="p24">24.Nombra características de objetos:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="p24" name="p24" value="{{$test_lenguaje->p24}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12  custom-checkbox">
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p24_pelota" name="p24_pelota">
                                                                    <label class="custom-control-label" for="p24_pelota">Pelota</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p24_globo" name="p24_globo">
                                                                    <label class="custom-control-label" for="p24_globo">Globo</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="custom-control-input" id="p24_bolsa" name="p24_bolsa">
                                                                    <label class="custom-control-label" for="p24_bolsa">Bolsa</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="total2">Total subtest lenguaje:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control onlynumbers" id="total2" name="total2" value="{{ old('total2') }}"  placeholder="" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    <!-- STEP 3 -->
                                                        <div class='step-pane active' data-step='3'>
                                                            <div class="col-md-12">
                                                                <h3>3. Sub-test motricidad</h3>
                                                                <hr/>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-5" for="salta">1.Salta con los dos pies juntos en el mismo lugar:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="salta" name="salta" value="{{$test_motricidad->salta}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-5" for="camina">2.Camina diez pasos llevando un vaso lleno de agua:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="camina" name="camina" value="{{$test_motricidad->camina}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-5" for="lanza">3.Lanza una pelota en una dirección determinada:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="lanza" name="lanza" value="{{$test_motricidad->lanza}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-5" for="para_10">4.Se para en un pie sin apoyo 10 segundos o más:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="para_10" name="para_10" value="{{$test_motricidad->para_10}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-5" for="para_5">5.Se para en un pie sin apoyo 5 segundos o más:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="para_5" name="para_5" value="{{$test_motricidad->para_5}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-5" for="para_1">6.Se para en un pie 1 segundos o más:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="para_1" name="para_1" value="{{$test_motricidad->para_1}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-5" for="camina_punta">7.Camina en punta de pies seis o más pasos:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="camina_punta" name="camina_punta" value="{{$test_motricidad->camina_punta}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-5" for="salta_20">8.Salta 20 cms. con los pies juntos:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="salta_20" name="salta_20" value="{{$test_motricidad->salta_20}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-5" for="salta_3">9.Salta en un pie tres o más veces sin apoyo:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="salta_3" name="salta_3" value="{{$test_motricidad->salta_3}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-5" for="coge">10.Coge una pelota:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="coge" name="coge" value="{{$test_motricidad->coge}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-5" for="camina_adelante">11.Camina hacia delante topando punta y talón:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="camina_adelante" name="camina_adelante" value="{{$test_motricidad->camina_adelante}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div style="margin:5px;" class="col-md-12 form-group">
                                                                <label style="padding-top: 5px;" class="col-md-5" for="camina_atras">12.Camina hacia atrás topando punta y talón:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control" id="camina_atras" name="camina_atras" value="{{$test_motricidad->camina_atras}}"  placeholder="Si/No" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3" for="total3">Total subtest motricidad:</label>
                                                                <div class="col-md-2">
                                                                    <input class="form-control onlynumbers" id="total3" name="total3" value="{{ old('total3') }}"  placeholder="" type="text" maxlength="2">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>

                                                        </div>
                                                    <!-- STEP 4 -->
                                                        <div class='step-pane active' data-step='4'>
                                                            <div class="col-md-12">
                                                                <h3>Resultados</h3>
                                                                <hr/>
                                                                <h4>1.- Coordinación</h4>
                                                                <div class="col-md-12 form-group">
                                                                    <label class="col-md-2" for="pat_concom">Puntaje bruto:</label>
                                                                    <label class="col-md-2" for="pat_concom">Puntaje T:</label>
                                                                    <label class="col-md-2" for="pat_concom">Categoría:</label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <div class="col-md-2">
                                                                        <input class="form-control onlynumbers" id="total_coordinacion" name="total_coordinacion" value="{{ old('total_coordinacion') }}"  placeholder="" type="text" maxlength="10">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <input class="form-control onlynumbers" id="pt_coordinacion" name="pt_coordinacion" value="{{ old('pt_coordinacion') }}"  placeholder="" type="text" maxlength="10">
                                                                    </div>
                                                                    <div class="col-md-2 custom-control">
                                                                        <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                            <input name='categ_coordinacion' id="categ_coordinacion" type='radio' value='Retraso'>
                                                                            Retraso
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-2 custom-control">
                                                                        <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                            <input name='categ_coordinacion' id="categ_coordinacion" type='radio' value='Riesgo'>
                                                                            Riesgo
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-2 custom-control">
                                                                        <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                            <input name='categ_coordinacion' id="categ_coordinacion" type='radio' value='Normal'>
                                                                            Normal
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <h4>2.-Lenguaje</h4>
                                                                <div class="col-md-12 form-group">
                                                                    <label class="col-md-2" for="pat_concom">Puntaje bruto:</label>
                                                                    <label class="col-md-2" for="pat_concom">Puntaje T:</label>
                                                                    <label class="col-md-2" for="pat_concom">Categoría:</label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <div class="col-md-2">
                                                                        <input class="form-control onlynumbers" id="total_lenguaje" name="total_lenguaje" value="{{ old('total_lenguaje') }}"  placeholder="" type="text" maxlength="10">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <input class="form-control onlynumbers" id="pt_lenguaje" name="pt_lenguaje" value="{{ old('pt_lenguaje') }}"  placeholder="" type="text" maxlength="10">
                                                                    </div>

                                                                    <div class="col-md-2 custom-control">
                                                                        <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                            <input name='categ_lenguaje' id="categ_lenguaje" type='radio' value='Retraso'>
                                                                            Retraso
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-2 custom-control">
                                                                        <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                            <input name='categ_lenguaje' id="categ_lenguaje" type='radio' value='Riesgo'>
                                                                            Riesgo
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-2 custom-control">
                                                                        <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                            <input name='categ_lenguaje' id="categ_lenguaje" type='radio' value='Normal'>
                                                                            Normal
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <h4>3.- Motricidad</h4>
                                                                <div class="col-md-12 form-group">
                                                                    <label class="col-md-2" for="pat_concom">Puntaje bruto:</label>
                                                                    <label class="col-md-2" for="pat_concom">Puntaje T:</label>
                                                                    <label class="col-md-2" for="pat_concom">Categoría:</label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <div class="col-md-2">
                                                                        <input class="form-control onlynumbers" id="total_motricidad" name="total_motricidad" value="{{ old('total_motricidad') }}"  placeholder="" type="text" maxlength="10">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <input class="form-control onlynumbers" id="pt_motricidad" name="pt_motricidad" value="{{ old('pt_motricidad') }}"  placeholder="" type="text" maxlength="10">
                                                                    </div>
                                                                    <div class="col-md-2 custom-control">
                                                                        <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                            <input name='categ_motricidad' id="categ_motricidad" type='radio' value='Retraso'>
                                                                            Retraso
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-2 custom-control">
                                                                        <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                            <input name='categ_motricidad' id="categ_motricidad" type='radio' value='Riesgo'>
                                                                            Riesgo
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-2 custom-control">
                                                                        <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                            <input name='categ_motricidad' id="categ_motricidad" type='radio' value='Normal'>
                                                                            Normal
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <h4>Resultado total del test</h4>
                                                                <div class="col-md-12 form-group">
                                                                    <label class="col-md-2" for="pat_concom">Puntaje bruto:</label>
                                                                    <label class="col-md-2" for="pat_concom">Puntaje T:</label>
                                                                    <label class="col-md-2" for="pat_concom">Categoría:</label>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <div class="col-md-2">
                                                                        <input class="form-control onlynumbers" id="total" name="total" value="{{ old('total') }}"  placeholder="" type="text" maxlength="10">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <input class="form-control onlynumbers" id="pt" name="pt" value="{{ old('pt') }}"  placeholder="" type="text" maxlength="10">
                                                                    </div>
                                                                    <div class="col-md-2 custom-control">
                                                                        <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                            <input name='categ' id="categ" type='radio' value='Retraso'>
                                                                            Retraso
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-2 custom-control">
                                                                        <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                            <input name='categ' id="categ" type='radio' value='Riesgo'>
                                                                            Riesgo
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-2 custom-control">
                                                                        <label style="margin-top: 0px;" class='radio radio-inline'>
                                                                            <input name='categ' id="categ" type='radio' value='Normal'>
                                                                            Normal
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label" for="observacion">Observaciones</label>
                                                                    <div class="controls">
                                                                        <textarea name="observacion" id="observacion" class='form-control' data-char-allowed='600' data-char-warning='10' rows='3' style='margin-bottom:10px;' value="{{ old('observacion') }}" id="" maxlength="600"></textarea>
                                                                    </div>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{ csrf_field() }}
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.footer')

                <div class="modal-custom">
                    <div class='modal fade' id='confirmation' tabindex='-1'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
                                    <h3 class='modal-title' id='myModalLabel'>Confirmación</h3>
                                </div>
                                <div class='modal-body'>
                                    <h5>A continuación se muestran todos los datos ingresados para el formulario de evaluación inicial. Favor leer detalladamente y confirmar con el botón registrar. De lo contrario, vuelva y modifique los datos que sean necesarios.</h5>
                                    <hr>

                                </div>
                                <div class='modal-footer'>
                                    <button class='btn btn-default' data-dismiss='modal' type='button'>Volver</button>
                                    <button class='btn btn-success' type='button' onclick="enviarFormulario()">Registrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    /**
                     * Envia el formulario cuando ya fueron revisados todos los datos
                     */
                    function enviarFormulario(){

                        $('#formulario_registro').submit();
                    }
                </script>

            </div>
        </section>
    </div>
@endsection
