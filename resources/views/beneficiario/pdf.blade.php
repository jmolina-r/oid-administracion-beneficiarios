<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <style media="screen">
            .capitalize:{
                text-transform: capitalize;
            }
            h1:{
                color: #08088A;
                font-size: 300%
            }
            h2:{
                color: #0404B4;
                font-size: 200%
            }
            #observaciones,#datosTutor,#datosDiscapacidad,#datosContacto,#datosSociales,#datosUbicacion,#datosPersonales:{
                line-height: 10px
            }

        </style>
    </head>
    <body>

        <h1>Información del Beneficiario</h1>
        <hr>
        <h2>Datos Personales</h2>
        <section id="datosPersonales">
            <p><strong>Nombre Completo: </strong><span class="capitalize">{{ $beneficiario->nombre }}</span>&nbsp;
                    <span class="capitalize">{{ $beneficiario->apellido }}</span></p>
            <p><strong>Rut: </strong> <span class="capitalize">{{ $beneficiario->rut }}</span></p>
            <!-- Debes formatear la fecha, el formato que utiliza Chile -->
            <p><strong>Fecha de Nacimiento: </strong>{{ date('d/m/Y', strtotime($beneficiario->fecha_nacimiento)) }}</p>
            <p><strong>Genero: </strong> <span class="capitalize">{{ $beneficiario->sexo }}</span></p>
            <p><strong>Pais de Origen: </strong> <span class="capitalize">{{ $beneficiario->pais->nombre }}</span></p>
            <p><strong>Situación Civil: </strong> <span class="capitalize">{{ $beneficiario->estado_civil->nombre }}</span></p>
        </section>
        <h2>Ubicación</h2>
        <section id="datosUbicacion">
            <p><strong>Calle de Domicilio: </strong><span class="capitalize">{{$beneficiario->domicilio->calle}}</span></p>
            <p><strong>Número de Domicilio: </strong>{{$beneficiario->domicilio->numero}}</p>
            <p><strong>Número de Departamento: </strong>{{$beneficiario->domicilio->numero_depto}}</p>
            <p><strong>Población o Villa: </strong><span class="capitalize">{{$beneficiario->domicilio->pobl_vill}}</span></p>
        </section>
        <h2>Datos de Contacto</h2>
        <section id="datosContacto">
            @foreach ($beneficiario->telefonos as $telefono)
                <p>{{ $telefono->tipo == "fijo" ? "Teléfono de Red Fija: " : "Teléfono Celular: " }} {{ $telefono->tipo == "fijo" ? "+56" : "+56 9" }} {{$telefono->numero}} </p>
            @endforeach
            <p>Correo Electrónico:<span class="capitalize">{{$beneficiario->email}}</span></p>
        </section>
        <h2>Datos Sociales</h2>
        <section id="datosSociales">
            <p><strong>Tramo Fonasa: </strong><span class="capitalize">{{$beneficiario->ficha_beneficiario->dato_social->fonasa->tramo}}
                </span></p>
            <p><strong>Previsión: </strong><span class="capitalize">{{$beneficiario->ficha_beneficiario->dato_social->prevision->nombre}}
                </span></p>
            <p><strong>Nivel Educacional: </strong><span class="capitalize">{{$beneficiario->educacion->nombre}}</span></p>
            <p><strong>Ocupación: </strong><span class="capitalize">{{$beneficiario->ocupacion->nombre}}</span></p>
            <p><strong>Porcentaje Registro Social de Hogares: </strong><span class="capitalize">{{$beneficiario->registro_social_hogar->porcentaje}}%</span></p>
            @if($beneficiario->credencial_discapacidad->en_tramite === 1)
                <p><strong>Credencial de Discapacidad: </strong>En Trámite</p>
            @else
                @isset($beneficiario->credencial_discapacidad->fecha_vencimiento)
                <p><strong>Credencial de Discapacidad: </strong>{{ date('d/m/Y', strtotime($beneficiario->credencial_discapacidad->fecha_vencimiento)) }}</p>
                @endisset
            @endif
        </section>
        <h2>Datos de Discapacidad</h2>
        <section id="datosDiscapacidad">
                <p><strong>Tipo de Dependencia: </strong><span class="capitalize">{{$beneficiario->ficha_beneficiario->ficha_discapacidad->tipo_dependencia->nombre}}</span></p>
                @if($beneficiario->ficha_beneficiario->ficha_discapacidad->requiere_cuidado === 1)
                    <p><strong>Requiere Cuidados de Tercero: </strong> Si</p>
                @else
                    <p><strong>Requiere Cuidados de Tercero: </strong> No</p>
                @endif
                <p><strong>Diagnóstico Médico: </strong>{{$beneficiario->ficha_beneficiario->ficha_discapacidad->diagnostico}}</p>

        </section>
        <h2>Datos Tutor</h2>
        <section id="datosTutor">
            <p><strong>Nombre Completo: </strong><span class="capitalize">{{ $beneficiario->tutor->nombre }}</span>&nbsp;
                <span class="capitalize">{{ $beneficiario->tutor->apellido }}</span></p>
            <p>Teléfono de Red Fija: </p>
            <p>Teléfono Celular: </p>
            @foreach ($beneficiario->tutor->telefonos as $telefono)
                <p>{{ $telefono->tipo == "fijo" ? "Teléfono de Red Fija: " : "Teléfono Celular: " }} {{ $telefono->tipo == "fijo" ? "+56" : "+56 9" }} {{$telefono->numero}} </p>
            @endforeach
        </section>
        <h2>Observaciones</h2>
        <section id="observaciones">
            <p><strong>Observación General: </strong>{{$beneficiario->ficha_beneficiario->dato_social->observacion}}</p>
        </section>
    </body>
</html>
