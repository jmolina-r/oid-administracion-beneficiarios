<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Lista Espera - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles_before')
    <link href="{{ asset('/assets/stylesheets/plugins/fuelux/wizard.css') }}" rel="stylesheet" type="text/css"
          media="all"/>
@endsection

@section('styles')

    <link href='{{ asset('/assets/images/meta_icons/apple-touch-icon-precomposed.png') }}'
          rel='apple-touch-icon-precomposed'>
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('/assets/stylesheets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css"
          media="all"/>
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"
          media="all"/>
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet"
          type="text/css" media="all"/>


    <style>
        <style type="text/css" class="init"> body {
                font-size: 140%;
            }
        </style>


    @endsection

    <!-- Atributos del body -->
        @section('body-attr')
            class='contrast-red'
        @endsection

    <!-- Inyeccion de scripts
No importa que vayan antes del body, en el master layout se estan insertando alfinal.
-->
        @section('scripts')
            <script src="{{ asset('/assets/javascripts/jquery/jquery.min.js') }}" type="text/javascript"></script>
            <!-- / jquery mobile (for touch events) -->
            <script src="{{ asset('/assets/javascripts/jquery/jquery.mobile.custom.min.js') }}"
                    type="text/javascript"></script>
            <!-- / jquery ui -->
            <script src="{{ asset('/assets/javascripts/jquery/jquery-ui.min.js') }}" type="text/javascript"></script>
            <!-- / jQuery UI Touch Punch -->
            <script src="{{ asset('/assets/javascripts/jquery/jquery.ui.touch-punch.min.js') }}"
                    type="text/javascript"></script>
            <!-- / bootstrap [required] -->
            <script src="{{ asset('/assets/javascripts/bootstrap/bootstrap.js') }}" type="text/javascript"></script>
            <!-- / modernizr -->
            <script src="{{ asset('/assets/javascripts/plugins/modernizr/modernizr.min.js') }}"
                    type="text/javascript"></script>
            <!-- / retina -->
            <script src="{{ asset('/assets/javascripts/plugins/retina/retina.js') }}" type="text/javascript"></script>
            <!-- / theme file [required] -->
            <script src="{{ asset('/assets/javascripts/theme.js') }}" type="text/javascript"></script>

            <script src="https://use.fontawesome.com/3574066f0b.js"></script>

            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

            <script src="https://cdn.datatables.net/plug-ins/1.10.6/integration/bootstrap/3/dataTables.bootstrap.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>





            <script>
                $(document).ready(function () {
                    var historial_demanda = [];
                    var companyTable = $('#tabla-lista-espera').DataTable();
                    $('button.btnHistorial').click(function () {

                            //var name = $('td', this).eq().text();
                            var demanda_beneficiario_id = $(this).parent().parents("tr").find('td:first').text();

                            //var td = $(this).find('td');
                            //var demanda_beneficiario_id = td.eq(0).text();

                            console.log(demanda_beneficiario_id);
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                async: false,
                                url: "/beneficiario/gethistorialdemanda",
                                type: "GET",
                                data: {
                                    demanda_beneficiario_id: demanda_beneficiario_id
                                },
                                success: function (data, textStatus, jqXHR) {
                                    historial_demanda = $.parseJSON(data);
                                    var html = "<i class='fa fa-arrow-right'></i>";
                                    historial_demanda.forEach(function (element) {
                                        console.log(element);
                                        html = html + "<b>" + element.fecha + " </b>" + "<b>" + '    Estado:' + element.estado + '  -  ' + "</b>" + "<b>" + element.descripcion + "</b><br>";

                                    });
                                    //Escribir registro en modal
                                    $('#historial-dm').html(html);
                                    //desplegar modal
                                    $('#modalHistorial').modal("show");

                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    alert('error');
                                }
                            });

                    });


                    $('button.btnRegistro').click(function () {
                        var demanda_beneficiario_id = $(this).parent().parents("tr").find('td:first').text();
                        console.log(demanda_beneficiario_id);
                        //$("#company-full-name").val("");
                        //$("#company-short-name").val("");
                        //$('#modalHistorial').modal("");
                        $('#DescModal').modal("show");
                    });

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
                                                @php($nombreDemanda=App\Demanda::where('id',$id_demanda)->first()->nombre)
                                                <span><i class='fa fa-list-ol'></i> Lista de Espera: {{ucwords(strtolower($nombreDemanda))}}</span>
                                            </h1>
                                            <div class='pull-right'>
                                                <ul class='breadcrumb'>
                                                    <li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='box'>
                                            <div class='box-content box-padding'>
                                                <div class="container">
                                                    <div class='col-md-12 form-group'>
                                                        <label class='control-label' for='estado'>Estado: </label>
                                                        <div class='controls'>
                                                            <select id="id_estado" name="id_estado"
                                                                    class="form-control">
                                                                @foreach($estados as $estado)
                                                                    <option>{{$estado->nombre}}</option>
                                                                @endforeach
                                                                <option value="" selected>Todos</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!--Modal historial demandas-->
                                                    <div class="modal fade" id="modalHistorial" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-hidden="true">
                                                                        &times;
                                                                    </button>
                                                                    <h3 class="modal-title"><i
                                                                                class='fa fa-history'></i> Historial
                                                                    </h3>

                                                                </div>
                                                                <div id="historial-dm" class="modal-body">
                                                                    <b id="fecha"></b>
                                                                    <b id="estado-demanda"></b>
                                                                    <b id="descripcion"></b>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Cerrar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>

                                                    <!--Modal registrar nuevo estado-->
                                                    <div class="modal fade" id="DescModal" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h3 class="modal-title">Registrar nuevo Estado</h3>

                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row dataTable">
                                                                        <div class="col-md-4">
                                                                            <label class="control-label">Estado</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" maxlength="50" id="company-full-name" name="companyFullName">
                                                                        </div>
                                                                    </div>

                                                                    <br>

                                                                    <div class="row dataTable">
                                                                        <div class="col-md-4">
                                                                            <label class="control-label">Descripción</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" maxlength="30" id="company-short-name" name="companyShortName">
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-primary">Guardar</button>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->

                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class='box bordered-box green-border'
                                                             style='margin-bottom:0;'>
                                                            <div class='box-content box-no-padding'>
                                                                <div class='responsive-table'>
                                                                    <table id="tabla-lista-espera"
                                                                           name="tabla-lista-espera"
                                                                           class='display nowrap'
                                                                           style='margin-bottom:0;'>
                                                                        <thead>
                                                                        <tr>
                                                                            <th class="sorting_disabled"
                                                                                style="display:none;"></th>
                                                                            <th>Fecha Inscripcion</th>
                                                                            <th>Nombre</th>
                                                                            <th>Rut</th>
                                                                            <th> Estado</th>
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($demanda_beneficiarios as $demandasB)
                                                                            @php($beneficiario = App\Beneficiario::where('id',$demandasB->beneficiario_id)->first())

                                                                            <tr>
                                                                                <td style="display:none;">{{$demandasB->id}}</td>
                                                                                <td>{{$demandasB->created_at}}</td>
                                                                                <td>{{$beneficiario->nombre." ".$beneficiario->apellido}}</td>
                                                                                <td>{{$beneficiario->rut}}</td>
                                                                                <td>{{$demandasB->historial_demanda()->orderBy('created_at', 'desc')->first()->estado()->first()->nombre}}</td>
                                                                                <td class="details-control">
                                                                                    <button id ="btnHistorial" class="btnHistorial btn btn-primary btn-xs" type="button"><span class="fa fa-history"></span></button>
                                                                                    <button id ="btnRegistro"  class='btnRegistro btn btn-success btn-xs'type="button"><span class='fa fa-plus-square'></span></button>
                                                                                </td>
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
