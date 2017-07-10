<div class="modal-custom">
    <div class='modal fade' id='confirmation' tabindex='-1'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
                    <h3 class='modal-title' id='myModalLabel'>Confirmación de Registro</h3>
                </div>
                <div class='modal-body'>
                    <h5>A continuación se muestran todos los datos ingresados para el nuevo beneficiario. Favor leer detalladamente y confirmar con el botón registrar. De lo contrario, vuelva y modifique los datos que sean necesarios.</h5>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <h4>Nombre</h4>
                            <p id="nombre"></p>
                            <h4>Rut</h4>
                            <p id="rut"></p>
                            <h4>Sexo</h4>
                            <p>Masculino</p>
                            <h4>Domicilio</h4>
                            <p>Via Niza 56, 1230 Block 3</p>
                            <h4>Credencial de Discapacidad</h4>
                            <p>No</p>
                            <h4>Registro Social de Hogares</h4>
                            <p>24/03/2018</p>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <h4>Nacionalidad</h4>
                            <p>Chile</p>
                            <h4>Fecha de Nacimiento</h4>
                            <p>25/04/1992</p>
                            <h4>Situación Civil</h4>
                            <p>Casado</p>
                            <h4>Teléfono(s)</h4>
                            <p>+56987452431 +56552546987</p>
                            <h4>E-mail</h4>
                            <p>juanjo@hotmail.com</p>
                            <h4>Acompañante</h4>
                            <p>Julio Brito Yañez</p>
                            <h4>Contacto Acompañante</h4>
                            <p>+56932545687</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <h4>Sistema de Salud</h4>
                            <p>Fonasa - A</p>
                            <h4>Nivel Educacional</h4>
                            <p>Medio Completo</p>
                            <h4>Beneficios</h4>
                            <p>Sub. Discapacidad Mental - Pbs Vejez - Sub. Familiar</p>
                            <h4>Participación en Organizaciones Sociales</h4>
                            <p>La de mi casa - La de mi abuelita</p>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <h4>Previsión</h4>
                            <p>Cuprum</p>
                            <h4>Ocupación Actual</h4>
                            <p>Trabajador</p>
                            <h4>Sistema de Protección</h4>
                            <p>Vínculos</p>
                        </div>
                        <div class="col-lg-12">
                            <h4>Observación General</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <h4>Discapacidad Física</h4>
                            <p>0%</p>
                            <h4>Discapacidad Psíquica</h4>
                            <p>15%</p>
                            <h4>Discapacidad Sensorial</h4>
                            <p>50%</p>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <h4>Discapacidad Cognitiva</h4>
                            <p>0%</p>
                            <h4>Discapacidad Sensorial Visual</h4>
                            <p>0%</p>
                            <h4>Discapacidad Social y de la Comunicación</h4>
                            <p>0%</p>
                        </div>
                        <div class="col-lg-12">
                            <h4>Diagnóstico médico</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
                        </div>
                        <div class="col-lg-12">
                            <h4>Diagnóstico médico</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <h4>Dependencia</h4>
                            <p>Intermitente</p>
                            <h4>Plan de rehabilitación, tratamiento o control</h4>
                            <p>El plan es seguir las instrucciones del doctor</p>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <h4>Cuidado de terceros</h4>
                            <p>Si</p>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn btn-default' data-dismiss='modal' type='button'>Volver</button>
                    <button class='btn btn-success' type='button' onclick="enviarFormulario()">Registrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    /**
     * Envia el formulario cuando ya fueron revisados todos los datos
     */
    function enviarFormulario(){

        $('#formulario-registro').submit();
    }
</script>
