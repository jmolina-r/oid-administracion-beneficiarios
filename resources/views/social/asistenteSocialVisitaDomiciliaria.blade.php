
<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Área Social - OID
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
    <!-- / END - page related files and scripts [optional] -->
    <script src="{{ asset('assets/javascripts/plugins/bootstrap_switch/bootstrapSwitch.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/social/showcontent.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/plugins/fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/plugins/fileinput/bootstrap-fileinput-fa.js') }}" type="text/javascript"></script>

   
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
                              <i class='fa fa-bar-chart-o'></i>
                            </a>
                          </li>
                          <li class='separator'>
                            <i class='fa fa-angle-right'></i>
                          </li>
                          <li>
                            Forms
                          </li>
                          <li class='separator'>
                            <i class='fa fa-angle-right'></i>
                          </li>
                          <li class='active'>Wizard</li>
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
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                            <h4>Menú Area Social</h4>
                                                  
                          </div>
                           
                            <div class='col-md-12 form-group'>
                                <?php $i = 1; ?>                                                              
                                 <div class="tabbable tabs-left">                                 
                                      <ul class="nav nav-tabs">
                                      @foreach($tipoMotivoSocial as $tMotivos)
                                        @if($i == 1)
                                           <li class="active"><a href=<?php echo "#".$tMotivos->id ?> data-toggle="tab">{{$tMotivos->nombre}}</a></li>
                                           <?php $i = 2; ?>
                                        @else
                                            <li><a href=<?php echo "#".$tMotivos->id ?> data-toggle="tab">{{$tMotivos->nombre}}</a></li>
                                        @endif
                                      @endforeach 
                                      </ul>
                                      <div class="tab-content">
                                         <?php $i = 1; ?>
                                         @foreach($tipoMotivoSocial as $tMotivos)
                                          
                                          @if($i == 1)
                                              <div class="tab-pane active" id=  "{{$tMotivos->id}}"  >
                                                <form accept-charset="UTF-8" class="form" style="margin-bottom: 0;" method="post" enctype="multipart/form-data">
                                                    {!!csrf_field()!!}
                                                    <fieldset id="tecnico">
                                                        <label class='control-label' for='inputText'>Ayuda Técnica</label>
                                                            @foreach($tipoAyudaTecnicoSocial as $tipoAyuda)
                                                               @if ($tipoAyuda->tipo=='tecnico')
                                                                 <div class='controls'>
                                                                      <label class="radio-inline"> <input type="radio" name="tipoAyudaTecnica" id="">{{$tipoAyuda->nombre}}</label>
                                                                 </div>
                                                               @endif
                                                           @endforeach
                                                    </fieldset>
                                                    <fieldset id="social">
                                                        <label class='control-label' for='inputText'>Ayuda Social</label>
                                                        @foreach($tipoAyudaTecnicoSocial as $tipoAyuda)
                                                                @if ($tipoAyuda->tipo=='social')
                                                                        <div class='controls'>
                                                                                <label class="radio-inline"> <input type="radio" name="tipoAyudaSocial" id=""> {{$tipoAyuda->nombre}}</label>
                                                                        </div>
                                                                @endif
                                                        @endforeach
                                                <div class='controls' id="contentVD">
                                                        <div style="display: inline;">
                                                                <label for="inputText">Observación</label>
                                                                <textarea name="observacion" id="observacion" name="observacion" cols="40" rows="4"></textarea>
                                                        </div>
                                                </div>
                                                </fieldset>
                                                <div class="col-sm-12 col-offset-2">
                                                   <button type="submit" class="pull-right btn btn-success">Aceptar</button>
                                                </div>
                                               </form>                                              
                                              </div>
                                              <?php $i = 2; ?>
                                           @else
                                              <div class="tab-pane" id= "{{$tMotivos->id}}">
                                              <fieldset>
                                                <form accept-charset="UTF-8" class="form" style="margin-bottom: 0;" method="post" enctype="multipart/form-data">
                                                 {!!csrf_field()!!}
                                                @foreach($tipoSubmotivoSocial as $sMotivo)
                                                
                                                    @if($sMotivo->tipo_motivo_social_id == $tMotivos->id)
                                                           @if($tMotivos->id == '3')
                                                              <div class="control" style="margin-top:10px;">
                                                                <input class='make-switch' id="{{$sMotivo->id}}.sw" data-off-text='<i class="fa fa-circle-o"></i>' data-on-text='<i class="fa fa-check"></i>' type='checkbox' onchange="javascript:showContent('{{$sMotivo->nombre}}','{{$sMotivo->id}}.sw')" ><p id="hverificacion"> {{$sMotivo->nombre}} </p>
                                                              </div>
                                                              <div class='controls' id="{{$sMotivo->nombre}}" style="display:none">
                                                                  <div>
                                                                    <label for="inputText"style="display:block;">Observación</label>
                                                                    <textarea name="" id="" cols="40" rows="4"></textarea>
                                                                  </div> 
                                                                  @if($sMotivo->id == '8')
                                                                  
                                                                      <input type="file" name="avatar"></input>
                                                              
                                                                  @endif                                                                 
                                                              </div>
                                                                                                                                                                                                                 
                                                           @elseif($tMotivos->id == '2')
                                                               <div class='controls'style="margin-top:10px;">
                                                                    <input class='make-switch' id="{{$sMotivo->nombre}}" data-off-text='<i class="fa fa-circle-o"></i>' data-on-text='<i class="fa fa-check"></i>' type='checkbox' onchange="javascript:showContent('{{$sMotivo->nombre}}','{{$sMotivo->id}}')"  name="inputSubMotivo[]"><p id="hverificacion">{{$sMotivo->nombre}}</p>
                                                              </div>
                                                           @endif
                                                    @endif                                                      
                                                @endforeach
                                                <div class="col-sm-12 col-offset-2">
                                                   <button type="submit" name="{{$sMotivo->nombre}}.btn" class="pull-right btn btn-success">Aceptar</button>
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
          </div>
        </section>

      </div>

@endsection
