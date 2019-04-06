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
                        @if( $estado == 'cerrado')
                            <div class="row">
                                <div class='col-sm-12'>
                                    @if($tipoFuncionario == 'Kinesiologo')
                                        <td><a class="btn btn-primary btn-block" href="{{route('area-medica.ficha-evaluacion-inicial.kinesiologia.create', $idBeneficiario)}}">Agregar Nueva Ficha de Evaluación Inicial de Kinesiología</a></td>
                                    @endif
                                    @if($tipoFuncionario == 'Fonoaudiologo')
                                        <td><a class="btn btn-primary btn-block" href="{{route('area-medica.ficha-evaluacion-inicial.fonoaudiologia.create', $idBeneficiario)}}">Agregar Nueva Ficha de Evaluación Inicial de Fonoaudiología</a></td>
                                    @endif
                                    @if($tipoFuncionario == 'Psicologo')
                                        <td><a class="btn btn-primary btn-block" href="{{route('area-medica.ficha-evaluacion-inicial.psicologia.create', $idBeneficiario)}}">Agregar Nueva Ficha de Evaluación Inicial de Psicología</a></td>
                                    @endif
                                    @if($tipoFuncionario == 'Terapeuta ocupacional')
                                        <td><a class="btn btn-primary btn-block" href="{{route('area-medica.ficha-evaluacion-inicial.terapia-ocupacional.ingresar', $idBeneficiario)}}">Agregar Nueva Ficha de Evaluación Inicial de Terapia Ocupacional</a></td>
                                    @endif
                                        @if($tipoFuncionario == 'Tallerista')
                                            <td><a class="btn btn-primary btn-block" href="{{route('area-medica.ficha-evaluacion-inicial.tallerista.create', $idBeneficiario)}}">Agregar Nueva Ficha área de deporte recreación y cultural</a></td>
                                        @endif
                                        @if($tipoFuncionario == 'Educador')
                                            <td><a class="btn btn-primary btn-block" href="{{route('area-medica.ficha-evaluacion-inicial.educacion.create', $idBeneficiario)}}">Agregar Nueva Ficha área de Educación</a></td>
                                        @endif
                                </div>
                            </div>
                            <hr>
                        @endif
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='box'>
                                    <table class='data-table table table-striped' style='margin-bottom:0;'>
                                        <thead>
                                        <tr>
                                            <th>
                                                <h3>Fecha</h3>
                                            </th>
                                            <th>
                                                <h3>Área</h3>
                                            </th>
                                            <th>
                                                <h3>Estado</h3>
                                            </th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($fichasKinesiologia != null)
                                            @foreach($fichasKinesiologia as $ficha)
                                                <tr>
                                                    <td>{{$ficha->created_at->format('d-m-Y')}}</td>
                                                    <td>Kinesiología</td>
                                                    <td class="capitalize">{{$ficha->estado}}</td>
                                                    <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.kinesiologia.show', $ficha->id)}}">Detalles</a></td>
                                                    <!--<td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.kinesiologia.show', $ficha->id)}}">Ver como PDF</a></td>-->
                                                    @if($ficha->estado == 'abierto')
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.informe-cierre.create', ['p1' => $ficha->funcionario_id, 'p2' => $idBeneficiario, 'p3' => $ficha->id])}}">Agregar Ficha de Cierre</a></td>
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.kinesiologia.edit', $ficha->id)}}">Editar Ficha</a></td>

                                                    @else
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.informe-cierre.show', ['p1' => $ficha->funcionario_id, 'p2' => $idBeneficiario, 'p3' => $ficha->id])}}">Detalles Ficha de Cierre</a></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if($fichasPsicologia != null)
                                            @foreach($fichasPsicologia as $ficha)
                                                <tr>
                                                    <td>{{$ficha->created_at->format('d-m-Y')}}</td>
                                                    <td>Psicología</td>
                                                    <td class="capitalize">{{$ficha->estado}}</td>
                                                    <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.psicologia.show', $ficha->id)}}">Detalles</a></td>
                                                    <!--<td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.psicologia.show', $ficha->id)}}">Ver como PDF</a></td>-->
                                                    @if($ficha->estado == 'abierto')
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.informe-cierre.create', ['p1' => $ficha->funcionario_id, 'p2' => $idBeneficiario, 'p3' => $ficha->id])}}">Agregar Ficha de Cierre</a></td>
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.psicologia.edit', $ficha->id)}}">Editar Ficha</a></td>

                                                    @else
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.informe-cierre.show', ['p1' => $ficha->funcionario_id, 'p2' => $idBeneficiario, 'p3' => $ficha->id])}}">Detalles Ficha de Cierre</a></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if($fichasFonoaudiologia != null)
                                            @foreach($fichasFonoaudiologia as $ficha)
                                                <tr>
                                                    <td>{{$ficha->created_at->format('d-m-Y')}}</td>
                                                    <td>Fonoaudiología</td>
                                                    <td class="capitalize">{{$ficha->estado}}</td>
                                                    <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.fonoaudiologia.show', $ficha->id)}}">Detalles</a></td>
                                                    <!--<td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.fonoaudiologia.show', $ficha->id)}}">Ver como PDF</a></td>-->
                                                    @if($ficha->estado == 'abierto')
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.informe-cierre.create', ['p1' => $ficha->funcionario_id, 'p2' => $idBeneficiario, 'p3' => $ficha->id])}}">Agregar Ficha de Cierre</a></td>
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.fonoaudiologia.edit', $ficha->id)}}">Editar Ficha</a></td>

                                                    @else
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.informe-cierre.show', ['p1' => $ficha->funcionario_id, 'p2' => $idBeneficiario, 'p3' => $ficha->id])}}">Detalles Ficha de Cierre</a></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if($fichasTerapiaOcuacional != null)
                                            @foreach($fichasTerapiaOcuacional as $ficha)
                                                <tr>
                                                    <td>{{$ficha->created_at->format('d-m-Y')}}</td>
                                                    <td>Terapia Ocupacional</td>
                                                    <td class="capitalize">{{$ficha->estado}}</td>
                                                    <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.terapia-ocupacional.show', $ficha->id)}}">Detalles</a></td>
                                                    <!--<td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.terapia-ocupacional.show', $ficha->id)}}">Ver como PDF</a></td>-->
                                                    @if($ficha->estado == 'abierto')
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.informe-cierre.create', ['p1' => $ficha->funcionario_id, 'p2' => $idBeneficiario, 'p3' => $ficha->id])}}">Agregar Ficha de Cierre</a></td>
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.terapia-ocupacional.edit', $ficha->id)}}">Editar Ficha</a></td>

                                                    @else
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.informe-cierre.show', ['p1' => $ficha->funcionario_id, 'p2' => $idBeneficiario, 'p3' => $ficha->id])}}">Detalles Ficha de Cierre</a></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if($fichasTaller != null)
                                            @foreach($fichasTaller as $ficha)
                                                <tr>
                                                    <td>{{$ficha->created_at->format('d-m-Y')}}</td>
                                                    <td>Taller</td>
                                                    <td class="capitalize">{{$ficha->estado}}</td>
                                                    <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.tallerista.show', $ficha->id)}}">Detalles</a></td>
                                                <!--<td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.tallerista.show', $ficha->id)}}">Ver como PDF</a></td>-->
                                                    @if($ficha->estado == 'abierto')
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.informe-cierre.create', ['p1' => $ficha->funcionario_id, 'p2' => $idBeneficiario, 'p3' => $ficha->id])}}">Agregar Ficha de Cierre</a></td>
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.tallerista.edit', $ficha->id)}}">Editar Ficha</a></td>

                                                    @else
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.informe-cierre.show', ['p1' => $ficha->funcionario_id, 'p2' => $idBeneficiario, 'p3' => $ficha->id])}}">Detalles Ficha de Cierre</a></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if($fichasEducacion != null)
                                            @foreach($fichasEducacion as $ficha)
                                                <tr>
                                                    <td>{{$ficha->created_at->format('d-m-Y')}}</td>
                                                    <td>Educación</td>
                                                    <td class="capitalize">{{$ficha->estado}}</td>
                                                    <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.educacion.show', $ficha->id)}}">Detalles</a></td>
                                                <!--<td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.educacion.show', $ficha->id)}}">Ver como PDF</a></td>-->
                                                    @if($ficha->estado == 'abierto')
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.informe-cierre.create', ['p1' => $ficha->funcionario_id, 'p2' => $idBeneficiario, 'p3' => $ficha->id])}}">Agregar Ficha de Cierre</a></td>
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.ficha-evaluacion-inicial.educacion.edit', $ficha->id)}}">Editar Ficha</a></td>

                                                    @else
                                                        <td><a class="btn btn-primary btn-block btn-xs" href="{{route('area-medica.informe-cierre.show', ['p1' => $ficha->funcionario_id, 'p2' => $idBeneficiario, 'p3' => $ficha->id])}}">Detalles Ficha de Cierre</a></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @include('partials.footer')
        </section>
    </div>
@endsection