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

                <div class="ant_prenatales">
                    <span class="pd_title">Antecedentes Prenatales</span>
                    @isset($fichaFonoaudiologia->antecedentes_pre_fono->plan_embarazo)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Planificación de Embarazo</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pre_fono->plan_embarazo }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_pre_fono->acept_embarazo)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Aceptación del embarazo</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pre_fono->acept_embarazo }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_pre_fono->control_embarazo)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Control de embarazo</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pre_fono->control_embarazo }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_pre_fono->ingesta_med)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Ingesta de medicamentos</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pre_fono->ingesta_med }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_pre_fono->ingesta_oh_drogas)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Ingesta de alcohol/drogas</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pre_fono->ingesta_oh_drogas }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_pre_fono->consumo_cigarrillo)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Consumo de cigarrillo</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pre_fono->consumo_cigarrillo }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_pre_fono->estado_emocional)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Estado emocional</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pre_fono->estado_emocional }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_pre_fono->enfermedades_embarazo)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Enfermedades importantes durante el embarazo</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pre_fono->enfermedades_embarazo }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_pre_fono->otros_prenatales)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Otros</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pre_fono->otros_prenatales }}</span>
                    </div>
                    @endisset
                </div>

                <div class="ant_perinatales">
                    <span class="pd_title">Antecedentes Perinatales</span>

                    @isset($fichaFonoaudiologia->antecedentes_peri_fono->tipo_parto)
                    <div class="pd_info-group">
                        <span class="pd_subtitle"></span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_peri_fono->tipo_parto }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_peri_fono->suf_fetal)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Sufrimiento fetal</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_peri_fono->suf_fetal }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_peri_fono->edad_gest)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Edad gestacional</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_peri_fono->edad_gest }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_peri_fono->lugar_naci)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Lugar de nacimiento</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_peri_fono->lugar_naci }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_peri_fono->peso)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Peso</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_peri_fono->peso }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_peri_fono->talla)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Talla</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_peri_fono->talla }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_peri_fono->apgar)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">APGAR</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_peri_fono->apgar }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_peri_fono->comp_parto)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Complicaciones durante el parto</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_peri_fono->comp_parto }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_peri_fono->hospitalizaciones)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Hospitalizaciones (¿Por qué?)</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_peri_fono->hospitalizaciones }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_peri_fono->otros_perinatales)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Otros</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_peri_fono->otros_perinatales }}</span>
                    </div>
                    @endisset
                </div>

                <div class="ant_postnatales">
                    <span class="pd_title">Antecedentes Postnatales</span>

                    @isset($fichaFonoaudiologia->antecedentes_pos_fono->trat_post_parto)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Tratamientos posteriores al parto</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pos_fono->trat_post_parto }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_pos_fono->tipo_alimenta)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Tipo de alimentación</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pos_fono->tipo_alimenta }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_pos_fono->edad_lactancia)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Hasta qué edad duró la lactancia?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pos_fono->edad_lactancia }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_pos_fono->operaciones_edad)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Operaciones (edad)</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pos_fono->operaciones_edad }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_pos_fono->hospitalizaciones_edad)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Hospitalizaciones (edad)</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pos_fono->hospitalizaciones_edad }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->antecedentes_pos_fono->observaciones_postnatales)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Observaciones</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->antecedentes_pos_fono->observaciones_postnatales }}</span>
                    </div>
                    @endisset
                </div>

                <div class="desa_psicomotor">
                    <span class="pd_title">Desarrollo Psicomotor (¿A qué edad?)</span>

                    @isset($fichaFonoaudiologia->desarrollo_psi_ed->control_cabeza)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Control cabeza</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_psi_ed->control_cabeza }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_psi_ed->sento)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Se sentó</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_psi_ed->sento }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_psi_ed->gateo)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Gateó</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_psi_ed->gateo }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_psi_ed->paro)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Se paró</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_psi_ed->paro }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_psi_ed->camino)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Caminó</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_psi_ed->camino }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_psi_ed->control_esf_diurno)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Control esfínter diurno</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_psi_ed->control_esf_diurno }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_psi_ed->control_esf_nocturno)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Control esfínter nocturnosento</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_psi_ed->control_esf_nocturno }}</span>
                    </div>
                    @endisset
                </div>

                <div class="desa_lenguaje">
                    <span class="pd_title">Desarrollo del lenguaje (¿A qué edad?)</span>

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->balbuceo)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Balbuceó</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->balbuceo }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->sonrio)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Sonrió</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->sonrio }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->primeras_palabras)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Dijo sus primeras palabras</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->primeras_palabras }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->frases_dos_palabras)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Dijo frases de 2 palabras</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->frases_dos_palabras }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->oraciones)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Dijo oraciones</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->oraciones }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->hablo_espo)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Habló espontáneamente</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->hablo_espo }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->siguio_inst)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Siguió instrucciones</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->siguio_inst }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->mira_ojos)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿El niño (a) mira a los ojos cuando usted lo habla?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->mira_ojos }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->mira_labios)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿El niño (a) mira a los labios cuando habla?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->mira_labios }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->comunica_palabras)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Intenta comunicarse con palabras?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->comunica_palabras }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->comunica_jergas)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Se comunica con jerga?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->comunica_jergas }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->comunica_palabras_sueltas)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Se comunica con palabras sueltas?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->comunica_palabras_sueltas }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->comunica_gestos)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Se comunica a través de gestos?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->comunica_gestos }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->entiende_dice)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Usted entiende lo que dice?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->entiende_dice }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_le_ed->desconocidos_entienden)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Las personas que no lo conocen entienden lo que dice?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_le_ed->desconocidos_entienden }}</span>
                    </div>
                    @endisset
                </div>

                <div class="des_social">
                    <span class="pd_title">Desarrollo Social</span>

                    @isset($fichaFonoaudiologia->desarrollo_so_fono->respeta_normas)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Respeta Normas</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_so_fono->respeta_normas }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_so_fono->comparte_juguetes)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Comparte Juguetes</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_so_fono->comparte_juguetes }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_so_fono->juega_otros)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Juega con otros niños</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_so_fono->juega_otros }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_so_fono->carinoso)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Cariñoso</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_so_fono->carinoso }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_so_fono->berrinches)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Hace berrinches</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_so_fono->berrinches }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_so_fono->frustra_facil)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Se frustra con facilidad</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_so_fono->frustra_facil }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_so_fono->irritable)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Irritable</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_so_fono->irritable }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_so_fono->agresivo)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Agresivo</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_so_fono->agresivo }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_so_fono->peleador)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Peleador</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_so_fono->peleador }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_so_fono->intereses)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Intereses</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_so_fono->intereses }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->desarrollo_so_fono->observaciones_social)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Observaciones</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->desarrollo_so_fono->observaciones_social }}</span>
                    </div>
                    @endisset
                </div>
                <div class="habitos">
                    <span class="pd_title">Hábitos</span>

                    @isset($fichaFonoaudiologia->habitos_si_no->mamadera)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Usa mamadera?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->habitos_si_no->mamadera }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->habitos_si_no->chupete)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Usa Chupete?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->habitos_si_no->chupete }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->habitos_si_no->chupa_dedo)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Se chupa el dedo?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->habitos_si_no->chupa_dedo }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->habitos_si_no->come_solo_tipo)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Come solo?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->habitos_si_no->come_solo_tipo }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->habitos_si_no->viste_solo)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Se viste solo?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->habitos_si_no->viste_solo }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->habitos_si_no->boca_abierta_dia)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Permanece con la boca abierta durante el día?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->habitos_si_no->boca_abierta_dia }}</span>
                    </div>
                    @endisset

                    @isset($fichaFonoaudiologia->habitos_si_no->boca_abierta_noche)
                    <div class="pd_info-group">
                        <span class="pd_subtitle">¿Permanece con la boca abierta durante la noche?</span>
                        <span class="pd_valor">{{ $fichaFonoaudiologia->habitos_si_no->boca_abierta_noche }}</span>
                    </div>
                    @endisset
                </div>

                <div class="ant_morbidos">
                    <span class="pd_title">Antecedentes mórbidos del niño (a)</span>
                    <div class="tabla">
                        <div class="cabecera">
                            <div class="encabezado">
                                ANTECEDENTE
                            </div>
                            <div class="encabezado">
                                PRESENCIA
                            </div>
                            <div class="encabezado">
                                DESCRIPCION
                            </div>
                        </div>

                        @if(isset($fichaKinesiologia->antecedentes_mor_fono->alergias_sn) || isset($fichaKinesiologia->antecedentes_mor_fono->alergias_desc))
                            <div class="cuerpo">
                                <div class="dato">Alergia</div>
                                @isset($fichaKinesiologia->antecedentes_mor_fono->alergias_sn)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->alergias_sn }}</div>
                                @endisset
                                @isset($fichaKinesiologia->antecedentes_mor_fono->alergias_desc)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->alergias_desc }}</div>
                                @endisset
                            </div>
                        @endif

                        @if(isset($fichaKinesiologia->antecedentes_mor_fono->otitis_sn) || isset($fichaKinesiologia->antecedentes_mor_fono->otitis_desc))
                            <div class="cuerpo">
                                <div class="dato">Otitis</div>
                                @isset($fichaKinesiologia->antecedentes_mor_fono->otitis_sn)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->otitis_sn }}</div>
                                @endisset
                                @isset($fichaKinesiologia->antecedentes_mor_fono->otitis_desc)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->otitis_desc }}</div>
                                @endisset
                            </div>
                        @endif

                        @if(isset($fichaKinesiologia->antecedentes_mor_fono->obesidad_sn) || isset($fichaKinesiologia->antecedentes_mor_fono->obesidad_desc))
                            <div class="cuerpo">
                                <div class="dato">Obesidad</div>
                                @isset($fichaKinesiologia->antecedentes_mor_fono->obesidad_sn)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->obesidad_sn }}</div>
                                @endisset
                                @isset($fichaKinesiologia->antecedentes_mor_fono->obesidad_desc)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->obesidad_desc }}</div>
                                @endisset
                            </div>
                        @endif

                        @if(isset($fichaKinesiologia->antecedentes_mor_fono->diabetes_sn) || isset($fichaKinesiologia->antecedentes_mor_fono->diabetes_desc))
                            <div class="cuerpo">
                                <div class="dato">Diabetes</div>
                                @isset($fichaKinesiologia->antecedentes_mor_fono->diabetes_sn)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->diabetes_sn }}</div>
                                @endisset
                                @isset($fichaKinesiologia->antecedentes_mor_fono->diabetes_desc)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->diabetes_desc }}</div>
                                @endisset
                            </div>
                        @endif

                        @if(isset($fichaKinesiologia->antecedentes_mor_fono->cirugias_sn) || isset($fichaKinesiologia->antecedentes_mor_fono->cirugias_desc))
                            <div class="cuerpo">
                                <div class="dato">Cirugías</div>
                                @isset($fichaKinesiologia->antecedentes_mor_fono->cirugias_sn)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->cirugias_sn }}</div>
                                @endisset
                                @isset($fichaKinesiologia->antecedentes_mor_fono->cirugias_desc)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->cirugias_desc }}</div>
                                @endisset
                            </div>
                        @endif

                        @if(isset($fichaKinesiologia->antecedentes_mor_fono->traumatis_sn) || isset($fichaKinesiologia->antecedentes_mor_fono->traumatis_desc))
                            <div class="cuerpo">
                                <div class="dato">Traumatismos</div>
                                @isset($fichaKinesiologia->antecedentes_mor_fono->traumatis_sn)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->traumatis_sn }}</div>
                                @endisset
                                @isset($fichaKinesiologia->antecedentes_mor_fono->traumatis_desc)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->traumatis_desc }}</div>
                                @endisset
                            </div>
                        @endif

                        @if(isset($fichaKinesiologia->antecedentes_mor_fono->epilepsia_sn) || isset($fichaKinesiologia->antecedentes_mor_fono->epilepsia_desc))
                            <div class="cuerpo">
                                <div class="dato">Epilepsia</div>
                                @isset($fichaKinesiologia->antecedentes_mor_fono->epilepsia_sn)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->epilepsia_sn }}</div>
                                @endisset
                                @isset($fichaKinesiologia->antecedentes_mor_fono->epilepsia_desc)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->epilepsia_desc }}</div>
                                @endisset
                            </div>
                        @endif

                        @if(isset($fichaKinesiologia->antecedentes_mor_fono->deficit_visual_sn) || isset($fichaKinesiologia->antecedentes_mor_fono->deficit_visual_desc))
                            <div class="cuerpo">
                                <div class="dato">Déficit visual</div>
                                @isset($fichaKinesiologia->antecedentes_mor_fono->deficit_visual_sn)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->deficit_visual_sn }}</div>
                                @endisset
                                @isset($fichaKinesiologia->antecedentes_mor_fono->deficit_visual_desc)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->deficit_visual_desc }}</div>
                                @endisset
                            </div>
                        @endif

                        @if(isset($fichaKinesiologia->antecedentes_mor_fono->deficit_auditivo_sn) || isset($fichaKinesiologia->antecedentes_mor_fono->deficit_auditivo_desc))
                            <div class="cuerpo">
                                <div class="dato">Déficit auditivo</div>
                                @isset($fichaKinesiologia->antecedentes_mor_fono->deficit_auditivo_sn)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->deficit_auditivo_sn }}</div>
                                @endisset
                                @isset($fichaKinesiologia->antecedentes_mor_fono->deficit_auditivo_desc)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->deficit_auditivo_desc }}</div>
                                @endisset
                            </div>
                        @endif

                        @if(isset($fichaKinesiologia->antecedentes_mor_fono->paralisis_cerebral_sn) || isset($fichaKinesiologia->antecedentes_mor_fono->paralisis_cerebral_desc))
                            <div class="cuerpo">
                                <div class="dato">Parálisis cerebral</div>
                                @isset($fichaKinesiologia->antecedentes_mor_fono->paralisis_cerebral_sn)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->paralisis_cerebral_sn }}</div>
                                @endisset
                                @isset($fichaKinesiologia->antecedentes_mor_fono->paralisis_cerebral_desc)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->paralisis_cerebral_desc }}</div>
                                @endisset
                            </div>
                        @endif

                        @if(isset($fichaKinesiologia->antecedentes_mor_fono->otros_morbidos))
                            <div class="cuerpo">
                                <div class="dato">Otros</div>
                                @isset($fichaKinesiologia->antecedentes_mor_fono->otros_morbidos)
                                <div class="dato">{{ $fichaKinesiologia->antecedentes_mor_fono->otros_morbidos }}</div>
                                @endisset
                            </div>
                        @endif
                    </div>   
                </div>    
            </div>                    
        </div>
    </body>
</html>
