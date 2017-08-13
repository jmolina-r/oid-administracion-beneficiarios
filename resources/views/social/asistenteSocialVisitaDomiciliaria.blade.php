
<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Área Social - OID
@endsection

@section("styles_before")
    <link href="{{ asset("/assets/stylesheets/plugins/fuelux/wizard.css") }}" rel="stylesheet" type="text/css" media="all" />
@endsection
<!-- inyeccion de estilos -->

@section('styles')
  <link href="{{ asset('/assets/stylesheets/plugins/bootstrap_switch/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{ asset('/css/social/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{ asset('assets/stylesheets/plugins/fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
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
    <script src="{{ asset('/assets/javascripts/plugins/validate/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/validate/additional-methods.js') }}" type="text/javascript"></script>
    <script src="{{ asset("/assets/javascripts/plugins/fuelux/wizard.js") }}" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->
     <script src="{{ asset('/js/social/showcontent.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/plugins/bootstrap_switch/bootstrapSwitch.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/plugins/fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/plugins/fileinput/bootstrap-fileinput-fa.js') }}" type="text/javascript"></script>
    <!-- / START - Validaciones-->
   <script src="{{ asset('/assets/javascripts/plugins/validate/jquery.validate.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('/assets/javascripts/plugins/validate/additional-methods.js') }}" type="text/javascript"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.10.2/validator.min.js"></script>
   <script src="{{ asset('/assets/javascripts/plugins/1000hz-bootstrap-validator/validator.min.js') }}"></script>
    <script src="{{ asset('/js/social/IngresoAtencionSocial.js') }}" type="text/javascript"></script>

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
                                                    <button type="submit" href=""  class="pull-right btn ">Terminar Visita</button>
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
                                                        @foreach($tipoMotivoSocial as $tMotivos)
                                                        @if($i == 1)
                                                        <li class="active">
                                                            <a href=<?php echo "#".$tMotivos->id ?> data-toggle="tab">{{ucfirst($tMotivos->nombre)}}</a>
                                                        </li>
                                                        <?php $i = 2; ?>
                                                        @else
                                                        <li>
                                                            <a href=<?php echo "#".$tMotivos->id ?> data-toggle="tab">{{ucfirst($tMotivos->nombre)}}</a>
                                                        </li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                        <div class='fuelux'>
                                                            <div class='wizard' data-initialize='wizard' id='myWizard'>
                                                                <div class="tab-content">
                                                                <?php $i = 1; ?>
                                                                @foreach($tipoMotivoSocial as $tMotivos)
                                                                @if($i == 1)
                                                                    <div class="tab-pane active" id=  "{{$tMotivos->id}}"  >
                                                                        <form accept-charset="UTF-8" id="formulario_registro" class="form" style="margin-bottom: 0;" method="post" enctype="multipart/form-data">
                                                                            {!!csrf_field()!!}
                                                                            <div class="col-sm-8">
                                                                                <fieldset name="tecnico" class="col-sm-12">
                                                                                <label class='control-label' for='inputText'>Ayuda Técnica</label>
                                                                                <div class="funkyradio">
                                                                                @foreach($tipoAyudaTecnicoSocial as $tipoAyuda)
                                                                                @if ($tipoAyuda->tipo=='tecnico')
                                                                                <!--<div class='funkyradio-primary col-sm-12'>
                                                                                <input type="radio" name="tipoAyudaTecnica[]" id="{{$tipoAyuda->id}}.t" value="{{$tipoAyuda->id}}">
                                                                                <label for="{{$tipoAyuda->id}}.t">{{$tipoAyuda->nombre}}</label>
                                                                                </div>
                                                                                -->
                                                                                <div class="box-content" style="margin-top:10px;">
                                                                                <input class='make-switch checkStyle' value="{{$tipoAyuda->id}}" name="tipoAyudaSocial[]" id="{{$tipoAyuda->id}}.t"
                                                                                data-off-text='<i class="fa fa-circle-o"></i>' data-on-text='<i class="fa fa-check"></i>'
                                                                                type='checkbox' onchange="javascript:showContent('{{$tipoAyuda->nombre}}','{{$tipoAyuda->id}}.t')" >
                                                                                <p id="hverificacion"> {{ucfirst($tipoAyuda->nombre)}} </p>

                                                                                </div>
                                                                                @endif
                                                                                @endforeach
                                                                                </div>
                                                                              </fieldset>
                                                                              <fieldset name="social" class="col-sm-12">
                                                                                <br>
                                                                                  <label class='control-label' for='inputText'>Ayuda Social</label>
                                                                                  <div class="funkyradio">
                                                                                  @foreach($tipoAyudaTecnicoSocial as $tipoAyuda)
                                                                                          @if ($tipoAyuda->tipo=='social')
                                                                                          <!--<div class='funkyradio-warning col-sm-12'>
                                                                                              <input type="radio" name="tipoAyudaSocial[]" id="{{$tipoAyuda->id}}.t" value="{{$tipoAyuda->id}}">
                                                                                              <label for="{{$tipoAyuda->id}}.t">{{$tipoAyuda->nombre}}</label>
                                                                                          </div>
                                                                                          -->
                                                                                              <div class="box-content" style="margin-top:10px;">
                                                                                                  <input class='make-switch' value="{{$tipoAyuda->id}}" name="tipoAyudaSocial[]" id="{{$tipoAyuda->id}}.t"
                                                                                                         data-off-text='<i class="fa fa-circle-o"></i>' data-on-text='<i class="fa fa-check"></i>'
                                                                                                         type='checkbox' onchange="javascript:showContent('{{$tipoAyuda->nombre}}','{{$tipoAyuda->id}}.t')" >
                                                                                                  <p id="hverificacion"> {{ucfirst($tipoAyuda->nombre)}} </p>
                                                                                              </div>
                                                                                          @endif
                                                                                  @endforeach
                                                                                  </div>
                        <!--
                                                                          <div class='controls col-sm-12' id="contentVD">
                                                                                  <div style="display: inline;">
                                                                                     <br>
                                                                                          <label for="inputText" style="display:block;">Observación</label>
                                                                                          <textarea name="observacionAyuda" id="observacionAyuda" cols="80" rows="4"></textarea>
                                                                                  </div>
                                                                            </div>-->
                                                                                  <div class='box-content' id="observacionAyuda">
                                                                                      <div>
                                                                                          <textarea name="observacionAyuda" id="observacionAyuda" style="width:100%;" rows="4" placeholder="Observacion.."></textarea>
                                                                                      </div>
                                                                                  </div>
                                                                          </div>

                                                            </fieldset>


                                                            <div class="col-sm-12 col-offset-2">
                                                               <button type="submit" name="{{$tMotivos->nombre}}.btn" class="pull-right btn btn-success">Aceptar</button>
                                                            </div>
                                                           </form>
                                                          </div>
                                                          <?php $i = 2; ?>
                                                       @else
                                                          <div class="tab-pane" id= "{{$tMotivos->id}}">
                                                          <fieldset>
                                                            <form accept-charset="UTF-8" id="formulario_registro" class="form" style="margin-bottom: 0;" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
                                                             {!!csrf_field()!!}

                                                            @foreach($tipoSubmotivoSocial as $sMotivo)

                                                                @if($sMotivo->tipo_motivo_social_id == $tMotivos->id)

                                                                       @if($tMotivos->id == '3')

                                                                          <div class="box-content " style="margin-top:10px;">
                                                                            <input class='make-switch' value="{{$sMotivo->id}}" name="vd[]" id="{{$sMotivo->id}}.vd" data-off-text='<i class="fa fa-circle-o"></i>' data-on-text='<i class="fa fa-check"></i>' type='checkbox'><p id="hverificacion"> {{ucfirst($sMotivo->nombre)}} </p>
                                                                          </div>
                                                                          <div class="help-block with-errors"></div>
                                                                          <div class='controls' id="{{$sMotivo->nombre}}" style="display:none">
                                                                          <!--
                                                                          <div>
                                                                                <label for="inputText"style="display:block;">Observación</label>
                                                                                <textarea name="vdText[]" id="{{$sMotivo->id}}.text" cols="40" rows="4"></textarea>

                                                                              </div>
                                                                              @if($sMotivo->id == '8')

                                                                                  <input type="file" name="avatar"></input>

                                                                              @endif -->
                                                                              <div>
                                                                                  <input type="file" name="avatar"></input>

                                                                              </div>
                                                                          </div>
                                                                           @if($sMotivo->id == '10')
                                                                            <div>
                                                                               <input data-file-input data-show-upload="false" data-show-preview='false' title='Search for a file to add' type='file'name="document">
                                                                            </div>
                                                                            <!--
                                                                            <div class='box-content box-statistic' id="{{$sMotivo->nombre}}">
                                                                              <div>
                                                                                <textarea name="vdText[]" id="{{$sMotivo->id}}.text" style="width:100%;" rows="4" placeholder="Observacion.."></textarea>
                                                                              </div>
                                                                            </div>
                                                                            -->
                                                                              @endif
                                                                       @elseif($tMotivos->id == '2')
                                                                           <div class="box-content" style="margin-top:10px;">
                                                                                <input class='make-switch' value="{{$sMotivo->id}}" id="inputSubMotivo" data-off-text='<i class="fa fa-circle-o"></i>' data-on-text='<i class="fa fa-check"></i>' type='checkbox' onchange="javascript:showContent('{{$sMotivo->nombre}}','{{$sMotivo->id}}')"  name="inputSubMotivo[]"><p id="hverificacion">{{ucfirst($sMotivo->nombre)}}</p>
                                                                          </div>
                                                                           @if($sMotivo->id == '6')

                                                                          @endif
                                                                        @elseif($tMotivos->id == '4')

                                                                         <div class='controls'>
                                                                             <div class='box-content' id="{{$sMotivo->nombre}}">
                                                                                <label class="radio-inline"> <input type="radio" name="inputSubMotivo[]" onClick="javascript:toggle(this)" id="{{$sMotivo->id}}" value="{{$sMotivo->id}}">{{ucfirst($sMotivo->nombre)}}</label>

                                                                            @if($sMotivo->id == '12')
                                                                                <div class='controls' id="uno" style="display:none">
                                                                                    <div>
                                                                                        <label for="inputText"style="display:block;">Año postulación (1990-2017)</label>
                                                                                        <input type="number" name="postAT[]" id="añoPostulacion.text" min="1990" max="2017"></input>
                                                                                    </div>
                                                                                    <div>
                                                                                        <label for="inputText"style="display:block;">Tipo ayuda</label>
                                                                                        <input name="postAT[]" id="tipoAyudaSenadis.text"></input>
                                                                                        <div class="help-block with-errors"></div>
                                                                                    </div>
                                                                                    <div>

                                                                                        <label for="inputText"style="display:block;">Resultado</label>
                                                                                        <select	id="resultado" name="resultado" onChange="javascript: mostrar(this.value);">
                                                                                            <option value="1">Aprobado</option>
                                                                                            <option value="0">Reprobado</option>
                                                                                        </select>
                                                                                        <div class='controls' id="reprobado" style="display:none">
                                                                                            <div>
                                                                                                <label for="inputText"style="display:block;">Admisibilidad regional</label>
                                                                                                <input name="reprobado[]" id="admisibilidad"></input>
                                                                                            </div>
                                                                                            <div>
                                                                                                <label for="inputText"style="display:block;">Vida util</label>
                                                                                                <input name="reprobado[]" id="vidaUtil"></input>
                                                                                            </div>
                                                                                            <div>
                                                                                                <label for="inputText"style="display:block;">Falta de requisitos</label>
                                                                                                <input name="reprobado[]" id="faltaReq"></input>
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
                <!--
                                                                <div class='controls col-sm-12' id="contentVD">
                                                                    <div style="display: inline;">
                                                                        <br>
                                                                        <label for="inputText" style="display:block;">Observación</label>
                                                                        <textarea name="observacion" id="observacion.text" cols="80" rows="4"></textarea>
                                                                    </div>
                                                                </div>
                                                                -->
                                                                <div class='box-content ' id="{{$sMotivo->nombre}}">
                                                                    <div>
                                                                        <textarea name="observacion{{$tMotivos->id}}" id="observacion.text" style="width:100%;" rows="4" placeholder="Observacion.."></textarea>
                                                                    </div>
                                                                </div>
                                                            <div class="col-sm-12 col-offset-2">
                                                               <button type="submit" name="{{$tMotivos->nombre}}.btn" class="pull-right btn btn-success" onclick="javascript:checkButton(this)">Aceptar</button>
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

