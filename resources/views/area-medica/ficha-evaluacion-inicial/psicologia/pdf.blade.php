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

            th{
                color: #3c3c3c;
                width: 30px;
            }

            td{
                color: #7C7C7C;
            }

            .table{
                margin-left: 15px;
                width: 100px;
            }

            .tabla{
                margin-left: 15px;
                width: 450px;
            }

            .tabla .cabecera{
                border-bottom: 1px solid #CCC;
                border-top: 1px solid #CCC;
                color: #3c3c3c;
                height: 18px;
                padding-top: 5px;
                padding-bottom: 5px;
                width: 448px;
            }

            .tabla .encabezado, .dato{
                display: inline-block;
                width: 145px;
            }

            .especial{
                border-bottom: 1px solid #CCC;
                border-top: 1px solid #CCC;
                color: #3c3c3c;
                height: 35px;
                padding-top: 5px;
                padding-bottom: 5px;
                width: 448px;
            }

            .cuerpo{
                margin-top: 5px;
                width: 448px;
            }

            .dato{
                color: #7C7C7C;
                height: 35px;
            }
        </style>
    </head>
    <body>
        <div class="panel-izquierdo">

            <div class="logo">
                <img src="images/logo.png" alt="">
            </div>

            <div class="nombre">
                <h1>{{ $fichaPsicologia->beneficiario->nombre }} {{$fichaPsicologia->beneficiario->apellido }}</h1>
            </div>

            <div class="rut">
                <h2>{{ $fichaPsicologia->beneficiario->rut }}</h2>
            </div>

            <!-- TRATANTE-->
            <div class="info-basica">

                <span class="title">Tratante</span>

                <div class="info-group">
                    <span class="label">Médico Tratante: </span>
                    <h3>{{ $fichaPsicologia->funcionario->nombre }} {{ $fichaPsicologia->funcionario->apellido }}</h3>
                </div>

            </div>

            <!-- INFORMACION BASICA-->
            <div class="info-basica">

                <span class="title">Información Básica</span>

                <div class="info-group">
                    <span class="label">Género: </span>
                    <h3>{{ $fichaPsicologia->beneficiario->sexo }}</h3>                    
                </div>

                <div class="info-group">
                    <span class="label">Fecha de Nacimiento: </span>
                    <h3>{{ date('d/m/Y', strtotime($fichaPsicologia->beneficiario->fecha_nacimiento)) }}</h3>
                </div>

                <div class="info-group">
                    <span class="label">País: </span>
                    <h3>{{ $fichaPsicologia->beneficiario->pais->nombre }}</h3>
                </div>

                <div class="info-group">
                    <span class="label">Situación Civil: </span>
                    <h3>{{ $fichaPsicologia->beneficiario->estado_civil->nombre }}</h3>
                </div>

            </div>

            <!-- INFORMACION DE CONTACTO-->
            <div class="info-contacto">
                <span class="title">Contacto</span>

                <!-- Domicilio -->
                @isset($fichaPsicologia->beneficiario->domicilio->calle)
                <div class="info-group">
                    <span class="label">Domicilio: </span><br>
                    <h3>
                        {{$fichaPsicologia->beneficiario->domicilio->calle}}

                        @isset($fichaPsicologia->beneficiario->domicilio->numero)
                            {{$fichaPsicologia->beneficiario->domicilio->numero}}
                        @endisset
                        @isset($fichaPsicologia->beneficiario->domicilio->numero_depto)
                            , dpto. {{$fichaPsicologia->beneficiario->domicilio->numero_depto}}
                        @endisset
                        @isset($fichaPsicologia->beneficiario->domicilio->bloque)
                            , block {{$fichaPsicologia->beneficiario->domicilio->bloque}}
                        @endisset
                        @isset($fichaPsicologia->beneficiario->domicilio->pobl_vill)
                            , población {{$fichaPsicologia->beneficiario->domicilio->pobl_vill}}
                        @endisset
                    </h3>
                </div>
                @endisset

                <!-- Telefonos -->
                @if(@isset($fichaPsicologia->beneficiario->telefonos))
                <div class="info-group">
                    @isset($fichaPsicologia->beneficiario->telefonos)
                        @foreach ($fichaPsicologia->beneficiario->telefonos as $telefono)
                            <span class="label">{{ $telefono->tipo == "fijo" ? "Teléfono Fijo: " : "Teléfono Móvil: " }}</span><br>
                            <h3>{{ $telefono->tipo == "fijo" ? "+56" : "+56 9" }} {{$telefono->numero}}</h3><br>
                        @endforeach
                    @endisset
                </div>
                @endif

                <!-- E-mail -->
                @isset($fichaPsicologia->beneficiario->email)
                <div class="info-group">
                    <span class="label">E-mail: </span><br>
                    <h3>{{$fichaPsicologia->beneficiario->email}}</h3>
                </div>
                @endisset
            </div>
        </div>

        <div class="panel-derecho">

            <div class="motivo">
                <span class="pd_title">Datos Ficha</span>
                @isset($fichaPsicologia->motivo_consulta)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Motivo Consulta</span>
                    <span class="pd_valor">{{ $fichaPsicologia->motivo_consulta }}</span>
                </div>
                @endisset
            </div>

            <div class="antecedentes_familiares">
                <span class="pd_title">Antecedentes Familiares</span>

                @isset($fichaPsicologia->antecedentes_familiares->nombre_madre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Nombre de la Madre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->nombre_madre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->rut_madre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Rut de la Madre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->rut_madre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->edad_madre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Edad de la Madre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->edad_madre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->ocupacion_madre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Ocupación de la Madre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->ocupacion_madre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->escolaridad_madre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Escolaridad Madre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->escolaridad_madre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->telefono_madre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Teléfono Madre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->telefono_madre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->observaciones_madre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Observaciones Madre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->observaciones_madre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->fecha_nacimiento_madre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Fecha nacimiento Madre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->fecha_nacimiento_madre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->nombre_padre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Nombre del Padre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->nombre_padre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->rut_padre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Rut del Padre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->rut_padre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->edad_padre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Edad del Padre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->edad_padre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->ocupacion_padre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Ocupación del Padre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->ocupacion_padre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->escolaridad_padre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Escolaridad Padre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->escolaridad_padre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->telefono_padre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Teléfono Padre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->telefono_padre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->observaciones_padre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Observaciones Padre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->observaciones_padre }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_familiares->fecha_nacimiento_padre)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Fecha nacimiento Padre</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_familiares->fecha_nacimiento_padre }}</span>
                </div>
                @endisset

            </div>

            <div class="ant_medicos">
                <span class="pd_title">Antecedentes Médicos</span>
                @isset($fichaPsicologia->antecedentes_medicos->enfermedades_familiares)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Enfermedades Familiares</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_medicos->enfermedades_familiares }}</span>
                </div>
                @endisset

                @isset($fichaPsicologia->antecedentes_medicos->medicamentos)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Medicamentos</span>
                    <span class="pd_valor">{{ $fichaPsicologia->antecedentes_medicos->medicamentos }}</span>
                </div>
                @endisset
            </div>

            <div class="ant_medicos_2">
                <span class="pd_title">Tratamiento con especialistas</span>
                <div class="tabla">
                    <div class="cabecera">
                        <div class="encabezado">
                            ESPECIALIDAD
                        </div>
                        <div class="encabezado">
                            NOMBRE
                        </div>
                        <div class="encabezado">
                            SESIONES
                        </div>
                    </div>
                    @if(isset($fichaPsicologia->antecedentes_medicos->tratamientos_neurologo_nombre) || isset($fichaPsicologia->antecedentes_medicos->tratamientos_neurologo_sesiones))
                    <div class="cuerpo">
                        <div class="dato">Neurólogo</div>
                        <div class="dato">
                            @isset($fichaPsicologia->antecedentes_medicos->tratamientos_neurologo_nombre)
                            {{ $fichaPsicologia->antecedentes_medicos->tratamientos_neurologo_nombre }}
                            @endisset
                        </div>
                        <div class="dato">
                            @isset($fichaPsicologia->antecedentes_medicos->tratamientos_neurologo_sesiones)
                            {{ $fichaPsicologia->antecedentes_medicos->tratamientos_neurologo_sesiones }}
                            @endisset
                        </div>
                    </div>
                    @endif
                    @if(isset($fichaPsicologia->antecedentes_medicos->tratamientos_psiquiatra_nombre) || isset($fichaPsicologia->antecedentes_medicos->tratamientos_psiquiatra_sesiones))
                    <div class="cuerpo">
                        <div class="dato">Psiquiatra</div>
                        <div class="dato">
                            @isset($fichaPsicologia->antecedentes_medicos->tratamientos_psiquiatra_nombre)
                            {{ $fichaPsicologia->antecedentes_medicos->tratamientos_psiquiatra_nombre }}
                            @endisset
                        </div>
                        <div class="dato">
                            @isset($fichaPsicologia->antecedentes_medicos->tratamientos_psiquiatra_sesiones)
                            {{ $fichaPsicologia->antecedentes_medicos->tratamientos_psiquiatra_sesiones }}
                            @endisset
                        </div>
                    </div>
                    @endif
                    @if(isset($fichaPsicologia->antecedentes_medicos->tratamientos_fonoaudiologo_nombre) || isset($fichaPsicologia->antecedentes_medicos->tratamientos_fonoaudiologo_sesiones))
                    <div class="cuerpo">
                        <div class="dato">Fonoaudiólogo</div>
                        <div class="dato">
                            @isset($fichaPsicologia->antecedentes_medicos->tratamientos_fonoaudiologo_nombre)
                            {{ $fichaPsicologia->antecedentes_medicos->tratamientos_fonoaudiologo_nombre }}
                            @endisset
                        </div>
                        <div class="dato">
                            @isset($fichaPsicologia->antecedentes_medicos->tratamientos_fonoaudiologo_sesiones)
                            {{ $fichaPsicologia->antecedentes_medicos->tratamientos_fonoaudiologo_sesiones }}
                            @endisset
                        </div>
                    </div>
                    @endif
                    @if(isset($fichaPsicologia->antecedentes_medicos->tratamientos_ocupacional_nombre) || isset($fichaPsicologia->antecedentes_medicos->tratamientos_ocupacional_sesiones))
                    <div class="cuerpo">
                        <div class="dato">Terapeuta Ocupacional</div>
                        <div class="dato">
                            @isset($fichaPsicologia->antecedentes_medicos->tratamientos_ocupacional_nombre)
                            {{ $fichaPsicologia->antecedentes_medicos->tratamientos_ocupacional_nombre }}
                            @endisset
                        </div>
                        <div class="dato">
                            @isset($fichaPsicologia->antecedentes_medicos->tratamientos_ocupacional_sesiones)
                            {{ $fichaPsicologia->antecedentes_medicos->tratamientos_ocupacional_sesiones }}
                            @endisset
                        </div>
                    </div>
                    @endif
                    @if(isset($fichaPsicologia->antecedentes_medicos->tratamientos_kinesiologo_nombre) || isset($fichaPsicologia->antecedentes_medicos->tratamientos_kinesiologo_sesiones))
                    <div class="cuerpo">
                        <div class="dato">Kinesiólogo</div>
                        <div class="dato">
                            @isset($fichaPsicologia->antecedentes_medicos->tratamientos_kinesiologo_nombre)
                            {{ $fichaPsicologia->antecedentes_medicos->tratamientos_kinesiologo_nombre }}
                            @endisset
                        </div>
                        <div class="dato">
                            @isset($fichaPsicologia->antecedentes_medicos->tratamientos_kinesiologo_sesiones)
                            {{ $fichaPsicologia->antecedentes_medicos->tratamientos_kinesiologo_sesiones }}
                            @endisset
                        </div>
                    </div>
                    @endif
                    @if(isset($fichaPsicologia->antecedentes_medicos->tratamientos_psicologo_nombre) || isset($fichaPsicologia->antecedentes_medicos->tratamientos_psicologo_sesiones))
                    <div class="cuerpo">
                        <div class="dato">Psicólogo</div>
                        <div class="dato">
                            @isset($fichaPsicologia->antecedentes_medicos->tratamientos_psicologo_nombre)
                            {{ $fichaPsicologia->antecedentes_medicos->tratamientos_psicologo_nombre }}
                            @endisset
                        </div>
                        <div class="dato">
                            @isset($fichaPsicologia->antecedentes_medicos->tratamientos_psicologo_sesiones)
                            {{ $fichaPsicologia->antecedentes_medicos->tratamientos_psicologo_sesiones }}
                            @endisset
                        </div>
                    </div>
                    @endif
                </div>   
            </div>
        </div>
    </body>
</html>
