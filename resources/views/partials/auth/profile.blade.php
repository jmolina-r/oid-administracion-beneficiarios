<div class="modal-custom">
    <div class='modal fade' id='profile' tabindex='-1'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
                    <h3 class='modal-title' id='myModalLabel'>Datos de Usuario</h3>
                </div>
                <div class='modal-body'>
                    <h5>A continuación se muestran los datos de usuario. Para modificar, presione el botón editar.</h5>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <h4>Nombre de Usuario</h4>
                            <p id="username">-</p>
                            <h4>E-mail</h4>
                            <p id="email">-</p>
                            <h4>Rol en el Sistema</h4>
                            <p id="roles">-</p>
                            <h4>Estado</h4>
                            <span id="estado" class='label'>-</span>
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
