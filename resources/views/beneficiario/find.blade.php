<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
Administrar Beneficiarios - OID
@endsection

{{-- <!-- inyeccion de estilos -->
@section('styles_before')
<link href="{{ asset('/assets/stylesheets/plugins/fuelux/wizard.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection --}}

<!-- Atributos del body -->
@section('body-attr')
class='contrast-red'
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
                                    <span>Buscador de Beneficiario</span>
                                </h1>
                                <div class='pull-right'>
                                    <ul class='breadcrumb'>
                                        <li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <lista-beneficiarios></lista-beneficiarios>
                    </div>
                </div>
                @include('partials.footer')
            </div>
    </section>
</div>

@endsection
