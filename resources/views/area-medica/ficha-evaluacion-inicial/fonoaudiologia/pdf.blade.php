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
                <h1>{{ $fichaFonoaudiologia->beneficiario->nombre }} {{$fichaFonoaudiologia->beneficiario->apellido }}</h1>
            </div>

            <div class="rut">
                <h2>{{ $fichaFonoaudiologia->beneficiario->rut }}</h2>
            </div>

            <!-- TRATANTE-->
            <div class="info-basica">

                <span class="title">Tratante</span>

                <div class="info-group">
                    <span class="label">Médico Tratante: </span>
                    <h3>{{ $fichaFonoaudiologia->funcionario->nombre }} {{ $fichaFonoaudiologia->funcionario->apellido }}</h3>
                </div>

            </div>

            <!-- INFORMACION BASICA-->
            <div class="info-basica">

                <span class="title">Información Básica</span>

                <div class="info-group">
                    <span class="label">Género: </span>
                    <h3>{{ $fichaFonoaudiologia->beneficiario->sexo }}</h3>                    
                </div>

                <div class="info-group">
                    <span class="label">Fecha de Nacimiento: </span>
                    <h3>{{ date('d/m/Y', strtotime($fichaFonoaudiologia->beneficiario->fecha_nacimiento)) }}</h3>
                </div>

                <div class="info-group">
                    <span class="label">País: </span>
                    <h3>{{ $fichaFonoaudiologia->beneficiario->pais->nombre }}</h3>
                </div>

                <div class="info-group">
                    <span class="label">Situación Civil: </span>
                    <h3>{{ $fichaFonoaudiologia->beneficiario->estado_civil->nombre }}</h3>
                </div>

            </div>

            <!-- INFORMACION DE CONTACTO-->
            <div class="info-contacto">
                <span class="title">Contacto</span>

                <!-- Domicilio -->
                @isset($fichaFonoaudiologia->beneficiario->domicilio->calle)
                <div class="info-group">
                    <span class="label">Domicilio: </span><br>
                    <h3>
                        {{$fichaFonoaudiologia->beneficiario->domicilio->calle}}

                        @isset($fichaFonoaudiologia->beneficiario->domicilio->numero)
                            {{$fichaFonoaudiologia->beneficiario->domicilio->numero}}
                        @endisset
                        @isset($fichaFonoaudiologia->beneficiario->domicilio->numero_depto)
                            , dpto. {{$fichaFonoaudiologia->beneficiario->domicilio->numero_depto}}
                        @endisset
                        @isset($fichaFonoaudiologia->beneficiario->domicilio->bloque)
                            , block {{$fichaFonoaudiologia->beneficiario->domicilio->bloque}}
                        @endisset
                        @isset($fichaFonoaudiologia->beneficiario->domicilio->pobl_vill)
                            , población {{$fichaFonoaudiologia->beneficiario->domicilio->pobl_vill}}
                        @endisset
                    </h3>
                </div>
                @endisset

                <!-- Telefonos -->
                @if(@isset($fichaFonoaudiologia->beneficiario->telefonos))
                <div class="info-group">
                    @isset($fichaFonoaudiologia->beneficiario->telefonos)
                        @foreach ($fichaFonoaudiologia->beneficiario->telefonos as $telefono)
                            <span class="label">{{ $telefono->tipo == "fijo" ? "Teléfono Fijo: " : "Teléfono Móvil: " }}</span><br>
                            <h3>{{ $telefono->tipo == "fijo" ? "+56" : "+56 9" }} {{$telefono->numero}}</h3><br>
                        @endforeach
                    @endisset
                </div>
                @endif

                <!-- E-mail -->
                @isset($fichaFonoaudiologia->beneficiario->email)
                <div class="info-group">
                    <span class="label">E-mail: </span><br>
                    <h3>{{$fichaFonoaudiologia->beneficiario->email}}</h3>
                </div>
                @endisset
            </div>
        </div>

        <div class="panel-derecho">

            <div class="datos_ficha">
                <span class="pd_title">Datos Ficha</span>
                @isset($fichaFonoaudiologia->motivo_consulta)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Motivo de la Consulta</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->motivo_consulta }}</span>
                </div>
                @endisset
            </div>

            <div class="datos_familiares">
                <span class="pd_title">Antecedentes Familiares (¿Con quién vive?)</span>
                {{--
                <!-- @isset($fichaFonoaudiologia->parientes_hogar_fono->nombre1)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Nombre Pariente</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->nombre1 }}</span>
                    <span class="pd_subtitle">Parentesco</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->parentesco1 }}</span>
                    <span class="pd_subtitle">Edad</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->edad1 }}</span>
                    <span class="pd_subtitle">Escolaridad</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->escolaridad1 }}</span>
                    <span class="pd_subtitle">Ocupación</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->ocupacion1 }}</span>
                </div>
                @endisset
                @isset($fichaFonoaudiologia->parientes_hogar_fono->nombre2)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Nombre Pariente</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->nombre2 }}</span>
                    <span class="pd_subtitle">Parentesco</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->parentesco2 }}</span>
                    <span class="pd_subtitle">Edad</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->edad2 }}</span>
                    <span class="pd_subtitle">Escolaridad</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->escolaridad2 }}</span>
                    <span class="pd_subtitle">Ocupación</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->ocupacion2 }}</span>
                </div>
                @endisset
                @isset($fichaFonoaudiologia->parientes_hogar_fono->nombre3)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Nombre Pariente</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->nombre3 }}</span>
                    <span class="pd_subtitle">Parentesco</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->parentesco3 }}</span>
                    <span class="pd_subtitle">Edad</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->edad3 }}</span>
                    <span class="pd_subtitle">Escolaridad</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->escolaridad3 }}</span>
                    <span class="pd_subtitle">Ocupación</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->ocupacion3 }}</span>
                </div>
                @endisset
                @isset($fichaFonoaudiologia->parientes_hogar_fono->nombre4)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Nombre Pariente</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->nombre4 }}</span>
                    <span class="pd_subtitle">Parentesco</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->parentesco4 }}</span>
                    <span class="pd_subtitle">Edad</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->edad4 }}</span>
                    <span class="pd_subtitle">Escolaridad</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->escolaridad4 }}</span>
                    <span class="pd_subtitle">Ocupación</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->ocupacion4 }}</span>
                </div>
                @endisset
                @isset($fichaFonoaudiologia->parientes_hogar_fono->nombre5)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Nombre Pariente</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->nombre5 }}</span>
                    <span class="pd_subtitle">Parentesco</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->parentesco5 }}</span>
                    <span class="pd_subtitle">Edad</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->edad5 }}</span>
                    <span class="pd_subtitle">Escolaridad</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->escolaridad5 }}</span>
                    <span class="pd_subtitle">Ocupación</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->ocupacion5 }}</span>
                </div>
                @endisset
                @isset($fichaFonoaudiologia->parientes_hogar_fono->nombre6)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Nombre Pariente</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->nombre6 }}</span>
                    <span class="pd_subtitle">Parentesco</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->parentesco6 }}</span>
                    <span class="pd_subtitle">Edad</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->edad6 }}</span>
                    <span class="pd_subtitle">Escolaridad</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->escolaridad6 }}</span>
                    <span class="pd_subtitle">Ocupación</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->ocupacion6 }}</span>
                </div>
                @endisset 

                @isset($fichaFonoaudiologia->parientes_hogar_fono->observaciones_parientes)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Observaciones</span>
                    <span class="pd_valor">{{ $fichaFonoaudiologia->parientes_hogar_fono->observaciones_parientes }}</span>
                </div>
                @endisset-->  
                --}}

                <div class="datos_ficha">
                    <span class="pd_title">Antecedentes Prenatales</span>
                    @isset($fichaFonoaudiologia->antecedentes_pre_fono->plan_embarazo)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Planificación de Embarazo</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pre_fono->plan_embarazo }}</span>
                    </div>
                    @endisset
                </div>

            </div>                    
        </div>
    </body>
</html>
