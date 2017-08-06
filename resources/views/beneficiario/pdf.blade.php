<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <style media="screen">
            .capitalize:{
                text-transform: capitalize;
            }
        </style>
    </head>
    <body>

        <h1>Información del Beneficiario</h1>
        <hr>

        <section id="datosPersonales">
            <h2>Datos Personales</h2>
                <p>Nombre Completo: <span class="capitalize">{{ $beneficiario->nombre }}</span>&nbsp;
                    <span class="capitalize">{{ $beneficiario->apellido }}</span></p>
                <p>Rut: <span class="capitalize">{{ $beneficiario->rut }}</span></p>
                <!-- Debes formatear la fecha, el formato que utiliza Chile -->
                <p>Fecha de Nacimiento: <span class="capitalize">{{ $beneficiario->fecha_nacimiento }}</span></p>
                <p>Genero: <span class="capitalize">{{ $beneficiario->sexo }}</span></p>
                <p>Pais de Origen: <span class="capitalize">{{ $beneficiario->pais->nombre }}</span></p>
                <p>Situación Civil: <span class="capitalize">{{ $beneficiario->estado_civil->nombre }}</span></p>
            <h2>Ubicación</h2>
                <p>Calle de Domicilio: <span class="capitalize">{{$beneficiario->domicilio->calle}}</span></p>
                <p>Número de Domicilio: {{$beneficiario->domicilio->numero}}</p>
                <p>Número de Departamento: {{$beneficiario->domicilio->numero_depto}}</p>
                <p>Población o Villa: <span class="capitalize">{{$beneficiario->domicilio->pobl_vill}}</span></p>
            <h2>Datos de Contacto</h2>
                <p>Teléfono de Red Fija:</p>
                <p>Teléfono Celuclar:</p>
                <p>Correo Electrónico:<span class="capitalize">{{$beneficiario->email}}</span></p>
            <h2>Datos Sociales</h2>
                <p>Tramo Fonasa:</p>
            <p>Previsión:</p>
                <p>Nivel Educacional: <span class="capitalize">{{$beneficiario->educacion->nombre}}</span></p>
                <p>Ocupación: <span class="capitalize">{{$beneficiario->ocupacion->nombre}}</span></p>
            <h2>Datos Tutor</h2>
            <p>Nombre Completo: <span class="capitalize">{{ $beneficiario->tutor->nombre }}</span>&nbsp;
                <span class="capitalize">{{ $beneficiario->tutor->apellido }}</span></p>


        </section>


    </body>
</html>
