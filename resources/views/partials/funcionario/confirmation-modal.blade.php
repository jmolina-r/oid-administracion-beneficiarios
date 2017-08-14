<div class="modal-custom">
    <div class='modal fade' id='confirmationFuncionarioModal' tabindex='-1'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
                    <h3 class='modal-title'>Datos del Funcionario</h3>
                </div>
                <div class='modal-body'>
                    <h5>A continuación se muestran los datos del funcionario.</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Nombre del Funcionario</h4>
                            <p class="capitalize" id="funcionarioNombre">-</p>

                            <h4>Rut</h4>
                            <p id="funcionarioRut">-</p>

                            <h4>Telefono</h4>
                            <p id="funcionarioTelefono">-</p>

                            <h4>Dirección Particular</h4>
                            <p class="capitalize" id="funcionarioDireccion">-</p>

                        </div>

                        <div class="col-lg-6">

                            <h4>Fecha Nacimiento</h4>
                            <p id="funcionarioFechaNacimiento">-</p>

                            <h4>E-mail</h4>
                            <p id="funcionarioEmail">-</p>

                            <h4>Labor en OID</h4>
                            <p class="capitalize" id="funcionarioTipo">-</p>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn btn-default' data-dismiss='modal' type='button'>Volver</button>
                    <a href="#" id="aceptarFuncionarioBtn" class='btn btn-warning' >Aceptar</a>
                    <input id="userId" type="hidden" value="">
                </div>
            </div>
        </div>
    </div>
</div>
