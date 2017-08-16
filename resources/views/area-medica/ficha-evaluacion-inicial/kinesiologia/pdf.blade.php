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
            }
        </style>
    </head>
    <body>
        <div class="panel-izquierdo">

            <div class="logo">
                <img src="images/logo.png" alt="">
            </div>

            <div class="nombre">
                <h1>{{ $fichaKinesiologia->beneficiario->nombre }} {{$fichaKinesiologia->beneficiario->apellido }}</h1>
            </div>

            <div class="rut">
                <h2>{{ $fichaKinesiologia->beneficiario->rut }}</h2>
            </div>

            <!-- TRATANTE-->
            <div class="info-basica">

                <span class="title">Tratante</span>

                <div class="info-group">
                    <span class="label">Médico Tratante: </span>
                    <h3>{{ $fichaKinesiologia->funcionario->nombre }} {{ $fichaKinesiologia->funcionario->apellido }}</h3>
                </div>

            </div>

            <!-- INFORMACION BASICA-->
            <div class="info-basica">

                <span class="title">Información Básica</span>

                <div class="info-group">
                    <span class="label">Género: </span>
                    <h3>{{ $fichaKinesiologia->beneficiario->sexo }}</h3>                    
                </div>

                <div class="info-group">
                    <span class="label">Fecha de Nacimiento: </span>
                    <h3>{{ date('d/m/Y', strtotime($fichaKinesiologia->beneficiario->fecha_nacimiento)) }}</h3>
                </div>

                <div class="info-group">
                    <span class="label">País: </span>
                    <h3>{{ $fichaKinesiologia->beneficiario->pais->nombre }}</h3>
                </div>

                <div class="info-group">
                    <span class="label">Situación Civil: </span>
                    <h3>{{ $fichaKinesiologia->beneficiario->estado_civil->nombre }}</h3>
                </div>

            </div>

            <!-- INFORMACION DE CONTACTO-->
            <div class="info-contacto">
                <span class="title">Contacto</span>

                <!-- Domicilio -->
                @isset($fichaKinesiologia->beneficiario->domicilio->calle)
                <div class="info-group">
                    <span class="label">Domicilio: </span><br>
                    <h3>
                        {{$fichaKinesiologia->beneficiario->domicilio->calle}}

                        @isset($fichaKinesiologia->beneficiario->domicilio->numero)
                            {{$fichaKinesiologia->beneficiario->domicilio->numero}}
                        @endisset
                        @isset($fichaKinesiologia->beneficiario->domicilio->numero_depto)
                            , dpto. {{$fichaKinesiologia->beneficiario->domicilio->numero_depto}}
                        @endisset
                        @isset($fichaKinesiologia->beneficiario->domicilio->bloque)
                            , block {{$fichaKinesiologia->beneficiario->domicilio->bloque}}
                        @endisset
                        @isset($fichaKinesiologia->beneficiario->domicilio->pobl_vill)
                            , población {{$fichaKinesiologia->beneficiario->domicilio->pobl_vill}}
                        @endisset
                    </h3>
                </div>
                @endisset

                <!-- Telefonos -->
                @if(@isset($fichaKinesiologia->beneficiario->telefonos))
                <div class="info-group">
                    @isset($fichaKinesiologia->beneficiario->telefonos)
                        @foreach ($fichaKinesiologia->beneficiario->telefonos as $telefono)
                            <span class="label">{{ $telefono->tipo == "fijo" ? "Teléfono Fijo: " : "Teléfono Móvil: " }}</span><br>
                            <h3>{{ $telefono->tipo == "fijo" ? "+56" : "+56 9" }} {{$telefono->numero}}</h3><br>
                        @endforeach
                    @endisset
                </div>
                @endif

                <!-- E-mail -->
                @isset($fichaKinesiologia->beneficiario->email)
                <div class="info-group">
                    <span class="label">E-mail: </span><br>
                    <h3>{{$fichaKinesiologia->beneficiario->email}}</h3>
                </div>
                @endisset
            </div>
        </div>

        <div class="panel-derecho">

            <div class="ant_morbidos">
                <span class="pd_title">Antecedentes Mórbidos</span>
                @isset($fichaKinesiologica->antecedentes_morbidos->pat_concom)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Patologías Concomitantes</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->antecedentes_morbidos->pat_concom }}</span>
                </div>
                @endisset
                @isset($fichaKinesiologica->antecedentes_morbidos->alergias)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Alergias</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->antecedentes_morbidos->alergias }}</span>
                </div>
                @endisset
                @isset($fichaKinesiologica->antecedentes_morbidos->medicamentos)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Medicamentos</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->antecedentes_morbidos->medicamentos }}</span>
                </div>
                @endisset
                @isset($fichaKinesiologica->antecedentes_morbidos->ant_quir)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Antecedentes Quirúrgicos</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->antecedentes_morbidos->ant_quir }}</span>
                </div>
                @endisset
                @isset($fichaKinesiologica->antecedentes_morbidos->aparatos)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Aparatos</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->antecedentes_morbidos->aparatos }}</span>
                </div>
                @endisset
                @isset($fichaKinesiologica->antecedentes_morbidos->fuma_sn)
                <div class="pd_info-group">
                    <span class="pd_subtitle">¿Fuma?</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->antecedentes_morbidos->fuma_sn }}</span>
                </div>
                @endisset
                @isset($fichaKinesiologica->antecedentes_morbidos->alcohol_sn)
                <div class="pd_info-group">
                    <span class="pd_subtitle">¿Bebe OH?</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->antecedentes_morbidos->alcohol_sn }}</span>
                </div>
                @endisset
                @isset($fichaKinesiologica->antecedentes_morbidos->act_fisica_sn)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Actividad Física</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->antecedentes_morbidos->act_fisica_sn }}</span>
                </div>
                @endisset
            </div>

            <div class="otros_antecedentes">
                <span class="pd_title">Otros Antecedentes</span>
                @isset($fichaKinesilogia->situacion_familiar)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Situación Familiar</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->situacion_familiar }}</span>
                </div>
                @endisset
                @isset($fichaKinesilogia->situacion_laboral)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Situación Laboral</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->situacion_laboral }}</span>
                </div>
                @endisset
                @isset($fichaKinesilogia->asiste_centro_rhb)
                <div class="pd_info-group">
                    <span class="pd_subtitle">¿Asisten a algún centro de RHB?</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->asiste_centro_rhb }}</span>
                </div>
                @endisset
                @isset($fichaKinesilogia->motivo_consulta)
                <div class="pd_info-group">
                    <span class="pd_subtitle">Motivo de consulta</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->motivo_consulta }}</span>
                </div>
                @endisset
            </div>

            <div class="ant_morbidos">
                <span class="pd_title">Escala de Valoración Funcional</span>
                <div class="tabla">
                    <div class="cabecera">
                        <div class="encabezado">
                            CATEGORÍA
                        </div>
                        <div class="encabezado">
                            PUNTAJE
                        </div>
                        <div class="encabezado">
                            COMENTARIOS
                        </div>
                    </div>
                    <div class="cabecera">
                        <div class="encabezado">
                            AUTOCUIDADO
                        </div>
                    </div>
                    @if(isset($fichaKinesiologia->val_autocuidado->puntaje_alimentacion) || isset($fichaKinesiologia->val_autocuidado->coment_alimentacion))
                    <div class="cuerpo">
                        <div class="dato">Alimentación</div>
                        @isset($fichaKinesiologia->val_autocuidado->puntaje_alimentacion)
                        <div class="dato">{{ $fichaKinesiologia->val_autocuidado->puntaje_alimentacion }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_autocuidado->coment_alimentacion)
                        <div class="dato">{{ $fichaKinesiologia->val_autocuidado->coment_alimentacion }}</div>
                        @endisset
                    </div>
                    @endif
                    @if(isset($fichaKinesiologia->val_autocuidado->puntaje_arreglo_pers) || isset($fichaKinesiologia->val_autocuidado->coment_arreglo_pers))
                    <div class="cuerpo">
                        <div class="dato">Arreglo Personal</div>
                        @isset($fichaKinesiologia->val_autocuidado->puntaje_arreglo_pers)
                        <div class="dato">{{ $fichaKinesiologia->val_autocuidado->puntaje_arreglo_pers }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_autocuidado->coment_arreglo_pers)
                        <div class="dato">{{ $fichaKinesiologia->val_autocuidado->coment_arreglo_pers }}</div>
                        @endisset
                    </div>
                    @endif
                    @if(isset($fichaKinesiologia->val_autocuidado->puntaje_bano) || isset($fichaKinesiologia->val_autocuidado->coment_bano))
                    <div class="cuerpo">
                        <div class="dato">Baño</div>
                        @isset($fichaKinesiologia->val_autocuidado->puntaje_bano)
                        <div class="dato">{{ $fichaKinesiologia->val_autocuidado->puntaje_bano }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_autocuidado->coment_bano)
                        <div class="dato">{{ $fichaKinesiologia->val_autocuidado->coment_bano }}</div>
                        @endisset
                    </div>
                    @endif
                    @if(isset($fichaKinesiologia->val_autocuidado->puntaje_vest_sup) || isset($fichaKinesiologia->val_autocuidado->coment_vest_sup))
                    <div class="cuerpo">
                        <div class="dato">Vestuario Superior</div>
                        @isset($fichaKinesiologia->val_autocuidado->puntaje_vest_sup)
                        <div class="dato">{{ $fichaKinesiologia->val_autocuidado->puntaje_vest_sup }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_autocuidado->coment_vest_sup)
                        <div class="dato">{{ $fichaKinesiologia->val_autocuidado->coment_vest_sup }}</div>
                        @endisset
                    </div>
                    @endif
                    @if(isset($fichaKinesiologia->val_autocuidado->puntaje_vest_inf) || isset($fichaKinesiologia->val_autocuidado->coment_vest_inf))
                    <div class="cuerpo">
                        <div class="dato">Vestuario Inferior</div>
                        @isset($fichaKinesiologia->val_autocuidado->puntaje_vest_inf)
                        <div class="dato">{{ $fichaKinesiologia->val_autocuidado->puntaje_vest_inf }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_autocuidado->coment_vest_inf)
                        <div class="dato">{{ $fichaKinesiologia->val_autocuidado->coment_vest_inf }}</div>
                        @endisset
                    </div>
                    @endif
                    @if(isset($fichaKinesiologia->val_autocuidado->puntaje_aseo_pers) || isset($fichaKinesiologia->val_autocuidado->coment_aseo_pers))
                    <div class="cuerpo">
                        <div class="dato">Aseo Personal</div>
                        @isset($fichaKinesiologia->val_autocuidado->puntaje_aseo_pers)
                        <div class="dato">{{ $fichaKinesiologia->val_autocuidado->puntaje_aseo_pers }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_autocuidado->coment_aseo_pers)
                        <div class="dato">{{ $fichaKinesiologia->val_autocuidado->coment_aseo_pers }}</div>
                        @endisset
                    </div>
                    @endif
                    <div class="especial">
                        <div class="encabezado">
                            CONTROL DE ESFÍNTERES
                        </div>
                    </div>
                    <div class="cuerpo">
                        <div class="dato">Control de Vejiga</div>
                        @isset($fichaKinesiologia->val_control_esfinter->puntaje_control_vejiga)
                        <div class="dato">{{ $fichaKinesiologia->val_control_esfinter->puntaje_control_vejiga }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_control_esfinter->coment_control_vejiga)
                        <div class="dato">{{ $fichaKinesiologia->val_control_esfinter->coment_control_vejiga }}</div>
                        @endisset
                    </div>
                    <div class="cuerpo">
                        <div class="dato">Control de Intestino</div>
                        @isset($fichaKinesiologia->val_control_esfinter->puntaje_control_intestino)
                        <div class="dato">{{ $fichaKinesiologia->val_control_esfinter->puntaje_control_intestino }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_control_esfinter->coment_control_intestino)
                        <div class="dato">{{ $fichaKinesiologia->val_control_esfinter->coment_control_intestino }}</div>
                        @endisset
                    </div>

                    <div class="cabecera">
                        <div class="especial">
                            MOVILIDAD
                        </div>
                    </div>
                    <div class="cuerpo">
                        <div class="dato">Transferencia cama-silla</div>
                        @isset( $fichaKinesiologia->val_movilidad->puntaje_trans_cama_silla)
                        <div class="dato">{{ $fichaKinesiologia->val_movilidad->puntaje_trans_cama_silla }}</div>
                        @endisset
                        @isset( $fichaKinesiologia->val_movilidad->coment_trans_cama_silla)
                        <div class="dato">{{ $fichaKinesiologia->val_movilidad->coment_trans_cama_silla }}</div>
                        @endisset
                    </div>
                    <div class="cuerpo">
                        <div class="dato">Traslado baño</div>
                        @isset( $fichaKinesiologia->val_movilidad->puntaje_traslado_bano)
                        <div class="dato">{{ $fichaKinesiologia->val_movilidad->puntaje_traslado_bano }}</div>
                        @endisset
                        @isset( $fichaKinesiologia->val_movilidad->coment_traslado_bano)
                        <div class="dato">{{ $fichaKinesiologia->val_movilidad->coment_traslado_bano }}</div>
                        @endisset
                    </div>
                    <div class="cuerpo">
                        <div class="dato">Traslado ducha</div>
                        @isset( $fichaKinesiologia->val_movilidad->puntaje_traslado_ducha)
                        <div class="dato">{{ $fichaKinesiologia->val_movilidad->puntaje_traslado_ducha }}</div>
                        @endisset
                        @isset( $fichaKinesiologia->val_movilidad->coment_traslado_ducha)
                        <div class="dato">{{ $fichaKinesiologia->val_movilidad->coment_traslado_ducha }}</div>
                        @endisset
                    </div>
                    <div class="cabecera">
                        <div class="encabezado">
                            DEAMBULACIÓN
                        </div>
                    </div>
                    <div class="cuerpo">
                        <div class="dato">Desplazarse caminando/sr</div>
                        @isset($fichaKinesiologia->val_deambulacion->puntaje_desp_caminando)
                        <div class="dato">{{ $fichaKinesiologia->val_deambulacion->puntaje_desp_caminando }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_deambulacion->coment_desp_caminando)
                        <div class="dato">{{ $fichaKinesiologia->val_deambulacion->coment_desp_caminando }}</div>
                        @endisset
                    </div>
                    <div class="cuerpo">
                        <div class="dato">Subir y bajar escaleras</div>
                        @isset($fichaKinesiologia->val_deambulacion->puntaje_escaleras)
                        <div class="dato">{{ $fichaKinesiologia->val_deambulacion->puntaje_escaleras }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_deambulacion->coment_escaleras)
                        <div class="dato">{{ $fichaKinesiologia->val_deambulacion->coment_escaleras }}</div>
                        @endisset
                    </div>
                    <div class="cabecera">
                        <div class="encabezado">
                            COMUNICACIÓN/COGNITIVO
                        </div>
                    </div>
                    <div class="cuerpo">
                        <div class="dato">Expresión</div>
                        @isset($fichaKinesiologia->val_com_cog->puntaje_expresion)
                        <div class="dato">{{ $fichaKinesiologia->val_com_cog->puntaje_expresion }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_com_cog->coment_expresion)
                        <div class="dato">{{ $fichaKinesiologia->val_com_cog->coment_expresion }}</div>
                        @endisset
                    </div>
                    <div class="cuerpo">
                        <div class="dato">Comprensión</div>
                        @isset($fichaKinesiologia->val_com_cog->puntaje_comprension)
                        <div class="dato">{{ $fichaKinesiologia->val_com_cog->puntaje_comprension }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_com_cog->coment_comprension)
                        <div class="dato">{{ $fichaKinesiologia->val_com_cog->coment_comprension }}</div>
                        @endisset
                    </div>
                    <div class="cabecera">
                        <div class="encabezado">
                            SOCIAL
                        </div>
                    </div>
                    <div class="cuerpo">
                        <div class="dato">Interacción social</div>
                        @isset($fichaKinesiologia->val_social->puntaje_int_social)
                        <div class="dato">{{ $fichaKinesiologia->val_social->puntaje_int_social }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_social->coment_int_social)
                        <div class="dato">{{ $fichaKinesiologia->val_social->coment_int_social }}</div>
                        @endisset
                    </div>
                    <div class="cuerpo">
                        <div class="dato">Solución de problemas</div>
                        @isset($fichaKinesiologia->val_social->puntaje_sol_problemas)
                        <div class="dato">{{ $fichaKinesiologia->val_social->puntaje_sol_problemas }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_social->coment_sol_problemas)
                        <div class="dato">{{ $fichaKinesiologia->val_social->coment_sol_problemas }}</div>
                        @endisset
                    </div>
                    <div class="cuerpo">
                        <div class="dato">Memoria</div>
                        @isset($fichaKinesiologia->val_social->puntaje_memoria)
                        <div class="dato">{{ $fichaKinesiologia->val_social->puntaje_memoria }}</div>
                        @endisset
                        @isset($fichaKinesiologia->val_social->coment_memoria)
                        <div class="dato">{{ $fichaKinesiologia->val_social->coment_memoria }}</div>
                        @endisset
                    </div>
                </div>   
            </div>                         
                        
            <div class="evaluacion_general">
                <span class="pd_title">Evaluación General</span>
                
                <div class="pd_info-group">
                    <span class="pd_subtitle">Conexión con el medio</span>
                    @isset($fichaKinesiologia->val_evaluacion->conexion_medio)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_evaluacion->conexion_medio }}</span>
                    @endisset
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Nivel cognitivo aparente</span>
                    @isset($fichaKinesiologia->val_evaluacion->nivel_cognitivo_apar)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_evaluacion->nivel_cognitivo_apar }}</span>
                    @endisset
                </div>
            </div>

            <div class="evaluacion_sensorial">
                <span class="pd_title">Evaluación Sensorial</span>
                
                <div class="pd_info-group">
                    <span class="pd_subtitle">Visual</span>
                    @isset($fichaKinesiologia->val_sensorial->visual)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_sensorial->visual }}</span>
                    @endisset
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Auditivo</span>
                    @isset($fichaKinesiologia->val_sensorial->auditivo)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_sensorial->auditivo }}</span>
                    @endisset
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Táctil</span>
                    @isset($fichaKinesiologia->val_sensorial->tactil)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_sensorial->tactil }}</span>
                    @endisset
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Propioceptivo</span>
                    @isset($fichaKinesiologia->val_sensorial->propioceptivo)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_sensorial->propioceptivo }}</span>
                    @endisset
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Vestibular</span>
                    @isset($fichaKinesiologia->val_sensorial->vestibular)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_sensorial->vestibular }}</span>
                    @endisset
                </div>
            </div>

            <div class="evaluacion_motora">
                <span class="pd_title">Evaluación Motora</span>
                
                <div class="pd_info-group">
                    <span class="pd_subtitle">Tono</span>
                    @isset($fichaKinesiologia->val_motora->tono)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_motora->tono }}</span>
                    @endisset
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">ROM</span>
                    @isset($fichaKinesiologia->val_motora->rom)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_motora->rom }}</span>
                    @endisset
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Dolor</span>
                    @isset($fichaKinesiologia->val_motora->dolor)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_motora->dolor }}</span>
                    @endisset
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Fuerza Muscular</span>
                    @isset($fichaKinesiologia->val_motora->fm)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_motora->fm }}</span>
                    @endisset
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Habilidades Motrices</span>
                    @isset($fichaKinesiologia->val_motora->hab_motrices)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_motora->hab_motrices }}</span>
                    @endisset
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Coordinación</span>
                    @isset($fichaKinesiologia->val_motora->coordinacion)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_motora->coordinacion }}</span>
                    @endisset
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Equilibrio</span>
                    @isset($fichaKinesiologia->val_motora->equilibrio)
                    <span class="pd_valor">{{ $fichaKinesiologia->val_motora->equilibrio }}</span>
                    @endisset
                </div>                   
            </div>
        </div>
    </body>
</html>
