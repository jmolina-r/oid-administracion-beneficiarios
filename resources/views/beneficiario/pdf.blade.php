<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <style media="screen">
            .capitalize: {
                text-transform: capitalize;
            }
        </style>
    </head>
    <body>

        <h1>Información del Beneficiario</h1>

        <hr>

        <section id="datosPersonales">
            <h2>Datos Personales</h2>
            <p>Nombre: <span class="capitalize">{{ $beneficiario->nombre }}</span></p>
            <p>Apellido: <span class="capitalize">{{ $beneficiario->apellido }}</span></p>
            <p>Rut: <span class="capitalize">{{ $beneficiario->rut }}</span></p>
            <!-- Debes formatear la fecha, el formato que utiliza Chile -->
            <p>Fecha de Nacimiento: <span class="capitalize">{{ $beneficiario->fecha_nacimiento }}</span></p>
            <p>Genero: <span class="capitalize">{{ $beneficiario->sexo }}</span></p>
            <p>Nacionalidad: <span class="capitalize">{{ $beneficiario->pais->nombre }}</span></p>
            <p>Situación Civil: <span class="capitalize">{{ $beneficiario->estado_civil->nombre }}</span></p>
            <p>Calle de Domicilio: <span class="capitalize">{{$beneficiario->domicilio->calle}}</span><br></p>
            <p>Número de Domicilio {{$beneficiario->domicilio->numero}}</p>








        </section>


    </body>
</html>
