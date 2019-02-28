<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Área Social - OID
@endsection

@section("styles_before")
    <link href="{{ asset("/assets/stylesheets/plugins/fuelux/wizard.css") }}" rel="stylesheet" type="text/css"
          media="all"/>
@endsection
<!-- inyeccion de estilos -->

@section('styles')
    <link href="{{ asset('/assets/stylesheets/plugins/bootstrap_switch/bootstrap-switch.css') }}" rel="stylesheet"
          type="text/css" media="all"/>
    <link href="{{ asset('/css/social/custom.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('assets/stylesheets/plugins/fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"
          type="text/css" media="all"/>
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all"/>

@endsection

<!-- Atributos del body -->
@section('body-attr')
    class='contrast-red'
@endsection

<!-- Inyeccion de scripts
     No importa que vayan antes del body, en el master layout se estan insertando alfinal.
-->
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
    <script src="{{ asset('/assets/javascripts/plugins/validate/jquery.validate.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/validate/additional-methods.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset("/assets/javascripts/plugins/fuelux/wizard.js") }}" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->
    <script src="{{ asset('/js/social/showcontent.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/plugins/bootstrap_switch/bootstrapSwitch.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/plugins/fileinput/bootstrap-fileinput.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/plugins/fileinput/bootstrap-fileinput-fa.js') }}"
            type="text/javascript"></script>
    <!-- / START - Validaciones-->
    <script src="{{ asset('/assets/javascripts/plugins/validate/jquery.validate.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/validate/additional-methods.js') }}"
            type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.10.2/validator.min.js"></script>
    <script src="{{ asset('/assets/javascripts/plugins/1000hz-bootstrap-validator/validator.min.js') }}"></script>
    <!--<script src="{{ asset('/js/social/IngresoAtencionSocial.js') }}" type="text/javascript"></script>-->


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
                                        <span>Asistente Social</span>
                                    </h1>
                                    <div class='pull-right'>
                                        <ul class='breadcrumb'>
                                            <li>
                                                <a href='index.html'>
                                                    <i class='fa fa-list-alt'></i>
                                                </a>
                                            </li>
                                            <li class='separator'>
                                                <i class='fa fa-angle-right'></i>
                                            </li>
                                            <li>
                                                Área social
                                            </li>
                                            <li class='separator'>
                                                <i class='fa fa-angle-right'></i>
                                            </li>
                                            <li class='active'>Asistente Social</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='box'>
                                    <div class='box-content box-padding'>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <h4 style="margin-bottom:30px;">Menú Area Social</h4>
                                            </div>
                                            <a href="{{route("social.asistenteSocialGet")}}">
                                                <button type="submit" href="" class="pull-right btn ">Terminar Visita
                                                </button>
                                            </a>

                                            @if(count($errors) > 0)
                                                <hr class='hr-normal controls'>
                                                <div class="alert alert-danger">
                                                    @foreach($errors->all() as $error)
                                                        <p>{{ $error }}</p>
                                                    @endforeach
                                                </div>
                                            @endif
                                            @if (session()->has('info'))
                                                <hr class='hr-normal controls'>
                                                <div class="alert alert-success">{{ session('info') }}</div>
                                            @endif
                                            <div class='col-sm-12 form-group'>
                                                <?php $i = 1; ?>
                                                <?php $a = 1; ?>
                                                <div class="tabbable tabs-left">
                                                    <ul class="nav nav-tabs">
                                                        //
                                                        @foreach($tipoMotivoSocial as $tMotivos)
                                                            @if($i == 1)
                                                                <li class="active"><a
                                                                            href=<?php echo "#" . $tMotivos->id ?> data-toggle="tab">{{ucfirst($tMotivos->nombre)}}</a>
                                                                </li>
                                                                <?php $i = 2; ?>
                                                            @else
                                                                <li>
                                                                    <a href=<?php echo "#" . $tMotivos->id ?> data-toggle="tab">{{ucfirst($tMotivos->nombre)}}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        <?php $i = 1; ?>
                                                        @foreach($tipoMotivoSocial as $tMotivos)
                                                            @if($i == 1)
                                                                <div class="tab-pane active" id="{{$tMotivos->id}}">
                                                                    <form accept-charset="UTF-8"
                                                                          action="{{route('social.asistentesocial')}}"
                                                                          id="formularioAsistenciaSocial" class="form"
                                                                          style="margin-bottom: 0;" method="post"
                                                                          enctype="multipart/form-data">
                                                                        {!!csrf_field()!!}
                                                                        <input type="hidden" class="form-control"
                                                                               id="ben_id" name="ben_id"
                                                                               value="{{$beneficiario->id}}">
                                                                        <div class="col-sm-8">
                                                                            <fieldset name="tecnico" class="col-sm-12">
                                                                                <label class='control-label'
                                                                                       for='inputText'>Ayuda
                                                                                    Técnica</label>
                                                                                <div class="funkyradio">
                                                                                    @foreach($tipoAyudaTecnicoSocial as $tipoAyuda)
                                                                                        @if ($tipoAyuda->tipo=='Tecnico')
                                                                                            <div class="box-content"
                                                                                                 style="margin-top:10px;">
                                                                                                <input value="{{ucfirst($tipoAyuda->nombre)}}"
                                                                                                       name="tipoAyudaSocialVer[]"
                                                                                                       id="{{$tipoAyuda->id}}.t"
                                                                                                       type="hidden">
                                                                                                <input class='make-switch checkStyle'
                                                                                                       value="{{$tipoAyuda->id}}"
                                                                                                       name="tipoAyudaSocial[]"
                                                                                                       id="{{$tipoAyuda->id}}.t"
                                                                                                       data-off-text='<i class="fa fa-circle-o"></i>'
                                                                                                       data-on-text='<i class="fa fa-check"></i>'
                                                                                                       type='checkbox'>
                                                                                                <p id="hverificacion"> {{ucfirst($tipoAyuda->nombre)}} </p>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                            </fieldset>
                                                                            <fieldset name="social" class="col-sm-12">
                                                                                <br>
                                                                                <label class='control-label'
                                                                                       for='inputText'>Ayuda
                                                                                    Social</label>
                                                                                <div class="funkyradio">
                                                                                    @foreach($tipoAyudaTecnicoSocial as $tipoAyuda)
                                                                                        @if ($tipoAyuda->tipo=='Social')
                                                                                            <div class="box-content"
                                                                                                 style="margin-top:10px;">
                                                                                                <input value="{{ucfirst($tipoAyuda->nombre)}}"
                                                                                                       name="tipoAyudaSocialVer[]"
                                                                                                       id="{{$tipoAyuda->id}}.t"
                                                                                                       type="hidden">
                                                                                                <input class='make-switch'
                                                                                                       value="{{$tipoAyuda->id}}"
                                                                                                       name="tipoAyudaSocial[]"
                                                                                                       id="{{$tipoAyuda->id}}.t"
                                                                                                       data-off-text='<i class="fa fa-circle-o"></i>'
                                                                                                       data-on-text='<i class="fa fa-check"></i>'
                                                                                                       type='checkbox'>
                                                                                                <p id="hverificacion"> {{ucfirst($tipoAyuda->nombre)}} </p>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class='box-content'>
                                                                                    <div>
                                                                                        <textarea
                                                                                                name="observacionAyuda"
                                                                                                id="observacionAyuda"
                                                                                                style="width:100%;"
                                                                                                rows="4"
                                                                                                placeholder="Observacion.."></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>

                                                                        <div class="col-sm-12 col-offset-2">
                                                                            <button type="submit"
                                                                                    onClick="javascript: return confirm('¿Esta seguro? Los datos se ingresan de forma permanente');"
                                                                                    name="{{$tMotivos->nombre}}.btn"
                                                                                    class="pull-right btn btn-success">
                                                                                Aceptar
                                                                            </button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                                <?php $i = 2; ?>
                                                            @else
                                                                <div class="tab-pane" id="{{$tMotivos->id}}">
                                                                    <fieldset>
                                                                        <!--<form accept-charset="UTF-8" id="formulario_registro" class="form" style="margin-bottom: 0;" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">-->
                                                                        <form accept-charset="UTF-8"
                                                                              action="{{route('social.asistentesocial')}}"
                                                                              id="formularioAsistenciaSocial{{$tMotivos->id}}"
                                                                              class="form" style="margin-bottom: 0;"
                                                                              method="post"
                                                                              enctype="multipart/form-data"
                                                                              data-toggle="validator" role="form">
                                                                            {!!csrf_field()!!}
                                                                            <input type="hidden" class="form-control"
                                                                                   id="ben_id" name="ben_id"
                                                                                   value="{{$beneficiario->id}}">
                                                                            @foreach($tipoSubmotivoSocial as $sMotivo)
                                                                                @if($sMotivo->tipo_motivo_social_id == $tMotivos->id)
                                                                                    @if($tMotivos->id == '3')
                                                                                        <div class="box-content "
                                                                                             style="margin-top:10px;">
                                                                                            <input value="{{ucfirst($sMotivo->nombre)}}"
                                                                                                   name="vdVer[]"
                                                                                                   id="vdVer"
                                                                                                   type="hidden">
                                                                                            <input class='make-switch'
                                                                                                   value="{{$sMotivo->id}}"
                                                                                                   name="vd[]"
                                                                                                   id="{{$sMotivo->id}}.vd"
                                                                                                   data-off-text='<i class="fa fa-circle-o"></i>'
                                                                                                   data-on-text='<i class="fa fa-check"></i>'
                                                                                                   type='checkbox'>
                                                                                            <p id="hverificacion"> {{ucfirst($sMotivo->nombre)}} </p>
                                                                                        </div>
                                                                                        <div class="help-block with-errors"></div>
                                                                                        <div class='controls'
                                                                                             id="{{$sMotivo->nombre}}"
                                                                                             style="display:none">
                                                                                            @if($sMotivo->id == '8')
                                                                                                <input type="file"
                                                                                                       name="avatar"></input>
                                                                                            @endif -->
                                                                                            <div>
                                                                                                <input type="file"
                                                                                                       name="avatar"></input>
                                                                                            </div>
                                                                                        </div>
                                                                                        @if($sMotivo->id == '10')
                                                                                            <div>
                                                                                                <input data-file-input
                                                                                                       data-show-upload="false"
                                                                                                       data-show-preview='false'
                                                                                                       title='Busque el archivo que desea agregar'
                                                                                                       type='file'
                                                                                                       name="document">
                                                                                            </div>
                                                                                        @endif
                                                                                    @elseif($tMotivos->id == '2')
                                                                                        <div class="box-content"
                                                                                             style="margin-top:10px;">
                                                                                            <input value="{{ucfirst($sMotivo->nombre)}}"
                                                                                                   name="inputSubMotivoVer[]"
                                                                                                   id="inputSubMotivoVer"
                                                                                                   type="hidden">
                                                                                            <input class='make-switch'
                                                                                                   value="{{$sMotivo->id}}"
                                                                                                   id="inputSubMotivo"
                                                                                                   data-off-text='<i class="fa fa-circle-o"></i>'
                                                                                                   data-on-text='<i class="fa fa-check"></i>'
                                                                                                   type='checkbox'
                                                                                                   onchange="javascript:showContent('{{$sMotivo->nombre}}','{{$sMotivo->id}}')"
                                                                                                   name="inputSubMotivo[]">
                                                                                            <p id="hverificacion">{{ucfirst($sMotivo->nombre)}}</p>
                                                                                        </div>
                                                                                        @if($sMotivo->id == '6')

                                                                                        @endif
                                                                                    @elseif($tMotivos->id == '4')

                                                                                        <div class='controls'>
                                                                                            <div class='box-content'
                                                                                                 id="{{$sMotivo->nombre}}">
                                                                                                <input value="{{ucfirst($sMotivo->nombre)}}"
                                                                                                       name="inputSubMotivoVer[]"
                                                                                                       id="inputSubMotivoVer"
                                                                                                       type="hidden">
                                                                                                <label class="radio-inline">
                                                                                                    <input type="radio"
                                                                                                           name="inputSubMotivo[]"
                                                                                                           onClick="javascript:toggle(this)"
                                                                                                           id="inputSubMotivo"
                                                                                                           value="{{$sMotivo->id}}">{{ucfirst($sMotivo->nombre)}}
                                                                                                </label>
                                                                                                @if($sMotivo->id == '12')
                                                                                                    <div class='controls'
                                                                                                         id="uno"
                                                                                                         style="display:none">
                                                                                                        <div>
                                                                                                            <label for="inputText"
                                                                                                                   style="display:block;">Año
                                                                                                                postulación
                                                                                                                (1990-2017)</label>
                                                                                                            <input type="number"
                                                                                                                   value-date=""
                                                                                                                   name="postAT[]"
                                                                                                                   id="añoPostulacion.text"
                                                                                                                   min="1990"
                                                                                                                   max="{{ date('Y') }}"
                                                                                                                   required></input>
                                                                                                        </div>
                                                                                                        <div>
                                                                                                            <label for="inputText"
                                                                                                                   style="display:block;">Tipo
                                                                                                                ayuda</label>
                                                                                                            <input name="postAT[]"
                                                                                                                   id="tipoAyudaSenadis.text"></input>
                                                                                                            <div class="help-block with-errors"></div>
                                                                                                        </div>
                                                                                                        <div>
                                                                                                            <label for="inputText"
                                                                                                                   style="display:block;">Resultado</label>
                                                                                                            <select id="resultado"
                                                                                                                    name="resultado"
                                                                                                                    onChange="javascript: mostrar(this.value);">
                                                                                                                <option value="1">
                                                                                                                    Aprobado
                                                                                                                </option>
                                                                                                                <option value="0">
                                                                                                                    Reprobado
                                                                                                                </option>
                                                                                                            </select>
                                                                                                            <div class='controls'
                                                                                                                 id="reprobado"
                                                                                                                 style="display:none">
                                                                                                                <div>
                                                                                                                    <label for="inputText"
                                                                                                                           style="display:block;">Admisibilidad
                                                                                                                        regional</label>
                                                                                                                    <input name="reprobado[]"
                                                                                                                           id="admisibilidad"></input>
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                    <label for="inputText"
                                                                                                                           style="display:block;">Vida
                                                                                                                        util</label>
                                                                                                                    <input name="reprobado[]"
                                                                                                                           id="vidaUtil"></input>
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                    <label for="inputText"
                                                                                                                           style="display:block;">Falta
                                                                                                                        de
                                                                                                                        requisitos</label>
                                                                                                                    <input name="reprobado[]"
                                                                                                                           id="faltaReq"></input>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                @endif

                                                                            @endforeach
                                                                            <div class='box-content '
                                                                                 id="{{$sMotivo->nombre}}">
                                                                                <div>
                                                                                    <textarea
                                                                                            name="observacion{{$tMotivos->id}}"
                                                                                            id="observacion{{$tMotivos->id}}"
                                                                                            style="width:100%;" rows="4"
                                                                                            placeholder="Observacion.."></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-offset-2">
                                                                                <button type="submit"
                                                                                        onClick="javascript: return confirm('¿Esta seguro? Los datos se ingresan de forma permanente');"
                                                                                        name="{{$tMotivos->nombre}}.btn"
                                                                                        class="pull-right btn btn-success">
                                                                                    Aceptar
                                                                                </button>
                                                                            </div>
                                                                        </form>

                                                                    </fieldset>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
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
                <div class='modal fade' id='confirmationformularioAsistenciaSocial' tabindex='-1'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
                                <h3 class='modal-title' id='myModalLabel'>Confirmación</h3>
                            </div>
                            <div class='modal-body'>
                                <h5>A continuación se muestra el motivo y las observaciones ingresadas en el formulario
                                    de atención social. Favor leer detalladamente y confirmar con el botón registrar. De
                                    lo contrario, vuelva y modifique los datos que sean necesarios.</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <h4>Motivo de la atención</h4>
                                        <p id="mot_atent_confirmation">-</p>
                                        <h4>Ud ha escogido las siguientes ayudas:</h4>
                                        <p id="submot_atent_confirmation">-</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <h4>Observación</h4>
                                        <p id="obs_confirmation">-</p>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button class='btn btn-default' data-dismiss='modal' type='button'>Volver</button>
                                    <button class='btn btn-success' type='button' onclick="enviarFormulario()">
                                        Ingresar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-custom">
                <div class='modal fade' id='confirmationformularioAsistenciaSocial2' tabindex='-1'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
                                <h3 class='modal-title' id='myModalLabel'>Confirmación</h3>
                            </div>
                            <div class='modal-body'>
                                <h5>A continuación se muestra el motivo y las observaciones ingresadas en el formulario
                                    de atención social. Favor leer detalladamente y confirmar con el botón registrar. De
                                    lo contrario, vuelva y modifique los datos que sean necesarios.</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <h4>Motivo de la atención</h4>
                                        <p id="mot_atent_confirmation2">-</p>
                                        <h4>Ud ha escogido las siguientes ayudas:</h4>
                                        <p id="submot_atent_confirmation2">-</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <h4>Observación</h4>
                                        <p id="obs_confirmation2">-</p>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button class='btn btn-default' data-dismiss='modal' type='button'>Volver</button>
                                    <button class='btn btn-success' type='button' onclick="enviarFormulario2()">
                                        Ingresar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-custom">
                <div class='modal fade' id='confirmationformularioAsistenciaSocial3' tabindex='-1'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
                                <h3 class='modal-title' id='myModalLabel'>Confirmación</h3>
                            </div>
                            <div class='modal-body'>
                                <h5>A continuación se muestra el motivo y las observaciones ingresadas en el formulario
                                    de atención social. Favor leer detalladamente y confirmar con el botón registrar. De
                                    lo contrario, vuelva y modifique los datos que sean necesarios.</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <h4>Motivo de la atención</h4>
                                        <p id="mot_atent_confirmation3">-</p>
                                        <h4>Ud ha escogido las siguientes ayudas:</h4>
                                        <p id="submot_atent_confirmation3">-</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <h4>Observación</h4>
                                        <p id="obs_confirmation3">-</p>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button class='btn btn-default' data-dismiss='modal' type='button'>Volver</button>
                                    <button class='btn btn-success' type='button' onclick="enviarFormulario3()">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-custom">
                <div class='modal fade' id='confirmationformularioAsistenciaSocial4' tabindex='-1'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
                                <h3 class='modal-title' id='myModalLabel'>Confirmación</h3>
                            </div>
                            <div class='modal-body'>
                                <h5>A continuación se muestra el motivo y las observaciones ingresadas en el formulario
                                    de atención social. Favor leer detalladamente y confirmar con el botón registrar. De
                                    lo contrario, vuelva y modifique los datos que sean necesarios.</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <h4>Motivo de la atención</h4>
                                        <p id="mot_atent_confirmation4">-</p>
                                        <h4>Ud ha escogido las siguientes ayudas:</h4>
                                        <p id="submot_atent_confirmation4">-</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <h4>Observación</h4>
                                        <p id="obs_confirmation4">-</p>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button class='btn btn-default' data-dismiss='modal' type='button'>Volver</button>
                                    <button class='btn btn-success' type='button' onclick="enviarFormulario4()">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
