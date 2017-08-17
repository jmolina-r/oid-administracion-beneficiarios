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
        <h1>{{ $fichaTerapiaOcupacional->beneficiario->nombre }} {{$fichaTerapiaOcupacional->beneficiario->apellido }}</h1>
    </div>

    <div class="rut">
        <h2>{{ $fichaTerapiaOcupacional->beneficiario->rut }}</h2>
    </div>

    <!-- TRATANTE-->
    <div class="info-basica">

        <span class="title">Tratante</span>

        <div class="info-group">
            <span class="label">Médico Tratante: </span>
            <h3>{{ $fichaTerapiaOcupacional->funcionario->nombre }} {{ $fichaTerapiaOcupacional->funcionario->apellido }}</h3>
        </div>

    </div>

    <!-- INFORMACION BASICA-->
    <div class="info-basica">

        <span class="title">Información Básica</span>

        <div class="info-group">
            <span class="label">Género: </span>
            <h3>{{ $fichaTerapiaOcupacional->beneficiario->sexo }}</h3>
        </div>

        <div class="info-group">
            <span class="label">Fecha de Nacimiento: </span>
            <h3>{{ date('d/m/Y', strtotime($fichaTerapiaOcupacional->beneficiario->fecha_nacimiento)) }}</h3>
        </div>

        <div class="info-group">
            <span class="label">País: </span>
            <h3>{{ $fichaTerapiaOcupacional->beneficiario->pais->nombre }}</h3>
        </div>

        <div class="info-group">
            <span class="label">Situación Civil: </span>
            <h3>{{ $fichaTerapiaOcupacional->beneficiario->estado_civil->nombre }}</h3>
        </div>

    </div>

    <!-- INFORMACION DE CONTACTO-->
    <div class="info-contacto">
        <span class="title">Contacto</span>

        <!-- Domicilio -->
        @isset($fichaTerapiaOcupacional->beneficiario->domicilio->calle)
        <div class="info-group">
            <span class="label">Domicilio: </span><br>
            <h3>
                {{$fichaTerapiaOcupacional->beneficiario->domicilio->calle}}

                @isset($fichaTerapiaOcupacional->beneficiario->domicilio->numero)
                {{$fichaTerapiaOcupacional->beneficiario->domicilio->numero}}
                @endisset
                @isset($fichaTerapiaOcupacional->beneficiario->domicilio->numero_depto)
                , dpto. {{$fichaTerapiaOcupacional->beneficiario->domicilio->numero_depto}}
                @endisset
                @isset($fichaTerapiaOcupacional->beneficiario->domicilio->bloque)
                , block {{$fichaTerapiaOcupacional->beneficiario->domicilio->bloque}}
                @endisset
                @isset($fichaTerapiaOcupacional->beneficiario->domicilio->pobl_vill)
                , población {{$fichaTerapiaOcupacional->beneficiario->domicilio->pobl_vill}}
                @endisset
            </h3>
        </div>
        @endisset

    <!-- Telefonos -->
        @if(@isset($fichaTerapiaOcupacional->beneficiario->telefonos))
            <div class="info-group">
                @isset($fichaTerapiaOcupacional->beneficiario->telefonos)
                @foreach ($fichaTerapiaOcupacional->beneficiario->telefonos as $telefono)
                    <span class="label">{{ $telefono->tipo == "fijo" ? "Teléfono Fijo: " : "Teléfono Móvil: " }}</span><br>
                    <h3>{{ $telefono->tipo == "fijo" ? "+56" : "+56 9" }} {{$telefono->numero}}</h3><br>
                @endforeach
                @endisset
            </div>
        @endif

    <!-- E-mail -->
        @isset($fichaTerapiaOcupacional->beneficiario->email)
        <div class="info-group">
            <span class="label">E-mail: </span><br>
            <h3>{{$fichaTerapiaOcupacional->beneficiario->email}}</h3>
        </div>
        @endisset
    </div>
</div>

