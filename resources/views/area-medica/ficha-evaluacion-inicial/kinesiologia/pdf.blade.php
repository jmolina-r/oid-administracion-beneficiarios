<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <link href="{{ asset('/assets/stylesheets/bootstrap/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />

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
            }

            td{
                color: #7C7C7C;
            }
        </style>
    </head>
    <body>
        <div class="panel-izquierdo">

            <div class="logo">
                <img src="../../../../images/logo.png" alt="">
            </div>

            <div class="nombre">
                <h1>{{ $persona->nombre }} {{$persona->apellido }}</h1>
            </div>

            <div class="rut">
                <h2>{{ $persona->rut }}</h2>
            </div>

            <!-- TRATANTE-->
            <div class="info-basica">

                <span class="title">Tratante</span>

                <div class="info-group">
                    <span class="label">Médico Tratante: </span>
                    <h3>{{ $funcionario->nombre }} {{ $funcionario->apellido }}</h3>
                </div>

            </div>

            <!-- INFORMACION BASICA-->
            <div class="info-basica">

                <span class="title">Información Básica</span>

                <div class="info-group">
                    <span class="label">Género: </span>
                    <h3>{{ $persona->sexo }}</h3>                    
                </div>

                <div class="info-group">
                    <span class="label">Fecha de Nacimiento: </span>
                    <h3>{{ date('d/m/Y', strtotime($persona->fecha_nacimiento)) }}</h3>
                </div>

                <div class="info-group">
                    <span class="label">País: </span>
                    <h3>{{ $persona->pais->nombre }}</h3>
                </div>

                <div class="info-group">
                    <span class="label">Situación Civil: </span>
                    <h3>{{ $persona->estado_civil->nombre }}</h3>
                </div>

            </div>

            <!-- INFORMACION DE CONTACTO-->
            <div class="info-contacto">
                <span class="title">Contacto</span>

                <!-- Domicilio -->
                @isset($persona->domicilio->calle)
                <div class="info-group">
                    <span class="label">Domicilio: </span><br>
                    <h3>
                        {{$persona->domicilio->calle}}

                        @isset($persona->domicilio->numero)
                            {{$persona->domicilio->numero}}
                        @endisset
                        @isset($persona->domicilio->numero_depto)
                            , dpto. {{$persona->domicilio->numero_depto}}
                        @endisset
                        @isset($persona->domicilio->bloque)
                            , block {{$persona->domicilio->bloque}}
                        @endisset
                        @isset($persona->domicilio->pobl_vill)
                            , población {{$persona->domicilio->pobl_vill}}
                        @endisset
                    </h3>
                </div>
                @endisset

                <!-- Telefonos -->
                @if(@isset($persona->telefonos))
                <div class="info-group">
                    @isset($persona->telefonos)
                        @foreach ($persona->telefonos as $telefono)
                            <span class="label">{{ $telefono->tipo == "fijo" ? "Teléfono Fijo: " : "Teléfono Móvil: " }}</span><br>
                            <h3>{{ $telefono->tipo == "fijo" ? "+56" : "+56 9" }} {{$telefono->numero}}</h3><br>
                        @endforeach
                    @endisset
                </div>
                @endif

                <!-- E-mail -->
                @isset($persona->email)
                <div class="info-group">
                    <span class="label">E-mail: </span><br>
                    <h3>{{$persona->email}}</h3>
                </div>
                @endisset
            </div>
        </div>

        <div class="panel-derecho">

            <div class="ant_morbidos">
                <span class="pd_title">Antecedentes Mórbidos</span>
                
                <div class="pd_info-group">
                    <span class="pd_subtitle">Patologías Concomitantes</span>
                    <span class="pd_valor">{{ $antecedentesMorbidos->pat_concom }}</span>
                </div>
                <div class="pd_info-group">
                    <span class="pd_subtitle">Alergias</span>
                    <span class="pd_valor">{{ $antecedentesMorbidos->alergias }}</span>
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Medicamentos</span>
                    <span class="pd_valor">{{ $antecedentesMorbidos->medicamentos }}</span>
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Antecedentes Quirúrgicos</span>
                    <span class="pd_valor">{{ $antecedentesMorbidos->ant_quir }}</span>
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Aparatos</span>
                    <span class="pd_valor">{{ $antecedentesMorbidos->aparatos }}</span>
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">¿Fuma?</span>
                    <span class="pd_valor">{{ $antecedentesMorbidos->fuma_sn }}</span>
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">¿Bebe OH?</span>
                    <span class="pd_valor">{{ $antecedentesMorbidos->alcohol_sn }}</span>
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Actividad Física</span>
                    <span class="pd_valor">{{ $antecedentesMorbidos->act_fisica_sn }}</span>
                </div>

            </div>

            <div class="otros_antecedentes">
                <span class="pd_title">Otros Antecedentes</span>
                
                <div class="pd_info-group">
                    <span class="pd_subtitle">Situación Familiar</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->situacion_familiar }}</span>
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Situación Laboral</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->situacion_laboral }}</span>
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">¿Asisten a algún centro de RHB?</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->asiste_centro_rhb }}</span>
                </div>

                <div class="pd_info-group">
                    <span class="pd_subtitle">Motivo de consulta</span>
                    <span class="pd_valor">{{ $fichaKinesiologia->motivo_consulta }}</span>
                </div>
            </div>

            <div class="ant_morbidos">
                <span class="pd_title">Escala de Valoración Funcional</span>

                <table class='table' style='margin-bottom:0;'>
                    <thead>
                        <tr>
                            <th>
                                CATEGORÍA
                            </th>
                            <th>
                                PUNTAJE
                            </th>
                            <th>
                                COMENTARIOS
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="pd_subtitle">AUTOCUIDADO</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Alimentación</td>
                            <td>{{ $valAutocuidado->puntaje_alimentacion }}</td>
                            <td>{{ $valAutocuidado->coment_alimentacion }}</td>
                        </tr>

                        <tr>
                            <td>Arreglo Personal</td>
                            <td>{{ $valAutocuidado->puntaje_arreglo_pers }}</td>
                            <td>{{ $valAutocuidado->coment_arreglo_pers }}</td>
                        </tr>

                        <tr>
                            <td>Baño</td>
                            <td>{{ $valAutocuidado->puntaje_bano }}</td>
                            <td>{{ $valAutocuidado->coment_bano }}</td>
                        </tr>

                        <tr>
                            <td>Vestuario Superior</td>
                            <td>{{ $valAutocuidado->puntaje_vest_sup }}</td>
                            <td>{{ $valAutocuidado->coment_vest_sup }}</td>
                        </tr>

                        <tr>
                            <td>Vestuario Inferior</td>
                            <td>{{ $valAutocuidado->puntaje_vest_inf }}</td>
                            <td>{{ $valAutocuidado->coment_vest_inf }}</td>
                        </tr>

                        <tr>
                            <td>Aseo Personal</td>
                            <td>{{ $valAutocuidado->puntaje_aseo_pers }}</td>
                            <td>{{ $valAutocuidado->coment_aseo_pers }}</td>
                        </tr>

                        <tr>
                            <td class="pd_subtitle">Control de Esfínteres</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Control de Vejiga</td>
                            <td>{{ $valControlEsfinter->puntaje_contro_vejiga }}</td>
                            <td>{{ $valControlEsfinter->coment_control_vejiga }}</td>
                        </tr>

                        <tr>
                            <td>Control de Instestino</td>
                            <td>{{ $valControlEsfinter->puntaje_control_intestino }}</td>
                            <td>{{ $valControlEsfinter->coment_control_intestino }}</td>
                        </tr>

                        <tr>
                            <td class="pd_subtitle">Movilidad</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Transferencia cama-silla</td>
                            <td>{{ $valMovilidad->puntaje_trans_cama_silla }}</td>
                            <td>{{ $valMovilidad->coment_trans_cama_silla }}</td>
                        </tr>

                        <tr>
                            <td>Traslado baño</td>
                            <td>{{ $valMovilidad->puntaje_traslado_bano }}</td>
                            <td>{{ $valMovilidad->coment_traslado_bano }}</td>
                        </tr>

                        <tr>
                            <td>Traslado ducha</td>
                            <td>{{ $valMovilidad->puntaje_traslado_ducha }}</td>
                            <td>{{ $valMovilidad->coment_traslado_ducha }}</td>
                        </tr>

                        <tr>
                            <td class="pd_subtitle">Deambulación</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Desplazarse caminando/sr</td>
                            <td>{{ $valDeambulacion->puntaje_desp_caminando }}</td>
                            <td>{{ $valDeambulacion->coment_desp_caminando }}</td>
                        </tr>

                        <tr>
                            <td>Subir y bajar escaleras</td>
                            <td>{{ $valDeambulacion->puntaje_escaleras }}</td>
                            <td>{{ $valDeambulacion->coment_escaleras }}</td>
                        </tr>

                        <tr>
                            <td class="pd_subtitle">Comunicación/Cognitivo</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Expresión</td>
                            <td>{{ $valComCog->puntaje_expresion }}</td>
                            <td>{{ $valComCog->coment_expresion }}</td>
                        </tr>

                        <tr>
                            <td>Comprensión</td>
                            <td>{{ $valComCog->puntaje_comprension }}</td>
                            <td>{{ $valComCog->coment_comprension }}</td>
                        </tr>

                        <tr>
                            <td class="pd_subtitle">Social</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Interacción social</td>
                            <td>{{ $valSocial->puntaje_int_social }}</td>
                            <td>{{ $valSocial->coment_int_social }}</td>
                        </tr>

                        <tr>
                            <td>Solución de problemas</td>
                            <td>{{ $valSocial->puntaje_sol_problemas }}</td>
                            <td>{{ $valSocial->coment_sol_problemas }}</td>
                        </tr>

                        <tr>
                            <td>Memoria</td>
                            <td>{{ $valSocial->puntaje_memoria }}</td>
                            <td>{{ $valSocial->coment_memoria }}</td>
                        </tr>
                        
                    </tbody>
                </table>

                <div class="evaluacion">
                    <span class="pd_title">Evaluación General</span>
                    
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Conexión con el medio</span>
                        <span class="pd_valor">{{ $valEvaluacion->conexion_medio }}</span>
                    </div>

                    <div class="pd_info-group">
                        <span class="pd_subtitle">Nivel cognitivo aparente</span>
                        <span class="pd_valor">{{ $valEvaluacion->nivel_cognitivo_apar }}</span>
                    </div>
                   
                </div>

                <div class="evaluacion">
                    <span class="pd_title">Evaluación Sensorial</span>
                    
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Visual</span>
                        <span class="pd_valor">{{ $valSensorial->visual }}</span>
                    </div>

                    <div class="pd_info-group">
                        <span class="pd_subtitle">Auditivo</span>
                        <span class="pd_valor">{{ $valSensorial->auditivo }}</span>
                    </div>

                    <div class="pd_info-group">
                        <span class="pd_subtitle">Táctil</span>
                        <span class="pd_valor">{{ $valSensorial->tactil }}</span>
                    </div>

                    <div class="pd_info-group">
                        <span class="pd_subtitle">Propioceptivo</span>
                        <span class="pd_valor">{{ $valSensorial->propioceptivo }}</span>
                    </div>

                    <div class="pd_info-group">
                        <span class="pd_subtitle">Vestibular</span>
                        <span class="pd_valor">{{ $valSensorial->vestibular }}</span>
                    </div>
                   
                </div>

                <div class="evaluacion">
                    <span class="pd_title">Evaluación Motora</span>
                    
                    <div class="pd_info-group">
                        <span class="pd_subtitle">Tono</span>
                        <span class="pd_valor">{{ $valMotora->tono }}</span>
                    </div>

                    <div class="pd_info-group">
                        <span class="pd_subtitle">ROM</span>
                        <span class="pd_valor">{{ $valMotora->rom }}</span>
                    </div>

                    <div class="pd_info-group">
                        <span class="pd_subtitle">Dolor</span>
                        <span class="pd_valor">{{ $valMotora->dolor }}</span>
                    </div>

                    <div class="pd_info-group">
                        <span class="pd_subtitle">Fuerza Muscular</span>
                        <span class="pd_valor">{{ $valMotora->fm }}</span>
                    </div>

                    <div class="pd_info-group">
                        <span class="pd_subtitle">Habilidades Motrices</span>
                        <span class="pd_valor">{{ $valMotora->hab_motrices }}</span>
                    </div>

                    <div class="pd_info-group">
                        <span class="pd_subtitle">Coordinación</span>
                        <span class="pd_valor">{{ $valMotora->coordinacion }}</span>
                    </div>

                    <div class="pd_info-group">
                        <span class="pd_subtitle">Equilibrio</span>
                        <span class="pd_valor">{{ $valMotora->equilibrio }}</span>
                    </div>
                   
                </div>

            </div>
        </div>
    </body>
</html>
