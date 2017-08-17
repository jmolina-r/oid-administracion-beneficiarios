<div class="modal-custom">
    <div class='modal fade' id='profile' tabindex='-1'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
                    <h3 class='modal-title' id='myModalLabel'>Datos de Usuario</h3>
                </div>
                <div class='modal-body'>
                    <h5>A continuación se muestran los datos de usuario.</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Nombre de Usuario</h4>
                            <p id="username">-</p>
                            <h4>E-mail</h4>
                            <p id="email">-</p>

                        </div>
                        <div class="col-md-6">
                            <h4>Rol en el Sistema</h4>
                            <p id="roles">-</p>
                            <h4>Estado</h4>
                            <span id="estado" class='label'>-</span>
                        </div>
                    </div>

                    <br>
                    <h5>A continuación se muestran los datos del funcionario asociado.</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Nombre del Funcionario</h4>
                            <p class="capitalize" id="funcionarioNombreProfileHeader">-</p>

                            <h4>Rut</h4>
                            <p id="funcionarioRutProfileHeader">-</p>

                            <h4>Telefono</h4>
                            <p id="funcionarioTelefonoProfileHeader">-</p>


                        </div>

                        <div class="col-lg-6">

                            <h4>Fecha Nacimiento</h4>
                            <p id="funcionarioFechaNacimientoProfileHeader">-</p>

                            <h4>E-mail</h4>
                            <p id="funcionarioEmailProfileHeader">-</p>

                            <h4>Dirección Particular</h4>
                            <p class="capitalize" id="funcionarioDireccionProfileHeader">-</p>

                            {{-- <h4>Labor en OID</h4>
                            <p class="capitalize" id="funcionarioTipoProfileHeader">-</p> --}}
                        </div>
                    </div>

                </div>



                <div class='modal-footer'>
                    <button class='btn btn-default' data-dismiss='modal' type='button'>Volver</button>
                    <button id="editar_btn" class='btn btn-warning' type='button'>Editar</button>
                    <input id="userId" type="hidden" value="">
                </div>
            </div>
        </div>
    </div>
</div>
