<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <style media="screen">

            body{
                color: #fff;
                font-family: "Segoe UI";
                margin: 0 auto;
                padding: 0;
                vertical-align: top;
                width: 100%;
            }

            img{
                width: 100%;
            }

            .panel-izquierdo{
                background-color: #183446;
                display: inline-block;
                position: absolute;
                text-align: center;
                padding-bottom: 40px;
                width: 35%;
            }

            .logo, .nombre, .rut, .info-basica, .info-contacto{
                margin: 0 15px 0 15px;
                width: 100%;
            }

            .rut {
                margin-top: 10px;
            }

            .logo img{
                margin: 40px 0 40px 0;
                width: 80%;
            }

            .info-basica, .info-contacto{
                margin-top: 30px;
                text-align: center;
            }

            .title{
                font-size: 18px;
                text-align: center;
                text-decoration: underline;
                text-transform: uppercase;
            }

            .info-group{
                margin-top: 10px;
                overflow: none;
                width: 100%;
            }

            h1, h2, h3, h4{
                margin: 0;
                padding: 0;
            }

            h1{
                font-size: 22px;
                text-transform: uppercase;
            }

            h2{
                font-size: 18px;
                margin: 0;
                padding: 0;
            }

            h3{
                display: inline-block;
                font-size: 14px;
                font-weight: lighter;
                text-align: left;
                text-transform: capitalize;
                max-width: 100%;
                word-wrap: break-word;
            }

            .label{
                display: inline-block;
                font-size: 12px;
                font-weight: bold;
                text-transform: uppercase;
                max-width: 100%;
            }

            .panel-derecho{
                display: inline-block;
                height: 100%;
                margin-left: 35%;
                width: 65%;
            }

            .pd_title{
                color: #183446;
                display: inline-block;
                font-weight: bold;
                font-size: 20px;
                margin: 26px 0px 26px 35px;
                text-transform: uppercase;
                width: 100%;
            }

            .pd_info-group{
                margin: 15px 0 0 20px;
                position: relative;
            }

            .pd_subtitle{
                color: #3c3c3c;
                font-size: 14px;
                font-weight: bold;
                text-transform: uppercase;
            }

            .pd_valor{
                color: #7C7C7C;
                font-size: 14px;
                font-weight: bold;
                margin-left: 20px;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>
        <div class="panel-izquierdo">

            <div class="logo">
                <img src="images/logo.png" alt="">
            </div>

            <div class="nombre">
                <h1>{{ $beneficiario->nombre }} {{ $beneficiario->apellido }}</h1>
            </div>

            <div class="rut">
                <h2>{{ $beneficiario->rut }}</h2>
            </div>

            <!-- INFORMACION BASICA-->
            <div class="info-basica">

                <span class="title">Información Básica</span>

                <div class="info-group">
                    <span class="label">Género: </span>
                    <h3>{{ $beneficiario->sexo }}</h3>                    
                </div>

                <div class="info-group">
                    <span class="label">Fecha de Nacimiento: </span>
                    <h3>{{ date('d/m/Y', strtotime($beneficiario->fecha_nacimiento)) }}</h3>
                </div>

                <div class="info-group">
                    <span class="label">País: </span>
                    <h3>{{ $beneficiario->pais->nombre }}</h3>
                </div>

                <div class="info-group">
                    <span class="label">Situación Civil: </span>
                    <h3>{{ $beneficiario->estado_civil->nombre }}</h3>
                </div>

            </div>

            <!-- INFORMACION DE CONTACTO-->
            <div class="info-contacto">
                <span class="title">Contacto</span>

                <!-- Domicilio -->
                @isset($beneficiario->domicilio->calle)
                <div class="info-group">
                    <span class="label">Domicilio: </span><br>
                    <h3>
                        {{$beneficiario->domicilio->calle}}

                        @isset($beneficiario->domicilio->numero)
                            {{$beneficiario->domicilio->numero}}
                        @endisset
                        @isset($beneficiario->domicilio->numero_depto)
                            , dpto. {{$beneficiario->domicilio->numero_depto}}
                        @endisset
                        @isset($beneficiario->domicilio->bloque)
                            , block {{$beneficiario->domicilio->bloque}}
                        @endisset
                        @isset($beneficiario->domicilio->pobl_vill)
                            , población {{$beneficiario->domicilio->pobl_vill}}
                        @endisset
                    </h3>
                </div>
                @endisset

                <!-- Telefonos -->
                @if(@isset($beneficiario->telefonos))
                <div class="info-group">
                    @isset($beneficiario->telefonos)
                        @foreach ($beneficiario->telefonos as $telefono)
                            <span class="label">{{ $telefono->tipo == "fijo" ? "Teléfono Fijo: " : "Teléfono Móvil: " }}</span><br>
                            <h3>{{ $telefono->tipo == "fijo" ? "+56" : "+56 9" }} {{$telefono->numero}}</h3><br>
                        @endforeach
                    @endisset
                </div>
                @endif

                <!-- E-mail -->
                @isset($beneficiario->email)
                <div class="info-group">
                    <span class="label">E-mail: </span><br>
                    <h3>{{$beneficiario->email}}</h3>
                </div>
                @endisset
            </div>
        </div>

        <div class="panel-derecho">
            <div class="sociales">
                <span class="pd_title">Datos Sociales</span>

                @isset($beneficiario->ficha_beneficiario->dato_social->isapre)
                <div class="pd_info-group">                    
                    <span class="pd_subtitle">Isapre</span>
                    <span class="pd_valor">{{$beneficiario->ficha_beneficiario->dato_social->isapre->organizacion}}</span>
                </div>
                @endisset

                @isset($beneficiario->ficha_beneficiario->dato_social->fonasa)
                <div class="pd_info-group">                    
                    <span class="pd_subtitle">Fonasa</span>
                    <span class="pd_valor">Tramo {{$beneficiario->ficha_beneficiario->dato_social->fonasa->tramo}}</span>
                </div>
                @endisset

                <!-- Previsión -->
                @isset($beneficiario->ficha_beneficiario->dato_social->prevision)
                    <div class="pd_info-group">                    
                        <span class="pd_subtitle">Previsión</span>
                        <span class="pd_valor">{{$beneficiario->ficha_beneficiario->dato_social->prevision->nombre}}
                        </span>
                    </div>
                @endisset

                <!-- Nivel educacional -->
                <div class="pd_info-group">                    
                    <span class="pd_subtitle">Nivel educacional</span>
                    <span class="pd_valor">{{$beneficiario->educacion->nombre}}
                    </span>
                </div>

                <!-- Ocupacion -->
                <div class="pd_info-group">                    
                    <span class="pd_subtitle">Ocupación</span>
                    <span class="pd_valor">{{$beneficiario->ocupacion->nombre}}
                    </span>
                </div>

                @if(isset($beneficiario->ficha_beneficiario->dato_social->beneficios) && count($beneficiario->ficha_beneficiario->dato_social->beneficios) > 0)
                    <div class="pd_info-group">                    
                        <span class="pd_subtitle">Beneficios</span>
                        @foreach ($beneficiario->ficha_beneficiario->dato_social->beneficios as $beneficio)
                            <span class="pd_valor">{{ $beneficio->nombre }}</span>
                        @endforeach
                    </div>
                @endif

                @isset($beneficiario->ficha_beneficiario->dato_social->sistema_proteccion)
                    <div class="pd_info-group">                    
                        <span class="pd_subtitle">Sistema de Protección</span>
                        <span class="pd_valor">{{$beneficiario->ficha_beneficiario->dato_social->sistema_proteccion->nombre}}</span>
                    </div>
                @endisset

                @if(isset($beneficiario->ficha_beneficiario->dato_social->organizaciones_sociales) && count($beneficiario->ficha_beneficiario->dato_social->organizaciones_sociales) > 0)
                    <div class="pd_info-group">                    
                        <span class="pd_subtitle">Organizaciones Sociales</span>
                    @foreach ($beneficiario->ficha_beneficiario->dato_social->organizaciones_sociales as $organizacione_social)
                        <span class="pd_valor">{{ $organizacione_social->nombre }}</span>
                    @endforeach
                    </div>
                @endif

                @isset($beneficiario->registro_social_hogar)
                    <div class="pd_info-group">  
                        @if($beneficiario->registro_social_hogar->en_tramite === 1)
                            <span class="pd_subtitle">Registro Social de Hogares </span> 
                            <span class="pd_valor">En Trámite</span>
                        @else
                            @isset($beneficiario->registro_social_hogar->porcentaje)
                                <span class="pd_subtitle">Registro Social de Hogares </span> 
                                <span class="pd_valor">{{ $beneficiario->registro_social_hogar->porcentaje }}%</span>
                            @endisset
                        @endif
                    </div>
                @endisset

                @isset($beneficiario->credencial_discapacidad)
                    <div class="pd_info-group">
                        @if($beneficiario->credencial_discapacidad->en_tramite === 1)
                            <span class="pd_subtitle">Credencial de Discapacidad</span>
                            <span class="pd_valor">En Trámite</span>
                        @else
                            @isset($beneficiario->credencial_discapacidad->fecha_vencimiento)
                                <span class="pd_subtitle">Vencimiento Credencial de Discapacidad</span>
                                <span class="pd_valor">{{ date('d/m/Y', strtotime($beneficiario->credencial_discapacidad->fecha_vencimiento)) }}</span>
                            @endisset
                        @endif
                    </div>
                @endisset

            </div>

            <div class="discapacidad">
                <span class="pd_title">Datos de Discapacidad</span>

                @if(isset($beneficiario->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades) && count($beneficiario->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades) > 0)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Porcentajes de Discapacidad</span>
                        @foreach ($beneficiario->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades as $discapacidad)
                            <span class="pd_valor">{{ $discapacidad->tipo_discapacidad->nombre }} {{ $discapacidad->porcentaje }}%</span>
                        @endforeach
                    </div>
                @endif

                <div class="pd_info-group">
                    <span class="pd_subtitle">Requiere Cuidados de Tercero</span>
                    @if($beneficiario->ficha_beneficiario->ficha_discapacidad->requiere_cuidado === 1)
                        <span class="pd_valor">Si</span>
                    @else
                        <span class="pd_valor">No</span>
                    @endif
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Tipo de Dependencia</span> 
                    <span class="pd_valor">{{$beneficiario->ficha_beneficiario->ficha_discapacidad->tipo_dependencia->nombre}}</span>
                </div>

                @if(isset($beneficiario->ficha_beneficiario->ficha_discapacidad->diagnostico) || isset($beneficiario->ficha_beneficiario->ficha_discapacidad->otras_enfermedades))
                    <div class="pd_info-group">
                        @isset($beneficiario->ficha_beneficiario->ficha_discapacidad->diagnostico)
                            <span class="pd_subtitle">Diagnóstico Médico: </span>
                            <span class="pd_valor">{{ $beneficiario->ficha_beneficiario->ficha_discapacidad->diagnostico }}</span>
                        @endisset
                    </div>
                    <div class="pd_info-group">
                        @isset($beneficiario->ficha_beneficiario->ficha_discapacidad->otras_enfermedades)
                            <span class="pd_subtitle">Otras Enfermedades</span>
                            <span class="pd_valor">{{ $beneficiario->ficha_beneficiario->ficha_discapacidad->otras_enfermedades }}</span>
                        @endisset
                    </div>>
                @endif



            </div>

            <div class="discapacidad">
                <span class="pd_title">Datos del Tutor</span>
                
                <div class="pd_info-group">
                    <span class="pd_subtitle">Nombre Completo</span>
                    <span class="pd_valor">{{ $beneficiario->tutor->nombre }} {{ $beneficiario->tutor->apellido }}</span>
                </div>

                <div class="pd_info-group">
                    @foreach ($beneficiario->tutor->telefonos as $telefono)
                        <span class="pd_subtitle">{{ $telefono->tipo == "fijo" ? "Teléfono Fijo" : "Teléfono Celular" }}</span> 
                        <span class="pd_valor">{{ $telefono->tipo == "fijo" ? "+56" : "+56 9" }} {{$telefono->numero}}</span>
                    @endforeach
                </div>
            </div>

            @isset($beneficiario->ficha_beneficiario->dato_social->observacion)
            <div class="observaciones">
                <span class="pd_title">Observaciones Generales</span>
                <div class="pd_info-group">
                    <span class="pd_subtitle">Observación</span>
                    <span class="pd_valor">{{$beneficiario->ficha_beneficiario->dato_social->observacion}}</span>
                </div>
            </div>
            @endisset
        </div>
    </body>
</html>
