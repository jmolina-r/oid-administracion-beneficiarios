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
                            <p id="nombre_confirmation">-</p>
                            <h4>Rut</h4>
                            <p id="rut_confirmation">-</p>
                            <h4>Sexo</h4>
                            <p id="sexo_confirmation">-</p>
                            <h4>Domicilio</h4>
                            <p id="domicilio_confirmation">-</p>
                            <h4>Credencial de Discapacidad</h4>
                            <p id="credencial_confirmation">-</p>
                            <h4>Registro Social de Hogares</h4>
                            <p id="registro_social_confirmation">-</p>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <h4>Nacionalidad</h4>
                            <p id="nacionalidad_confirmation">-</p>
                            <h4>Fecha de Nacimiento</h4>
                            <p id="fecha_nacimiento_confirmation">-</p>
                            <h4>Situación Civil</h4>
                            <p id="estado_civil_confirmation">-</p>
                            <h4>Teléfono(s)</h4>
                            <p id="telefonos_confirmation">-</p>
                            <h4>E-mail</h4>
                            <p id="email_confirmation">-</p>
                            <h4>Acompañante</h4>
                            <p id="tutor_confirmation">-</p>
                            <h4>Contacto Acompañante</h4>
                            <p id="telefono_tutor_confirmation">-</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <h4>Sistema de Salud</h4>
                            <p id="salud_confirmation">-</p>
                            <h4>Nivel Educacional</h4>
                            <p id="nivel_educacional_confirmation">-</p>
                            <h4>Beneficios</h4>
                            <p id="beneficios_confirmation">-</p>
                            <h4>Participación en Organizaciones Sociales</h4>
                            <p id="organizaciones_confirmation">-</p>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <h4>Previsión</h4>
                            <p id="prevision_confirmation">-</p>
                            <h4>Ocupación Actual</h4>
                            <p id="ocupacion_confirmation">-</p>
                            <h4>Sistema de Protección</h4>
                            <p id="proteccion_confirmation">-</p>
                        </div>
                        <div class="col-lg-12">
                            <h4>Observación General</h4>
                            <p id="observacion_confirmation">-</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach ($tipo_discapacidades as $tipo_discapacidad)
                            <div class="col-sm-12 col-lg-6">
                                <h4>Discapacidad {{$tipo_discapacidad->nombre}}</h4>
                                <p id="discapacidad_{{$tipo_discapacidad->id}}_confirmation">-</p>
                            </div>
                        @endforeach

                        <div class="col-lg-12">
                            <h4>Diagnóstico médico</h4>
                            <p id="diagnostico_confirmation">-</p>
                        </div>
                        <div class="col-lg-12">
                            <h4>Otras Enfermedades</h4>
                            <p id="otras_enfermedades_confirmation">-</p>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <h4>Dependencia</h4>
                            <p id="dependencia_confirmation">-</p>
                            <h4>Plan de rehabilitación, tratamiento o control</h4>
                            <p id="plan_confirmation">-</p>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <h4>Cuidado de terceros</h4>
                            <p id="cuidado_confirmation">-</p>
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
