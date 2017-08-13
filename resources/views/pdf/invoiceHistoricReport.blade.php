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
    <h1>Reporte Histórico</h1>
    <table>
        <tr >
            <th class="th1">Fecha: {{$mes}}/{{$anio}}</th>
            <th class="th1"></th>
            <th class="th1"></th>
        </tr>
        <tr>
            <td>TOTAL DE USUARIOS EN EL AÑO</td>
            <td></td>
            <td>{{ $cantUsuarioTotal }}</td>
        </tr>
        <tr>
            <td>USUARIOS INGRESADOS EN EL AÑO</td>
            <td></td>
            <td>{{ $cantIngresadosAño }}</td>
        </tr>
        <tr>
            <td>USUARIOS INGRESADOS EN EL MES</td>
            <td></td>
            <td>{{ $cantIngresadosMes }}</td>
        </tr>
        <tr>
            <td>ATENCIONES DEL AÑO</td>
            <td></td>
            <td>{{ $atencionAnual }}</td>
        </tr>
        <tr>
            <td>ATENCIONES DEL MES</td>
            <td></td>
            <td>{{ $atencionMensual }}</td>
        </tr>
    </table>
</div>
<br>
<footer><h6 align="left">© 2017 Oficina para la Integración de personas con Discapacidad - Fecha {{ date('d-m-Y') }}</h6> </footer>
</body>
</html>