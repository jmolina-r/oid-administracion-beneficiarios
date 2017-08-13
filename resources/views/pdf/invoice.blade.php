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
    <h1>Reporte General</h1>
        <table>
            <tr >
                <th class="th1">OID</th>
                <th class="th1"></th>
                <th class="th1"></th>
            </tr>
            <tr>
                <td>CANTIDAD TOTAL DE USUARIOS</td>
                <td></td>
                <td><?php echo $cant ?></td>
            </tr>
            <tr>
                <td>CANTIDAD INGRESOS MENSUALES</td>
                <td></td>
                <td><?php echo $ingresoMensual ?></td>
            </tr>
            <tr>
                <td>CANTIDAD INGRESOS ANUALES</td>
                <td></td>
                <td><?php echo $ingresoAnual ?></td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <th class="th2" colspan="5">Usuarios</th>
            </tr>
            <tr>
                <td colspan="3">INSCRITOS FEMENINOS</td>
                <td colspan="2"><?php echo number_format($porcentajeFemenino,2,'.','') ?>%</td>
            </tr>
            <tr>
                <td colspan="3">INSCRITOS MASCULINOS</td>
                <td colspan="2"><?php echo number_format($porcentajeMasculino,2,'.','') ?>%</td>
            </tr>
            <tr>
                <td colspan="3">CREDENCIAL DE DISCAPACIDAD ENTREGADAS</td>
                <td colspan="2"><?php echo number_format($porcentajeCredencialEntregada,2,'.',''); echo '%'?></td>
            </tr>
            <tr>
                <td colspan="3">CREDENCIAL DE DISCAPACIDAD EN TRÁMITE</td>
                <td colspan="2"><?php echo number_format($porcentajeCredencialTramite,2,'.',''); echo '%'?></td>
            </tr>
            <tr>
                <td colspan="3">REGISTRO SOCIAL DE HOGARES</td>
                <td colspan="2"><?php echo number_format($porcentajeRSTiene,2,'.',''); echo '%'?></td>
            </tr>
            <tr>
                <td colspan="3">REGISTRO SOCIAL DE HOGARES EN TÁMITE</td>
                <td colspan="2"><?php echo number_format($porcentajeRSTramite,2,'.',''); echo '%'?></td>
            </tr>
            <tr>
                <td colspan="1">EDUCACION</td>
                <td colspan="4"><table>
                        <tr>
                            <th>NIVEL EDUCACIONAL</th>
                            <th>CANTIDAD</th>
                        </tr>
                        <tr>
                            <td>Prebasico</td>
                            <td><?php echo intval($preBasico) ?></td>
                        </tr>
                        <tr>
                            <td>Basico incompleto</td>
                            <td><?php echo intval($basicoIncompleto) ?></td>
                        </tr>
                        <tr>
                            <td>Basico completo</td>
                            <td><?php echo intval($basicoCompleto) ?></td>
                        </tr>
                        <tr>
                            <td>Medio incompleto</td>
                            <td><?php echo intval($medioIncompleto) ?></td>
                        </tr>
                        <tr>
                            <td>Medio completo</td>
                            <td><?php echo intval($medioCompleto) ?></td>
                        </tr>
                        <tr>
                            <td>Tecnico incompleto</td>
                            <td><?php echo intval($tecnicoIncompleto) ?></td>
                        </tr>
                        <tr>
                            <td>Tecnico completo</td>
                            <td><?php echo intval($tecnicoCompleto) ?></td>
                        </tr>
                        <tr>
                            <td>Universitario incompleto</td>
                            <td><?php echo intval($universitarioIncompleto) ?></td>
                        </tr>
                        <tr>
                            <td>Universitario completo</td>
                            <td><?php echo intval($universitarioCompleto) ?></td>
                        </tr>
                    </table></td>
            </tr>
            <tr>
                <td colspan="1">SITUACIÓN LABORAL</td>
                <td colspan="4"><table>
                        <tr>
                            <th>OCUPACIÓN</th>
                            <th>CANTIDAD</th>
                        </tr>
                        <tr>
                            <td>Trabajador</td>
                            <td><?php echo intval($trabajador) ?></td>
                        </tr>
                        <tr>
                            <td>Estudiante</td>
                            <td><?php echo intval($estudiante) ?></td>
                        </tr>
                        <tr>
                            <td>Dueño de casa</td>
                            <td><?php echo intval($duenoCasa) ?></td>
                        </tr>
                        <tr>
                            <td>Pensionado</td>
                            <td><?php echo intval($pensionado) ?></td>
                        </tr>
                        <tr>
                            <td>Cesante</td>
                            <td><?php echo intval($cesante) ?></td>
                        </tr>
                    </table></td>
            </tr>
            <tr>
                <td>SALUD</td>
                <td colspan="2">
                    <table>
                        <tr>
                            <td colspan="2" align="center" valign="middle">USUARIOS FONASA </td>
                            <td colspan="2" align="center" valign="middle">USUARIOS ISAPRE </td>
                        </tr>
                        <tr>
                            <td colspan="2"><?php echo number_format($porcentajeFonasa,2,'.','') ?>%</td>

                            <td colspan="2"><?php echo number_format($porcentajeIsapre,2,'.','') ?>%</td>
                        </tr>
                    </table>
                </td>
                <td colspan="2">
                    <table>
                        <tr>
                            <td colspan="2" align="center" valign="middle">Tramos Fonasa</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tramo A</td>
                            <td><?php echo number_format($porcentajeFonasaTramoA,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td>Tramo B</td>
                            <td><?php echo number_format($porcentajeFonasaTramoB,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td>Tramo C</td>
                            <td><?php echo number_format($porcentajeFonasaTramoC,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td>Tramo D</td>
                            <td><?php echo number_format($porcentajeFonasaTramoD,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center" valign="middle">  Tipos de Isapre</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cruz Blanca</td>
                            <td><?php echo number_format($isapreCruzBlanca,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td>Colmena</td>
                            <td><?php echo number_format($isapreColmena,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td>Más vida</td>
                            <td><?php echo number_format($isapreMasVida,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td>Consalud</td>
                            <td><?php echo number_format($isapreConsalud,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td>Banmedica</td>
                            <td><?php echo number_format($isapreBanmedica,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td>Vida Tres</td>
                            <td><?php echo number_format($isapreVidaTres,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td>Codelco</td>
                            <td><?php echo number_format($isapreCodelco,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td>Dipreca</td>
                            <td><?php echo number_format($isapreDipreca,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td>Capredena</td>
                            <td><?php echo number_format($isapreCapredena,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td>Ferro Salud</td>
                            <td><?php echo number_format($isapreFerroSalud,2,'.','') ?>%</td>
                        </tr>
                        <tr>
                            <td>Otros</td>
                            <td><?php echo number_format($isapreOtro,2,'.','') ?>%</td>
                        </tr>
                    </table>
                </td>
            </tr>


        </table>
        <br>
        <table>
            <tr>
                <th class="th1">Atenciones Global</th>
                <th class="th1"></th>
                <th class="th1"></th>
            </tr>
            <tr>
                <td>ATENCIONES MENSUALES</td>
                <td></td>
                <td><?php echo $atencionMensual ?></td>
            </tr>
            <tr>
                <td>ATENCIONES ANUALES</td>
                <td></td>
                <td><?php echo $atencionAnual ?></td>
            </tr>
        </table>
    </div>
<br>
<footer><h6 align="left">© 2017 Oficina para la Integración de personas con Discapacidad - Fecha {{ date('d-m-Y') }}</h6> </footer>
</body>
</html>