{{-- Extiende el master layout --}}
@extends('layouts.master')

{{-- Meta atributo title --}}
@section('title')
Inicio - OID
@endsection

{{-- Atributos del body --}}
@section('body-attr')
class='contrast-red'
@endsection

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
                                    <span>Home</span>
                                </h1>
                                <div class='pull-right'>
                                    <ul class='breadcrumb'>
                                        <li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.footer')
        </div>
    <section>
</div>
