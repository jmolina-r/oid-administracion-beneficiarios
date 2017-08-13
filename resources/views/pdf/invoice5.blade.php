<!--
/**
 * Created by PhpStorm.
 * User: JOHN
 * Date: 24-07-2017
 * Time: 4:35
 */
 -->
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
    <h1>Reporte Grupal</h1>
    <table>
        <tr >
            <th class="th1">Atenciones Anuales</th>
            <th class="th1"></th>
            <th class="th1"></th>
        </tr>
        <tr>
            <td>Kinesiología</td>
            <td></td>
            <td>{{$atencionAnualKines}}</td>
        </tr>
        <tr>
            <td>Psicología</td>
            <td></td>
            <td>{{$atencionAnualPsicos}}</td>
        </tr>
        <tr>
            <td>Terapeutas</td>
            <td></td>
            <td>{{$atencionAnualTers}}</td>
        </tr>
        <tr>
            <td>Fonoaudiología</td>
            <td></td>
            <td>{{$atencionAnualFonos}}</td>
        </tr>
    </table>
    <br>
    <table>
        <tr >
            <th class="th1">Atenciones Mensuales</th>
            <th class="th1"></th>
            <th class="th1"></th>
        </tr>
        <tr>
            <td>Kinesiología</td>
            <td></td>
            <td>{{$atencionMensualKines}}</td>
        </tr>
        <tr>
            <td>Psicología</td>
            <td></td>
            <td>{{$atencionMensualPsicos}}</td>
        </tr>
        <tr>
            <td>Terapeutas</td>
            <td></td>
            <td>{{$atencionMensualTers}}</td>
        </tr>
        <tr>
            <td>Fonoaudiología</td>
            <td></td>
            <td>{{$atencionMensualPsicos}}</td>
        </tr>
    </table>
</div>
<br>
<footer><h6 align="left">© 2017 Oficina para la Integración de personas con Discapacidad - Fecha {{ date('d-m-Y') }}</h6> </footer>
</body>
</html>