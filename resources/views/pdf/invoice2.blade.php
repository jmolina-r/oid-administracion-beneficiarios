<!DOCTYPE html>
<html>
<head>
    <style>
        .div1 {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 14px;
            font-style: normal;
            font-variant: normal;
            font-weight: 500;
            line-height: 15.4px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        .th1 {
            background-color: #00acec;
            color: white;
        }
        .th2 {
            background-color: #49bf67;
            color: white;
        }

    </style>
</head>
<body>
<div class="div1">
    <h1>Reporte Psicología</h1>
    <table>
        <tr >
            <th class="th1">Datos Personales Psicólogo(a)</th>
            <th class="th1"></th>
            <th class="th1"></th>
        </tr>
        <tr>
            <td>Nombre Completo</td>
            <td></td>
            <td>{{ $psicologo->nombres }} {{ $psicologo->apellidos }}</td>
        </tr>
        <tr>
            <td>Rut</td>
            <td></td>
            <td>{{ $psicologo->rut }}</td>
        </tr>
        <tr>
            <td>Telefono</td>
            <td></td>
            <td>{{ $psicologo->telefono }}</td>
        </tr>
        <tr>
            <td>Dirección</td>
            <td></td>
            <td>{{ $psicologo->direccion }}</td>
        </tr>
    </table>
    <table>
        <tr >
            <th class="th1">Psicología</th>
            <th class="th1"></th>
            <th class="th1"></th>
        </tr>
        <tr>
            <td>ATENCIONES ANUALES</td>
            <td></td>
            <td>{{$atencionAnualPsico}}</td>
        </tr>
        <tr>
            <td>ATENCIONES MENSUALES</td>
            <td></td>
            <td>{{$atencionMensualPsico}}</td>
        </tr>
        <tr>
            <td>CANTIDAD DE ASISTENCIA DE PACIENTES</td>
            <td></td>
            <td>{{$asistenciaPsico}}</td>
        </tr>
        <tr>
            <td>CANTIDAD DE INASISTENCIA DE PACIENTES</td>
            <td></td>
            <td>{{$inasistenciaPsico}}</td>
        </tr>
    </table>
</div>
<br>
<footer><h6 align="left">© 2017 Oficina para la Integración de personas con Discapacidad - Fecha {{ date('d-m-Y') }}</h6> </footer>
</body>
</html>