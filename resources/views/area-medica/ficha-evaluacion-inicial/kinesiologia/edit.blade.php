@extends("layouts.master")

@section("title")
    Ficha Kinesiología - OID
@endsection

@section("styles_before")
    <link href="{{ asset("/assets/stylesheets/plugins/fuelux/wizard.css") }}" rel="stylesheet" type="text/css"
          media="all"/>
@endsection

@section("styles")
    <link href="{{ asset("/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css") }}"
          rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset("/assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css") }}"
          rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset("/assets/images/meta_icons/apple-touch-icon-precomposed.png") }}"
          rel="apple-touch-icon-precomposed">
    <link href="{{ asset('/assets/stylesheets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css"
          media="all"/>
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all"/>
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
    <script src="{{ asset("/assets/javascripts/plugins/fuelux/wizard.js") }}" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->


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
    <script src="{{ asset('/js/area-medica/FormularioKinesiologia.js') }}" type="text/javascript"></script>
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
                                        <span>Evaluación Inicial Kinesiología: {{$persona->nombreCompleto()}}</span>
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
                                                    <button id="continuar_btn" type='submit'
                                                            class='pull-right btn btn-md btn-success btn-next'
                                                            data-last='Finalizar'>
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
                                                <form role="form" id="formulario_registro"
                                                      action="{{route('area-medica.ficha-evaluacion-inicial.kinesiologia.update')}}"
                                                      accept-charset="UTF-8" style="margin-bottom: 0;" method="post">
                                                    <div class='step-content'>
                                                        <!-- STEP 1 -->
                                                        <div class='step-pane active' data-step='1'>
                                                            <input id="id" name="id" type="hidden" value="{{$id}}">
                                                            <input id="beneficiario_id" name="beneficiario_id" type="hidden" value="{{$persona->id}}">
                                                            <div class="col-md-12">
                                                                <h3>Antecedentes Morbidos</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="pat_concom">Patologías
                                                                    Concomitantes</label>
                                                                <div class="controls">
                                                                    <input class="form-control" id="pat_concom"
                                                                           name="pat_concom"
                                                                           value="{{ $antecedentesMorbidos->pat_concom }}"
                                                                           placeholder="Patologías Concomitantes"
                                                                           type="text" maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label"
                                                                       for="alergias">Alergias</label>
                                                                <div class="controls">
                                                                    <input class="form-control" id="alergias"
                                                                           name="alergias"
                                                                           value="{{ $antecedentesMorbidos->alergias }}"
                                                                           placeholder="Alergias" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="medicamentos">Medicamentos</label>
                                                                <div class="controls">
                                                                    <input class="form-control" id="medicamentos"
                                                                           name="medicamentos"
                                                                           value="{{ $antecedentesMorbidos->medicamentos }}"
                                                                           placeholder="Medicamentos" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="ant_quir">Antecedentes
                                                                    Quirúrgicos</label>
                                                                <div class="controls">
                                                                    <input class="form-control" id="ant_quir"
                                                                           name="ant_quir"
                                                                           value="{{ $antecedentesMorbidos->ant_quir }}"
                                                                           placeholder="Antecedentes Quirúrgicos"
                                                                           type="text" maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label"
                                                                       for="aparatos">Aparatos</label>
                                                                <div class="controls">
                                                                    <input class="form-control" id="aparatos"
                                                                           name="aparatos"
                                                                           value="{{ $antecedentesMorbidos->aparatos}}"
                                                                           placeholder="Aparatos" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                @if($antecedentesMorbidos->fuma_sn=='Si')
                                                                    <div class="col-md-4">
                                                                        <label class="col-md-5 control-label"
                                                                               for="fuma_sn">¿Fuma?</label>
                                                                        <div class='col-md-7'>
                                                                            <label style="margin-top: 0px;"
                                                                                   class='radio radio-inline'>
                                                                                <input name='fuma_sn' id="fuma_sn"
                                                                                       type='radio' checked value='Si'>
                                                                                Si
                                                                            </label>
                                                                            <label class='radio radio-inline'>
                                                                                <input name='fuma_sn' id="fuma_sn"
                                                                                       type='radio' value='No'>
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                        <div class="help-block with-errors">
                                                                        </div>
                                                                    </div>
                                                                @elseif($antecedentesMorbidos->fuma_sn=='No')
                                                                    <div class="col-md-4">
                                                                        <label class="col-md-5 control-label"
                                                                               for="fuma_sn">¿Fuma?</label>
                                                                        <div class='col-md-7'>
                                                                            <label style="margin-top: 0px;"
                                                                                   class='radio radio-inline'>
                                                                                <input name='fuma_sn' id="fuma_sn"
                                                                                       type='radio' value='Si'>
                                                                                Si
                                                                            </label>
                                                                            <label class='radio radio-inline'>
                                                                                <input name='fuma_sn' id="fuma_sn"
                                                                                       type='radio' checked value='No'>
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                        <div class="help-block with-errors">
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="col-md-4">
                                                                        <label class="col-md-5 control-label"
                                                                               for="fuma_sn">¿Fuma?</label>
                                                                        <div class='col-md-7'>
                                                                            <label style="margin-top: 0px;"
                                                                                   class='radio radio-inline'>
                                                                                <input name='fuma_sn' id="fuma_sn"
                                                                                       type='radio' value='Si'>
                                                                                Si
                                                                            </label>
                                                                            <label class='radio radio-inline'>
                                                                                <input name='fuma_sn' id="fuma_sn"
                                                                                       type='radio' value='No'>
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                        <div class="help-block with-errors">
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @if($antecedentesMorbidos->alcohol_sn =='Si' )
                                                                    <div class="col-md-4">
                                                                        <label class="col-md-5 control-label"
                                                                               for="alcohol_sn">¿Bebe OH?</label>
                                                                        <div class='col-md-7'>
                                                                            <label style="margin-top: 0px;"
                                                                                   class='radio radio-inline'>
                                                                                <input name='alcohol_sn' id="alcohol_sn"
                                                                                       type='radio' checked value='Si'>
                                                                                Si
                                                                            </label>
                                                                            <label class='radio radio-inline'>
                                                                                <input name='alcohol_sn' id="alcohol_sn"
                                                                                       type='radio' value='No'>
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                        <div class="help-block with-errors">
                                                                        </div>
                                                                    </div>
                                                                @elseif($antecedentesMorbidos->alcohol_sn=='No')
                                                                    <div class="col-md-4">
                                                                        <label class="col-md-5 control-label"
                                                                               for="alcohol_sn">¿Bebe OH?</label>
                                                                        <div class='col-md-7'>
                                                                            <label style="margin-top: 0px;"
                                                                                   class='radio radio-inline'>
                                                                                <input name='alcohol_sn' id="alcohol_sn"
                                                                                       type='radio' value='Si'>
                                                                                Si
                                                                            </label>
                                                                            <label class='radio radio-inline'>
                                                                                <input name='alcohol_sn' id="alcohol_sn"
                                                                                       type='radio' checked value='No'>
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                        <div class="help-block with-errors">
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="col-md-4">
                                                                        <label class="col-md-5 control-label"
                                                                               for="alcohol_sn">¿Bebe OH?</label>
                                                                        <div class='col-md-7'>
                                                                            <label style="margin-top: 0px;"
                                                                                   class='radio radio-inline'>
                                                                                <input name='alcohol_sn' id="alcohol_sn"
                                                                                       type='radio' value='Si'>
                                                                                Si
                                                                            </label>
                                                                            <label class='radio radio-inline'>
                                                                                <input name='alcohol_sn' id="alcohol_sn"
                                                                                       type='radio' value='No'>
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                        <div class="help-block with-errors">
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                    @if($antecedentesMorbidos->act_fisica_sn=='Si' )
                                                                        <div class="col-md-4">
                                                                            <label class="col-md-5 control-label"
                                                                                   for="act_fisica_sn">Act. física</label>
                                                                            <div class='col-md-7'>
                                                                                <label style="margin-top: 0px;"
                                                                                       class='radio radio-inline'>
                                                                                    <input name='act_fisica_sn'
                                                                                           id="act_fisica_sn" type='radio'
                                                                                           value='Si' checked>
                                                                                    Si
                                                                                </label>
                                                                                <label class='radio radio-inline'>
                                                                                    <input name='act_fisica_sn'
                                                                                           id="act_fisica_sn" type='radio'
                                                                                           value='No'>
                                                                                    No
                                                                                </label>
                                                                            </div>
                                                                            <div class="help-block with-errors">
                                                                            </div>
                                                                        </div>
                                                                    @elseif($antecedentesMorbidos->act_fisica_sn=='No')
                                                                        <div class="col-md-4">
                                                                            <label class="col-md-5 control-label"
                                                                                   for="act_fisica_sn">Act. física</label>
                                                                            <div class='col-md-7'>
                                                                                <label style="margin-top: 0px;"
                                                                                       class='radio radio-inline'>
                                                                                    <input name='act_fisica_sn'
                                                                                           id="act_fisica_sn" type='radio'
                                                                                           value='Si'>
                                                                                    Si
                                                                                </label>
                                                                                <label class='radio radio-inline'>
                                                                                    <input name='act_fisica_sn'
                                                                                           id="act_fisica_sn" type='radio'
                                                                                           value='No' checked>
                                                                                    No
                                                                                </label>
                                                                            </div>
                                                                            <div class="help-block with-errors">
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                <div class="col-md-4">
                                                                    <label class="col-md-5 control-label"
                                                                           for="act_fisica_sn">Act. física</label>
                                                                    <div class='col-md-7'>
                                                                        <label style="margin-top: 0px;"
                                                                               class='radio radio-inline'>
                                                                            <input name='act_fisica_sn'
                                                                                   id="act_fisica_sn" type='radio'
                                                                                   value='Si'>
                                                                            Si
                                                                        </label>
                                                                        <label class='radio radio-inline'>
                                                                            <input name='act_fisica_sn'
                                                                                   id="act_fisica_sn" type='radio'
                                                                                   value='No'>
                                                                            No
                                                                        </label>
                                                                    </div>
                                                                    <div class="help-block with-errors">
                                                                    </div>
                                                                </div>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                        <!-- STEP 2 -->
                                                        <div class='step-pane active' data-step='2'>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="situacion_familiar">1.
                                                                    Situación Familiar</label>
                                                                <div class="controls">
                                                                    <textarea name="situacion_familiar"
                                                                              class='form-control'
                                                                              data-char-allowed='200'
                                                                              data-char-warning='10'
                                                                              placeholder='¿Con quien?¿Accesibilidad?'
                                                                              rows='3' style='margin-bottom:10px;'
                                                                              value="{{ $fichaKinesiologia->situacion_familiar}}"
                                                                              id="situacion_familiar"
                                                                              maxlength="200">{{ $fichaKinesiologia->situacion_familiar}}</textarea>
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="situacion_laboral">2.
                                                                    Situación Laboral</label>
                                                                <div class="controls">
                                                                    <textarea name="situacion_laboral"
                                                                              class='form-control'
                                                                              data-char-allowed='200'
                                                                              data-char-warning='10'
                                                                              placeholder='Situación Laboral' rows='3'
                                                                              style='margin-bottom:10px;'
                                                                              value="{{ $fichaKinesiologia->situacion_laboral}}"
                                                                              id="situacion_laboral"
                                                                              maxlength="200">{{ $fichaKinesiologia->situacion_laboral}}</textarea>
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="asiste_centro_rhb">3.
                                                                    ¿Asiste algún centro de RHB?</label>
                                                                <div class="controls">
                                                                    <textarea name="asiste_centro_rhb"
                                                                              class='form-control'
                                                                              data-char-allowed='200'
                                                                              data-char-warning='10'
                                                                              placeholder='¿Asiste algún centro de RHB?'
                                                                              rows='3' style='margin-bottom:10px;'
                                                                              value="{{$fichaKinesiologia->situacion_familiar }}"
                                                                              id="asiste_centro_rhb"
                                                                              maxlength="200">{{$fichaKinesiologia->situacion_familiar }}</textarea>
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="control-label" for="motivo_consulta">4.
                                                                    Motivo de Consulta</label>
                                                                <div class="controls">
                                                                    <textarea name="motivo_consulta"
                                                                              class='form-control'
                                                                              data-char-allowed='200'
                                                                              data-char-warning='10'
                                                                              placeholder='Motivo de Consulta' rows='3'
                                                                              style='margin-bottom:10px;'
                                                                              value="{{ $fichaKinesiologia->motivo_consulta }}"
                                                                              id="motivo_consulta"
                                                                              maxlength="200">{{ $fichaKinesiologia->motivo_consulta }}</textarea>
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 3 -->
                                                        <div class='step-pane active' data-step='3'>
                                                            <div class="col-md-12">
                                                                <h3>Escala de Valoración Funcional</h3>
                                                                <h5>Escala de puntajes entre  1 - 7.</h5>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="col-md-4">
                                                                    <h4>Categoría</h4>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <h4>Puntaje</h4>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h4>Comentarios</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5>Autocuidado</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_alimentacion">1.
                                                                    Alimentación</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_alimentacion"
                                                                           name="puntaje_alimentacion"
                                                                           value="{{  $valAutocuidado->puntaje_alimentacion  }}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_alimentacion"
                                                                           name="coment_alimentacion"
                                                                           value="{{ $valAutocuidado->coment_alimentacion  }}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label "
                                                                       for="puntaje_arreglo_pers">2. Arreglo
                                                                    Personal</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_arreglo_pers"
                                                                           name="puntaje_arreglo_pers"
                                                                           value="{{$valAutocuidado->puntaje_arreglo_pers}}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_arreglo_pers"
                                                                           name="coment_arreglo_pers"
                                                                           value="{{  $valAutocuidado->coment_arreglo_pers}}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_bano">3. Baño</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_bano" name="puntaje_bano"
                                                                           value="{{ $valAutocuidado->puntaje_bano}}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_bano"
                                                                           name="coment_bano"
                                                                           value="{{ $valAutocuidado->coment_bano  }}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_vest_sup">4. Vestuario
                                                                    Superior</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_vest_sup" name="puntaje_vest_sup"
                                                                           value="{{ $valAutocuidado->puntaje_vest_sup }}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_vest_sup"
                                                                           name="coment_vest_sup"
                                                                           value="{{ $valAutocuidado->coment_vest_sup }}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_vest_inf">5. Vestuario
                                                                    Inerior</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_vest_inf" name="puntaje_vest_inf"
                                                                           value="{{$valAutocuidado->puntaje_vest_inf  }}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_vest_inf"
                                                                           name="coment_vest_inf"
                                                                           value="{{ $valAutocuidado->coment_vest_inf}}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_aseo_pers">6. Aseo Personal</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_aseo_pers"
                                                                           name="puntaje_aseo_pers"
                                                                           value="{{ $valAutocuidado->puntaje_aseo_pers  }}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_aseo_pers"
                                                                           name="coment_aseo_pers"
                                                                           value="{{ $valAutocuidado->coment_aseo_pers }}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5>Control de Esfinteres</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_control_vejiga">1. Control de
                                                                    Vejiga</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_control_vejiga"
                                                                           name="puntaje_control_vejiga"
                                                                           value="{{ $valControlEsfinter->puntaje_control_vejiga }}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control"
                                                                           id="coment_control_vejiga"
                                                                           name="coment_control_vejiga"
                                                                           value="{{ $valControlEsfinter->coment_control_vejiga}}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_control_intestino">2. Control de
                                                                    Instestino</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_control_intestino"
                                                                           name="puntaje_control_intestino"
                                                                           value="{{ $valControlEsfinter->puntaje_control_intestino }}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control"
                                                                           id="coment_control_intestino"
                                                                           name="coment_control_intestino"
                                                                           value="{{  $valControlEsfinter->coment_control_intestino }}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5>Movilidad</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_trans_cama_silla">1. Transferencia
                                                                    cama-silla</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_trans_cama_silla"
                                                                           name="puntaje_trans_cama_silla"
                                                                           value="{{ $valMovilidad->puntaje_trans_cama_silla}}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control"
                                                                           id="coment_trans_cama_silla"
                                                                           name="coment_trans_cama_silla"
                                                                           value="{{$valMovilidad->coment_trans_cama_silla}}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_traslado_bano">2. Traslado
                                                                    baño</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_traslado_bano"
                                                                           name="puntaje_traslado_bano"
                                                                           value="{{ $valMovilidad->puntaje_traslado_bano }}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control"
                                                                           id="coment_traslado_bano"
                                                                           name="coment_traslado_bano"
                                                                           value="{{ $valMovilidad->coment_traslado_bano }}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_traslado_ducha">3. Traslado
                                                                    ducha</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_traslado_ducha"
                                                                           name="puntaje_traslado_ducha"
                                                                           value="{{$valMovilidad->puntaje_traslado_ducha }}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control"
                                                                           id="coment_traslado_ducha"
                                                                           name="coment_traslado_ducha"
                                                                           value="{{ $valMovilidad->coment_traslado_ducha }}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5>Deambulación</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_desp_caminando">1. Desplazarse
                                                                    caminando/sr</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_desp_caminando"
                                                                           name="puntaje_desp_caminando"
                                                                           value="{{ $valDeambulacion->puntaje_desp_caminando}}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control"
                                                                           id="coment_desp_caminando"
                                                                           name="coment_desp_caminando"
                                                                           value="{{ $valDeambulacion->coment_desp_caminando  }}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_escaleras">2. Subir y bajar
                                                                    escaleras</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_escaleras"
                                                                           name="puntaje_escaleras"
                                                                           value="{{  $valDeambulacion->puntaje_escaleras}}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_escaleras"
                                                                           name="coment_escaleras"
                                                                           value="{{ $valDeambulacion->coment_escaleras}}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5>Comunicación/Cognitivo</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_expresion">1. Expresión</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_expresion"
                                                                           name="puntaje_expresion"
                                                                           value="{{$valComCog->puntaje_expresion }}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_expresion"
                                                                           name="coment_expresion"
                                                                           value="{{  $valComCog->coment_expresion }}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_comprension">2. Comprensión</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_comprension"
                                                                           name="puntaje_comprension"
                                                                           value="{{  $valComCog->puntaje_comprension }}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_comprension"
                                                                           name="coment_comprension"
                                                                           value="{{ $valComCog->coment_comprension  }}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5>Social</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_int_social">1. Interacción
                                                                    social</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_int_social"
                                                                           name="puntaje_int_social"
                                                                           value="{{ $valSocial->puntaje_int_social  }}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_int_social"
                                                                           name="coment_int_social"
                                                                           value="{{ $valSocial->coment_int_social  }}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_sol_problemas">2. Solución de
                                                                    problemas</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_sol_problemas"
                                                                           name="puntaje_sol_problemas"
                                                                           value="{{ $valSocial->puntaje_sol_problemas  }}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control"
                                                                           id="coment_sol_problemas"
                                                                           name="coment_sol_problemas"
                                                                           value="{{ $valSocial->coment_sol_problemas  }}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-4 control-label"
                                                                       for="puntaje_memoria">3. Memoria</label>
                                                                <div class="col-md-2 controls">
                                                                    <input class="form-control onlynumbers"
                                                                           id="puntaje_memoria" name="puntaje_memoria"
                                                                           value="{{ $valSocial->puntaje_memoria }}"
                                                                           placeholder="Puntuación" type="text"
                                                                           maxlength="1">
                                                                </div>
                                                                <div class="col-md-6 controls">
                                                                    <input class="form-control" id="coment_memoria"
                                                                           name="coment_memoria"
                                                                           value="{{  $valSocial->coment_memoria  }}"
                                                                           placeholder="Comentario" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- STEP 4 -->
                                                        <div class='step-pane active' data-step='4'>
                                                            <div class="col-md-12">
                                                                <h3>Evaluación</h3>
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label"
                                                                       for="conexion_medio">1. Conexión con el
                                                                    medio</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="conexion_medio"
                                                                           name="conexion_medio"
                                                                           value="{{ $valEvaluacion->conexion_medio }}"
                                                                           placeholder="Conexión con el medio"
                                                                           type="text" maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label"
                                                                       for="nivel_cognitivo_apar">2. Nivel cognitivo
                                                                    aparente</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control"
                                                                           id="nivel_cognitivo_apar"
                                                                           name="nivel_cognitivo_apar"
                                                                           value="{{ $valEvaluacion->nivel_cognitivo_apar}}"
                                                                           placeholder="Nivel cognitivo aparente"
                                                                           type="text" maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h4>Evaluación Sensorial</h4>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="visual">1.
                                                                    Visual</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="visual"
                                                                           name="visual" value="{{$valSensorial->visual  }}"
                                                                           placeholder="Visual" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="auditivo">2.
                                                                    Auditivo</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="auditivo"
                                                                           name="auditivo" value="{{  $valSensorial->auditivo }}"
                                                                           placeholder="Auditivo" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="tactil">3.
                                                                    Táctil</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="tactil"
                                                                           name="tactil" value="{{ $valSensorial->tactil  }}"
                                                                           placeholder="Táctil" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label"
                                                                       for="propioceptivo">4. Propioceptivo</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="propioceptivo"
                                                                           name="propioceptivo"
                                                                           value="{{ $valSensorial->propioceptivo }}"
                                                                           placeholder="Propioceptivo" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="vestibular">5.
                                                                    Vestibular</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="vestibular"
                                                                           name="vestibular"
                                                                           value="{{$valSensorial->vestibular }}"
                                                                           placeholder="Vestibular" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h4>Evaluación Motora</h4>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="tono">6.
                                                                    Tono</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="tono" name="tono"
                                                                           value="{{$valMotora->tono }}" placeholder="Tono"
                                                                           type="text" maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="rom">7.
                                                                    ROM</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="rom" name="rom"
                                                                           value="{{ $valMotora->rom }}" placeholder="ROM"
                                                                           type="text" maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="dolor">8.
                                                                    Dolor</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="dolor" name="dolor"
                                                                           value="{{  $valMotora->dolor  }}"
                                                                           placeholder="Dolor" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="fm">9. Fuerza
                                                                    Muscular</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="fm" name="fm"
                                                                           value="{{   $valMotora->fm }}"
                                                                           placeholder="Fuerza Muscular" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label"
                                                                       for="hab_motrices">10. Habilidades
                                                                    Motrices</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="hab_motrices"
                                                                           name="hab_motrices"
                                                                           value="{{$valMotora->hab_motrices  }}"
                                                                           placeholder="Habilidades Motrices"
                                                                           type="text" maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label"
                                                                       for="coordinacion">11. Coordinación</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="coordinacion"
                                                                           name="coordinacion"
                                                                           value="{{$valMotora->coordinacion }}"
                                                                           placeholder="Coordinacón" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label class="col-md-3 control-label" for="equilibrio">12.
                                                                    Equilibrio</label>
                                                                <div class="col-md-9 controls">
                                                                    <input class="form-control" id="equilibrio"
                                                                           name="equilibrio"
                                                                           value="{{ $valMotora->equilibrio }}"
                                                                           placeholder="Equilibrio" type="text"
                                                                           maxlength="200">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
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
                                    <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×
                                    </button>
                                    <h3 class='modal-title' id='myModalLabel'>Confirmación</h3>
                                </div>
                                <div class='modal-body'>
                                    <h5>A continuación se muestran todos los datos ingresados para el formulario de
                                        evaluación inicial. Favor leer detalladamente y confirmar con el botón
                                        registrar. De lo contrario, vuelva y modifique los datos que sean
                                        necesarios.</h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <h4>Patologías Concomitantes</h4>
                                            <p id="pat_concom_confirmation">-</p>
                                            <h4>Alergias</h4>
                                            <p id="alergias_confirmation">-</p>
                                            <h4>Medicamentos</h4>
                                            <p id="medicamentos_confirmation">-</p>
                                            <h4>Antecedentes Quirúrgicos</h4>
                                            <p id="ant_quir_confirmation">-</p>
                                            <h4>Aparatos</h4>
                                            <p id="aparatos_confirmation">-</p>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                            <h4>1. Situación Familiar</h4>
                                            <p id="situacion_familiar_confirmation">-</p>
                                            <h4>2. Situación Laboral</h4>
                                            <p id="situacion_laboral_confirmation">-</p>
                                            <h4>3. ¿Asiste algún centro de RHB?</h4>
                                            <p id="asiste_centro_rhb_confirmation">-</p>
                                            <h4>4. Motivo de Consulta</h4>
                                            <p id="motivo_consulta_confirmation">-</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-4">
                                            <h4>¿Fuma?</h4>
                                            <p id="fuma_sn_confirmation">-</p>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <h4>¿Bebe OH?</h4>
                                            <p id="alcohol_sn_confirmation">-</p>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <h4>Act. física</h4>
                                            <p id="act_fisica_sn_confirmation">-</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4>Autocuidado</h4>
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>1. Alimentación</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_alimentacion_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_alimentacion_confirmation">-</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>2. Arreglo Personal</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_arreglo_pers_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_arreglo_pers_confirmation">-</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>3. Baño</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_bano_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_bano_confirmation">-</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>4. Vestuario Superior</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_vest_sup_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_vest_sup_confirmation">-</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>5. Vestuario Inerior</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_vest_inf_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_vest_inf_confirmation">-</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>6. Aseo Personal</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_aseo_pers_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_aseo_pers_confirmation">-</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4>Control de Esfinteres</h4>
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>1. Control de Vejiga</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_control_vejiga_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_control_vejiga_confirmation">-</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>2. Control de Instestino</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_control_intestino_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_control_intestino_confirmation">-</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4>Movilidad</h4>
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>1. Transferencia cama-silla</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_trans_cama_silla_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_trans_cama_silla_confirmation">-</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>2. Traslado baño</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_traslado_bano_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_traslado_bano_confirmation">-</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>3. Traslado ducha</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_traslado_ducha_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_traslado_ducha_confirmation">-</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4>Deambulación</h4>
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>1. Desplazarse caminando/sr</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_desp_caminando_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_desp_caminando_confirmation">-</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>2. Subir y bajar escaleras</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_escaleras_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_escaleras_confirmation">-</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4>Comunicación/Cognitivo</h4>
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>1. Expresión</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_expresion_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_expresion_confirmation">-</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>2. Comprensión</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_comprension_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_comprension_confirmation">-</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4>Social</h4>
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>1. Interacción social</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_int_social_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_int_social_confirmation">-</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>2. Solución de problemas</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_sol_problemas_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_sol_problemas_confirmation">-</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-sm-12 col-lg-5">
                                                <h4>3. Memoria</h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-1">
                                                <p id="puntaje_memoria_confirmation">-</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <p id="coment_memoria_confirmation">-</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <h4>Evaluación</h4>
                                            <div class="col-sm-12 col-lg-12">
                                                <h4>1. Conexión con el medio</h4>
                                                <p id="conexion_medio_confirmation">-</p>
                                                <h4>2. Nivel cognitivo aparente</h4>
                                                <p id="nivel_cognitivo_apar_confirmation">-</p>
                                            </div>
                                            <h4>Evaluación Sensorial</h4>
                                            <div class="col-sm-12 col-lg-12">
                                                <h4>1. Visual</h4>
                                                <p id="visual_confirmation">-</p>
                                                <h4>2. Auditivo</h4>
                                                <p id="auditivo_confirmation">-</p>
                                                <h4>3. Táctil</h4>
                                                <p id="tactil_confirmation">-</p>
                                                <h4>4. Propioceptivo</h4>
                                                <p id="propioceptivo_confirmation">-</p>
                                                <h4>5. Vestibular</h4>
                                                <p id="vestibular_confirmation">-</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                            <h4>Evaluación Motora</h4>
                                            <div class="col-sm-12 col-lg-12">
                                                <h4>6. Tono</h4>
                                                <p id="tono_confirmation">-</p>
                                                <h4>7. ROM</h4>
                                                <p id="rom_confirmation">-</p>
                                                <h4>8. Dolor</h4>
                                                <p id="dolor_confirmation">-</p>
                                                <h4>9. Fuerza Muscular</h4>
                                                <p id="fm_confirmation">-</p>
                                                <h4>10. Habilidades Motrices</h4>
                                                <p id="hab_motrices_confirmation">-</p>
                                                <h4>11. Coordinación</h4>
                                                <p id="coordinacion_confirmation">-</p>
                                                <h4>12. Equilibrio</h4>
                                                <p id="equilibrio_confirmation">-</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button class='btn btn-default' data-dismiss='modal' type='button'>Volver</button>
                                    <button class='btn btn-success' type='button' onclick="enviarFormulario()">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    /**
                     * Envia el formulario cuando ya fueron revisados todos los datos
                     */
                    function enviarFormulario() {

                        $('#formulario_registro').submit();
                    }
                </script>

            </div>
        </section>
    </div>
@endsection