<div class="panel-derecho">

    <div class="ant_morbidos">
        <span class="pd_title">Datos ficha</span>
        @isset($fichaTerapiaOcupacional->motivo_consulta)
        <div class="pd_info-group">
            <span class="pd_subtitle">Motivo consulta</span>
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->motivo_consulta }}</span>
        </div>
        @endisset
        @isset($fichaTerapiaOcupacional->derivado_por)
        <div class="pd_info-group">
            <span class="pd_subtitle">Derivado por</span>
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->derivado_por }}</span>
        </div>
        @endisset
        @isset($fichaTerapiaOcupacional->relacion_paciente)
        <div class="pd_info-group">
            <span class="pd_subtitle">Relación con el paciente</span>
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->relacion_paciente }}</span>
        </div>
        @endisset
        @isset($fichaTerapiaOcupacional->observaciones_generales)
        <div class="pd_info-group">
            <span class="pd_subtitle">Observaciones generales</span>
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->observaciones_generales }}</span>
        </div>
        @endisset
    </div>

    <div class="otros_antecedentes">
        <span class="pd_title">Antecedentes Socio-Familiares</span>
        @isset($antecedentesSocioFamiliares->nombre_madre)
        <div class="pd_info-group">
            <span class="pd_subtitle">Nombre de la Madre</span>
            <span class="pd_valor">{{ $antecedentesSocioFamiliares->nombre_madre }}</span>
        </div>
        @endisset
        @isset($antecedentesSocioFamiliares->edad_madre)
        <div class="pd_info-group">
            <span class="pd_subtitle">Edad de la Madre</span>
            <span class="pd_valor">{{ $antecedentesSocioFamiliares->edad_madre }}</span>
        </div>
        @endisset
        @isset($antecedentesSocioFamiliares->ocupacion_madre)
        <div class="pd_info-group">
            <span class="pd_subtitle">Ocupación de la Madre</span>
            <span class="pd_valor">{{ $antecedentesSocioFamiliares->ocupacion_madre }}</span>
        </div>
        @endisset
        @isset($antecedentesSocioFamiliares->escolaridad_madre)
        <div class="pd_info-group">
            <span class="pd_subtitle">Escolaridad Madre</span>
            <span class="pd_valor">{{ $antecedentesSocioFamiliares->escolaridad_madre }}</span>
        </div>
        @endisset
        @isset($antecedentesSocioFamiliares->horario_trabajo_madre)
        <div class="pd_info-group">
            <span class="pd_subtitle">Horario de trabajo Madre</span>
            <span class="pd_valor">{{ $antecedentesSocioFamiliares->horario_trabajo_madre }}</span>
        </div>
        @endisset
        @isset($antecedentesSocioFamiliares->nombre_padre)
        <div class="pd_info-group">
            <span class="pd_subtitle">Nombre del Padre</span>
            <span class="pd_valor">{{ $antecedentesSocioFamiliares->nombre_padre }}</span>
        </div>
        @endisset
        @isset($antecedentesSocioFamiliares->edad_padre)
        <div class="pd_info-group">
            <span class="pd_subtitle">Edad de la Padre</span>
            <span class="pd_valor">{{ $antecedentesSocioFamiliares->edad_padre }}</span>
        </div>
        @endisset
        @isset($antecedentesSocioFamiliares->ocupacion_padre)
        <div class="pd_info-group">
            <span class="pd_subtitle">Ocupación del Padre</span>
            <span class="pd_valor">{{ $antecedentesSocioFamiliares->ocupacion_padre }}</span>
        </div>
        @endisset
        @isset($antecedentesSocioFamiliares->escolaridad_padre)
        <div class="pd_info-group">
            <span class="pd_subtitle">Escolaridad Padre</span>
            <span class="pd_valor">{{ $antecedentesSocioFamiliares->escolaridad_padre }}</span>
        </div>
        @endisset
        @isset($antecedentesSocioFamiliares->horario_trabajo_padre)
        <div class="pd_info-group">
            <span class="pd_subtitle">Horario de trabajo Padre</span>
            <span class="pd_valor">{{ $antecedentesSocioFamiliares->horario_trabajo_padre }}</span>
        </div>
        @endisset
    </div>

    <div class="otros_antecedentes">
        <span class="pd_title">Antecedentes de Salud</span>
        @isset($antecedentesSalud->tiempo_gestacional)
        <div class="pd_info-group">
            <span class="pd_subtitle">Tiempo de gestación</span>
            <span class="pd_valor">{{ $antecedentesSalud->tiempo_gestacional }}</span>
        </div>
        @endisset
        @isset($antecedentesSalud->tipo_parto)
        <div class="pd_info-group">
            <span class="pd_subtitle">Tipo de parto</span>
            <span class="pd_valor">{{ $antecedentesSalud->tipo_parto }}</span>
        </div>
        @endisset
        @isset($antecedentesSalud->enfermedades_natal_sn)
        <div class="pd_info-group">
            <span class="pd_subtitle">¿Presenta enfermedades pre o post natales?</span>
            <span class="pd_valor">{{ $antecedentesSalud->enfermedades_natal_sn }}</span>
        </div>
        @endisset
        @isset($antecedentesSalud->observaciones_enfermedades)
        <div class="pd_info-group">
            <span class="pd_subtitle">Observaciones sobre enfermedades</span>
            <span class="pd_valor">{{ $antecedentesSalud->observaciones_enfermedades }}</span>
        </div>
        @endisset
    </div>

    <div class="otros_antecedentes">
        <span class="pd_title">Historial Clínico</span>
        @isset($historialClinico->enfermedades_familiares)
        <div class="pd_info-group">
            <span class="pd_subtitle">Enfermedades Familiares</span>
            <span class="pd_valor">{{ $historialClinico->enfermedades_familiares  }}</span>
        </div>
        @endisset
        @isset($historialClinico->evaluacion_psiquiatra)
        <div class="pd_info-group">
            <span class="pd_subtitle">Evaluación del Neurólogo/Psiquiatra</span>
            <span class="pd_valor">{{ $historialClinico->evaluacion_psiquiatra  }}</span>
        </div>
        @endisset
        @isset($historialClinico->evaluacion_fonoaudiologo)
        <div class="pd_info-group">
            <span class="pd_subtitle">Evaluación del Fonoaudiólogo</span>
            <span class="pd_valor">{{ $historialClinico->evaluacion_fonoaudiologo  }}</span>
        </div>
        @endisset
        @isset($historialClinico->evaluacion_ocupacional)
        <div class="pd_info-group">
            <span class="pd_subtitle">Evaluación del Terapeuta Ocupacional</span>
            <span class="pd_valor">{{ $historialClinico->evaluacion_ocupacional  }}</span>
        </div>
        @endisset
        @isset($historialClinico->evaluacion_kinesiologo)
        <div class="pd_info-group">
            <span class="pd_subtitle">Evaluación del Kinesiólogo</span>
            <span class="pd_valor">{{ $historialClinico->evaluacion_kinesiologo  }}</span>
        </div>
        @endisset
        @isset($historialClinico->evaluacion_psicologo)
        <div class="pd_info-group">
            <span class="pd_subtitle">Evaluación Psicólogo</span>
            <span class="pd_valor">{{ $historialClinico->evaluacion_psicologo  }}</span>
        </div>
        @endisset
        @isset($historialClinico->otra_evaluacion)
        <div class="pd_info-group">
            <span class="pd_subtitle">Alguna otra evaluación</span>
            <span class="pd_valor">{{ $historialClinico->otra_evaluacion  }}</span>
        </div>
        @endisset
        @isset($historialClinico->tratamientos_recibidos)
        <div class="pd_info-group">
            <span class="pd_subtitle">Tratamientos recibidos</span>
            <span class="pd_valor">{{ $historialClinico->tratamientos_recibidos  }}</span>
        </div>
        @endisset
        @isset($historialClinico->medicamentos_sn)
        <div class="pd_info-group">
            <span class="pd_subtitle">¿Medicamentos?</span>
            <span class="pd_valor">{{ $historialClinico->medicamentos_sn  }}</span>
        </div>
        @endisset
        @isset($historialClinico->medicamentos)
        <div class="pd_info-group">
            <span class="pd_subtitle">Nombres Medicamentos</span>
            <span class="pd_valor">{{ $historialClinico->medicamentos  }}</span>
        </div>
        @endisset
        @isset($historialClinico->efectos_medicamentos)
        <div class="pd_info-group">
            <span class="pd_subtitle">Efectos Medicamentos</span>
            <span class="pd_valor">{{ $historialClinico->efectos_medicamentos  }}</span>
        </div>
        @endisset
        @isset($historialClinico->diagnosticos_previos)
        <div class="pd_info-group">
            <span class="pd_subtitle">Diagnósticos Previos</span>
            <span class="pd_valor">{{ $historialClinico->diagnosticos_previos  }}</span>
        </div>
        @endisset
    </div>

    <div class="otros_antecedentes">
        <span class="pd_title">Desarrollo Evolutivo</span>
        @isset($desarrolloEvolutivo->edad_sento)
        <div class="pd_info-group">
            <span class="pd_subtitle">Edad a la que se sentó solo/a</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->edad_sento  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->edad_camino)
        <div class="pd_info-group">
            <span class="pd_subtitle">Edad en que caminó</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->edad_camino  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->edad_palabra)
        <div class="pd_info-group">
            <span class="pd_subtitle">Edad en que pronunció su primera palabra con sentido</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->edad_palabra  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->control_vesical_sn)
        <div class="pd_info-group">
            <span class="pd_subtitle">¿Tiene control Esfínteres Vesical?</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->control_vesical_sn  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->edad_control_vesical)
        <div class="pd_info-group">
            <span class="pd_subtitle">Edad a la que comenzó a controlar los esfínteres Vesical</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->edad_control_vesical  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->vesical_diurno)
        <div class="pd_info-group">
            <span class="pd_subtitle">Control Vesical Diurno</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->vesical_diurno  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->vesical_nocturno)
        <div class="pd_info-group">
            <span class="pd_subtitle">Control Vesical Nocturno</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->vesical_nocturno  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->control_anal_sn)
        <div class="pd_info-group">
            <span class="pd_subtitle">¿Tiene control Esfínteres Anal?</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->control_anal_sn  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->edad_control_anal)
        <div class="pd_info-group">
            <span class="pd_subtitle">Edad a la que comenzó a controlar los Esfínteres Anal</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->edad_control_anal  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->anal_diurno)
        <div class="pd_info-group">
            <span class="pd_subtitle">Control Anal Diurno</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->anal_diurno  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->anal_nocturno)
        <div class="pd_info-group">
            <span class="pd_subtitle">Control Anal Nocturno</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->anal_nocturno  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->observaciones)
        <div class="pd_info-group">
            <span class="pd_subtitle">Observaciones</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->observaciones  }}</span>
        </div>
        @endisset
        En relación con su motricidad gruesa se aprecia:
        @isset($desarrolloEvolutivo->estabilidad_caminar_sna)
        <div class="pd_info-group">
            <span class="pd_subtitle">Estabilidad al caminar</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->estabilidad_caminar_sna  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->caidas_frecuentes_sna)
        <div class="pd_info-group">
            <span class="pd_subtitle">Caídas Frecuentes</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->caidas_frecuentes_sna  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->dominancia_lateral_sna)
        <div class="pd_info-group">
            <span class="pd_subtitle">Dominancia Lateral</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->dominancia_lateral_sna  }}</span>
        </div>
        @endisset
        En relación con su motricidad fina el niño(a) logra:
        @isset($desarrolloEvolutivo->garra_sna)
        <div class="pd_info-group">
            <span class="pd_subtitle">Garra</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->garra_sna  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->pinza_sna)
        <div class="pd_info-group">
            <span class="pd_subtitle">Pinza</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->pinza_sna  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->como_pinza)
        <div class="pd_info-group">
            <span class="pd_subtitle">¿Cómo logra pinzar?</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->como_pinza  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->dibuja_sna)
        <div class="pd_info-group">
            <span class="pd_subtitle">Dibuja</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->dibuja_sna  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->escribe_sna)
        <div class="pd_info-group">
            <span class="pd_subtitle">Escribe</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->escribe_sna  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->corta_sna)
        <div class="pd_info-group">
            <span class="pd_subtitle">Corta</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->corta_sna  }}</span>
        </div>
        @endisset
        ¿Cómo se comporta frente a?:
        @isset($desarrolloEvolutivo->estimulos_visuales)
        <div class="pd_info-group">
            <span class="pd_subtitle">Estimulos Visuales</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->estimulos_visuales  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->estimulos_auditivos)
        <div class="pd_info-group">
            <span class="pd_subtitle">Estimulos Auditivos</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->estimulos_auditivos  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->estimulos_gustativos)
        <div class="pd_info-group">
            <span class="pd_subtitle">Estimulos Gustativos</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->estimulos_gustativos  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->estimulos_tactiles)
        <div class="pd_info-group">
            <span class="pd_subtitle">Estimulos Táctiles</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->estimulos_tactiles  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->estimulos_olfativos)
        <div class="pd_info-group">
            <span class="pd_subtitle">Estimulos Olfativos</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->estimulos_olfativos  }}</span>
        </div>
        @endisset
        En cuanto a su alimentación:
        @isset($desarrolloEvolutivo->come_solo_sn)
        <div class="pd_info-group">
            <span class="pd_subtitle">¿Come solo?/a</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->come_solo_sn  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->acepta_solido_sn)
        <div class="pd_info-group">
            <span class="pd_subtitle">¿Acepta sólidos?</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->acepta_solido_sn  }}</span>
        </div>
        @endisset
        En relación con su motricidad fina el niño(a) logra:
        @isset($desarrolloEvolutivo->acepta_semisolido_sn)
        <div class="pd_info-group">
            <span class="pd_subtitle">¿Acepta semisólidos?</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->acepta_semisolido_sn  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->acepta_liquidos_sn)
        <div class="pd_info-group">
            <span class="pd_subtitle">¿Acepta líquidos?</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->acepta_liquidos_sn  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->temperatura_preferida)
        <div class="pd_info-group">
            <span class="pd_subtitle">¿Prefiere ciertas temperaturas?</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->temperatura_preferida  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->sabores_preferidos)
        <div class="pd_info-group">
            <span class="pd_subtitle">¿Prefiere ciertos sabores?</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->sabores_preferidos  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->colores_preferidos)
        <div class="pd_info-group">
            <span class="pd_subtitle">¿Prefiere ciertos colores?</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->colores_preferidos  }}</span>
        </div>
        @endisset
        @isset($desarrolloEvolutivo->ejemplo_comida)
        <div class="pd_info-group">
            <span class="pd_subtitle">Ejemplos de lo que come</span>
            <span class="pd_valor">{{ $desarrolloEvolutivo->ejemplo_comida  }}</span>
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
            @if(isset($fichaTerapiaOcupacional->val_autocuidado->puntaje_alimentacion) || isset($fichaTerapiaOcupacional->val_autocuidado->coment_alimentacion))
                <div class="cuerpo">
                    <div class="dato">Alimentación</div>
                    @isset($fichaTerapiaOcupacional->val_autocuidado->puntaje_alimentacion)
                    <div class="dato">{{ $fichaTerapiaOcupacional->val_autocuidado->puntaje_alimentacion }}</div>
                    @endisset
                    @isset($fichaTerapiaOcupacional->val_autocuidado->coment_alimentacion)
                    <div class="dato">{{ $fichaTerapiaOcupacional->val_autocuidado->coment_alimentacion }}</div>
                    @endisset
                </div>
            @endif
            @if(isset($fichaTerapiaOcupacional->val_autocuidado->puntaje_arreglo_pers) || isset($fichaTerapiaOcupacional->val_autocuidado->coment_arreglo_pers))
                <div class="cuerpo">
                    <div class="dato">Arreglo Personal</div>
                    <div class="dato">
                        @isset($fichaTerapiaOcupacional->val_autocuidado->puntaje_arreglo_pers)
                        {{ $fichaTerapiaOcupacional->val_autocuidado->puntaje_arreglo_pers }}
                        @endisset
                    </div>
                    <div class="dato">
                        @isset($fichaTerapiaOcupacional->val_autocuidado->coment_arreglo_pers)
                        {{ $fichaTerapiaOcupacional->val_autocuidado->coment_arreglo_pers }}
                        @endisset
                    </div>
                </div>
            @endif
            @if(isset($fichaTerapiaOcupacional->val_autocuidado->puntaje_bano) || isset($fichaTerapiaOcupacional->val_autocuidado->coment_bano))
                <div class="cuerpo">
                    <div class="dato">Baño</div>
                    @isset($fichaTerapiaOcupacional->val_autocuidado->puntaje_bano)
                    <div class="dato">{{ $fichaTerapiaOcupacional->val_autocuidado->puntaje_bano }}</div>
                    @endisset
                    @isset($fichaTerapiaOcupacional->val_autocuidado->coment_bano)
                    <div class="dato">{{ $fichaTerapiaOcupacional->val_autocuidado->coment_bano }}</div>
                    @endisset
                </div>
            @endif
            @if(isset($fichaTerapiaOcupacional->val_autocuidado->puntaje_vest_sup) || isset($fichaTerapiaOcupacional->val_autocuidado->coment_vest_sup))
                <div class="cuerpo">
                    <div class="dato">Vestuario Superior</div>
                    @isset($fichaTerapiaOcupacional->val_autocuidado->puntaje_vest_sup)
                    <div class="dato">{{ $fichaTerapiaOcupacional->val_autocuidado->puntaje_vest_sup }}</div>
                    @endisset
                    @isset($fichaTerapiaOcupacional->val_autocuidado->coment_vest_sup)
                    <div class="dato">{{ $fichaTerapiaOcupacional->val_autocuidado->coment_vest_sup }}</div>
                    @endisset
                </div>
            @endif
            @if(isset($fichaTerapiaOcupacional->val_autocuidado->puntaje_vest_inf) || isset($fichaTerapiaOcupacional->val_autocuidado->coment_vest_inf))
                <div class="cuerpo">
                    <div class="dato">Vestuario Inferior</div>
                    @isset($fichaTerapiaOcupacional->val_autocuidado->puntaje_vest_inf)
                    <div class="dato">{{ $fichaTerapiaOcupacional->val_autocuidado->puntaje_vest_inf }}</div>
                    @endisset
                    @isset($fichaTerapiaOcupacional->val_autocuidado->coment_vest_inf)
                    <div class="dato">{{ $fichaTerapiaOcupacional->val_autocuidado->coment_vest_inf }}</div>
                    @endisset
                </div>
            @endif
            @if(isset($fichaTerapiaOcupacional->val_autocuidado->puntaje_aseo_pers) || isset($fichaTerapiaOcupacional->val_autocuidado->coment_aseo_pers))
                <div class="cuerpo">
                    <div class="dato">Aseo Personal</div>
                    @isset($fichaTerapiaOcupacional->val_autocuidado->puntaje_aseo_pers)
                    <div class="dato">{{ $fichaTerapiaOcupacional->val_autocuidado->puntaje_aseo_pers }}</div>
                    @endisset
                    @isset($fichaTerapiaOcupacional->val_autocuidado->coment_aseo_pers)
                    <div class="dato">{{ $fichaTerapiaOcupacional->val_autocuidado->coment_aseo_pers }}</div>
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
                @isset($fichaTerapiaOcupacional->val_control_esfinter->puntaje_control_vejiga)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_control_esfinter->puntaje_control_vejiga }}</div>
                @endisset
                @isset($fichaTerapiaOcupacional->val_control_esfinter->coment_control_vejiga)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_control_esfinter->coment_control_vejiga }}</div>
                @endisset
            </div>
            <div class="cuerpo">
                <div class="dato">Control de Intestino</div>
                @isset($fichaTerapiaOcupacional->val_control_esfinter->puntaje_control_intestino)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_control_esfinter->puntaje_control_intestino }}</div>
                @endisset
                @isset($fichaTerapiaOcupacional->val_control_esfinter->coment_control_intestino)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_control_esfinter->coment_control_intestino }}</div>
                @endisset
            </div>

            <div class="cabecera">
                <div class="especial">
                    MOVILIDAD
                </div>
            </div>
            <div class="cuerpo">
                <div class="dato">Transferencia cama-silla</div>
                @isset( $fichaTerapiaOcupacional->val_movilidad->puntaje_trans_cama_silla)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_movilidad->puntaje_trans_cama_silla }}</div>
                @endisset
                @isset( $fichaTerapiaOcupacional->val_movilidad->coment_trans_cama_silla)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_movilidad->coment_trans_cama_silla }}</div>
                @endisset
            </div>
            <div class="cuerpo">
                <div class="dato">Traslado baño</div>
                @isset( $fichaTerapiaOcupacional->val_movilidad->puntaje_traslado_bano)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_movilidad->puntaje_traslado_bano }}</div>
                @endisset
                @isset( $fichaTerapiaOcupacional->val_movilidad->coment_traslado_bano)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_movilidad->coment_traslado_bano }}</div>
                @endisset
            </div>
            <div class="cuerpo">
                <div class="dato">Traslado ducha</div>
                @isset( $fichaTerapiaOcupacional->val_movilidad->puntaje_traslado_ducha)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_movilidad->puntaje_traslado_ducha }}</div>
                @endisset
                @isset( $fichaTerapiaOcupacional->val_movilidad->coment_traslado_ducha)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_movilidad->coment_traslado_ducha }}</div>
                @endisset
            </div>
            <div class="cabecera">
                <div class="encabezado">
                    DEAMBULACIÓN
                </div>
            </div>
            <div class="cuerpo">
                <div class="dato">Desplazarse caminando/sr</div>
                @isset($fichaTerapiaOcupacional->val_deambulacion->puntaje_desp_caminando)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_deambulacion->puntaje_desp_caminando }}</div>
                @endisset
                @isset($fichaTerapiaOcupacional->val_deambulacion->coment_desp_caminando)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_deambulacion->coment_desp_caminando }}</div>
                @endisset
            </div>
            <div class="cuerpo">
                <div class="dato">Subir y bajar escaleras</div>
                @isset($fichaTerapiaOcupacional->val_deambulacion->puntaje_escaleras)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_deambulacion->puntaje_escaleras }}</div>
                @endisset
                @isset($fichaTerapiaOcupacional->val_deambulacion->coment_escaleras)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_deambulacion->coment_escaleras }}</div>
                @endisset
            </div>
            <div class="cabecera">
                <div class="encabezado">
                    COMUNICACIÓN/COGNITIVO
                </div>
            </div>
            <div class="cuerpo">
                <div class="dato">Expresión</div>
                @isset($fichaTerapiaOcupacional->val_com_cog->puntaje_expresion)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_com_cog->puntaje_expresion }}</div>
                @endisset
                @isset($fichaTerapiaOcupacional->val_com_cog->coment_expresion)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_com_cog->coment_expresion }}</div>
                @endisset
            </div>
            <div class="cuerpo">
                <div class="dato">Comprensión</div>
                @isset($fichaTerapiaOcupacional->val_com_cog->puntaje_comprension)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_com_cog->puntaje_comprension }}</div>
                @endisset
                @isset($fichaTerapiaOcupacional->val_com_cog->coment_comprension)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_com_cog->coment_comprension }}</div>
                @endisset
            </div>
            <div class="cabecera">
                <div class="encabezado">
                    SOCIAL
                </div>
            </div>
            <div class="cuerpo">
                <div class="dato">Interacción social</div>
                @isset($fichaTerapiaOcupacional->val_social->puntaje_int_social)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_social->puntaje_int_social }}</div>
                @endisset
                @isset($fichaTerapiaOcupacional->val_social->coment_int_social)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_social->coment_int_social }}</div>
                @endisset
            </div>
            <div class="cuerpo">
                <div class="dato">Solución de problemas</div>
                @isset($fichaTerapiaOcupacional->val_social->puntaje_sol_problemas)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_social->puntaje_sol_problemas }}</div>
                @endisset
                @isset($fichaTerapiaOcupacional->val_social->coment_sol_problemas)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_social->coment_sol_problemas }}</div>
                @endisset
            </div>
            <div class="cuerpo">
                <div class="dato">Memoria</div>
                @isset($fichaTerapiaOcupacional->val_social->puntaje_memoria)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_social->puntaje_memoria }}</div>
                @endisset
                @isset($fichaTerapiaOcupacional->val_social->coment_memoria)
                <div class="dato">{{ $fichaTerapiaOcupacional->val_social->coment_memoria }}</div>
                @endisset
            </div>
        </div>
    </div>

    <div class="evaluacion_general">
        <span class="pd_title">Evaluación General</span>

        <div class="pd_info-group">
            <span class="pd_subtitle">Conexión con el medio</span>
            @isset($fichaTerapiaOcupacional->val_evaluacion->conexion_medio)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_evaluacion->conexion_medio }}</span>
            @endisset
        </div>

        <div class="pd_info-group">
            <span class="pd_subtitle">Nivel cognitivo aparente</span>
            @isset($fichaTerapiaOcupacional->val_evaluacion->nivel_cognitivo_apar)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_evaluacion->nivel_cognitivo_apar }}</span>
            @endisset
        </div>
    </div>

    <div class="evaluacion_sensorial">
        <span class="pd_title">Evaluación Sensorial</span>

        <div class="pd_info-group">
            <span class="pd_subtitle">Visual</span>
            @isset($fichaTerapiaOcupacional->val_sensorial->visual)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_sensorial->visual }}</span>
            @endisset
        </div>

        <div class="pd_info-group">
            <span class="pd_subtitle">Auditivo</span>
            @isset($fichaTerapiaOcupacional->val_sensorial->auditivo)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_sensorial->auditivo }}</span>
            @endisset
        </div>

        <div class="pd_info-group">
            <span class="pd_subtitle">Táctil</span>
            @isset($fichaTerapiaOcupacional->val_sensorial->tactil)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_sensorial->tactil }}</span>
            @endisset
        </div>

        <div class="pd_info-group">
            <span class="pd_subtitle">Propioceptivo</span>
            @isset($fichaTerapiaOcupacional->val_sensorial->propioceptivo)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_sensorial->propioceptivo }}</span>
            @endisset
        </div>

        <div class="pd_info-group">
            <span class="pd_subtitle">Vestibular</span>
            @isset($fichaTerapiaOcupacional->val_sensorial->vestibular)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_sensorial->vestibular }}</span>
            @endisset
        </div>
    </div>

    <div class="evaluacion_motora">
        <span class="pd_title">Evaluación Motora</span>

        <div class="pd_info-group">
            <span class="pd_subtitle">Tono</span>
            @isset($fichaTerapiaOcupacional->val_motora->tono)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_motora->tono }}</span>
            @endisset
        </div>

        <div class="pd_info-group">
            <span class="pd_subtitle">ROM</span>
            @isset($fichaTerapiaOcupacional->val_motora->rom)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_motora->rom }}</span>
            @endisset
        </div>

        <div class="pd_info-group">
            <span class="pd_subtitle">Dolor</span>
            @isset($fichaTerapiaOcupacional->val_motora->dolor)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_motora->dolor }}</span>
            @endisset
        </div>

        <div class="pd_info-group">
            <span class="pd_subtitle">Fuerza Muscular</span>
            @isset($fichaTerapiaOcupacional->val_motora->fm)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_motora->fm }}</span>
            @endisset
        </div>

        <div class="pd_info-group">
            <span class="pd_subtitle">Habilidades Motrices</span>
            @isset($fichaTerapiaOcupacional->val_motora->hab_motrices)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_motora->hab_motrices }}</span>
            @endisset
        </div>

        <div class="pd_info-group">
            <span class="pd_subtitle">Coordinación</span>
            @isset($fichaTerapiaOcupacional->val_motora->coordinacion)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_motora->coordinacion }}</span>
            @endisset
        </div>

        <div class="pd_info-group">
            <span class="pd_subtitle">Equilibrio</span>
            @isset($fichaTerapiaOcupacional->val_motora->equilibrio)
            <span class="pd_valor">{{ $fichaTerapiaOcupacional->val_motora->equilibrio }}</span>
            @endisset
        </div>
    </div>
</div>
</body>
</html>
