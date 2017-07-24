Reporte General - OID
<br>
Fecha {{ date('d-m-Y H:i:s') }}
<div id='wrapper'>
    <div id='main-nav-bg'></div>
    <section id='content'>
        <div class='container'>
            <div class='row' id='content-wrapper'>
                <div class='col-xs-12'>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                                <div class='box-header blue-background'>
                                    <div class='title'>OID</div>
                                </div>
                                <div class='box-content box-statistic text-right'>
                                    <small>CANTIDAD TOTAL DE USUARIOS</small><h3 class='title text-error'><?php echo $cant ?></h3>

                                    <div class='text-error fa fa-users align-left'></div>
                                </div>
                                <div class='box-content box-statistic text-right'>
                                    <small>CANTIDAD INGRESOS MENSUALES</small><h3 class='title text-warning'><?php echo $ingresoMensual ?></h3>
                                    <div class='text-warning fa fa-book align-left'></div>
                                </div>
                                <div class='box-content box-statistic text-right'>
                                    <small>CANTIDAD INGRESOS ANUALES</small><h3 class='title text-primary'><?php echo $ingresoAnual ?></h3>
                                    <div class='text-primary fa fa-book align-left'></div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                                        <div class='box-header green-background'>
                                            <div class='title'>Usuarios</div>
                                            <div class='actions'>
                                                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <small>INSCRITOS FEMENINOS</small><h3 class='title text-info'><?php echo $porcentajeFemenino; echo '%'?></h3>

                                            <div class='text-info fa fa-venus align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <small>INSCRITOS MASCULINOS</small><h3 class='title text-muted'><?php echo $porcentajeMasculino; echo '%'?></h3>

                                            <div class='text-muted fa fa-mars align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <small>CREDENCIAL DE DISCAPACIDAD ENTREGADAS</small><h3 class='title text-inverse'><?php echo $porcentajeCredencial; echo '%'?></h3>

                                            <div class='text-inverse fa fa-credit-card align-left'></div>
                                        </div>
                                        <div class='col-sm-6 sinpadding'>
                                            <div class='box-content box-statistic text-right'>
                                                <h3 class='title text-error'><br></h3>
                                                <small>SALUD</small>
                                                <div class='text-error fa fa-ambulance align-left'></div>
                                            </div>
                                            <div class='box-content box-statistic text-right'>
                                                <h3 class='title text-error'><?php echo $porcentajeFonasa; echo '%'?></h3>
                                                <small>USUARIOS FONASA</small>
                                                <div class='text-error fa fa-ambulance align-left'></div>
                                            </div>
                                            <div class='box-content box-statistic text-right'>
                                                <h3 class='title text-error'><?php echo $porcentajeIsapre; echo '%'?></h3>
                                                <small>USUARIOS ISAPRE</small>
                                                <div class='text-error fa fa-ambulance align-left'></div>
                                            </div>
                                        </div>
                                        <div class='box-content box-statistic col-sm-6 sinpadding'>
                                            <div  id="piechart" style="width: 100%; height: 100%;"></div>
                                        </div>
                                        <div class='box-content box-statistic col-sm-12 text-right'>
                                            <h3 class='title text-error'><br></h3>
                                            <small>NIVEL EDUACIONAL</small>
                                            <div class='text-invisor fa fa-book align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic col-sm-12 sinpadding'>
                                            <div  id="donutchart" style="width: 100%; height: 100%;"></div>
                                        </div>
                                        <div class='box-content box-statistic col-sm-12 text-right'>
                                            <h3 class='title text-error'><br></h3>
                                            <small>SITUACION LABORAL</small>
                                            <div class='text-invisor fa fa-book align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic col-sm-12 sinpadding'>
                                            <div  id="chartthree" style="width: 100%; height: 100%;"></div>
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                                        <div class='box-header blue-background'>
                                            <div class='title'>Atenciones Global</div>
                                            <div class='actions'>
                                                <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                                                </a>
                                                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-info'><?php echo $atencionMensual ?></h3>
                                            <small>ATENCIONES MENSUALES</small>
                                            <div class='text-info fa fa-file-text align-left'></div>
                                        </div>
                                        <div class='box-content box-statistic text-right'>
                                            <h3 class='title text-info'><?php echo $atencionAnual ?></h3>
                                            <small>ATENCIONES ANUALES</small>
                                            <div class='text-info fa fa-file-text align-left'></div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    @include('partials.footer')
                </div>
    </section>

</div>