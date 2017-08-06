/**
 * Created by pablofb on 23-05-17.
 */
$(document).ready(function() {
    /**
     * Acciones al cambiar al step siguiente o al anterior
     */

    $('#formulario-registro').validator();

    $('#myWizard').wizard().on('actionclicked.fu.wizard', function(e, data) {
        var hasErrors = $('#formulario_registro').validator('validate').has('.has-error').length;
        //if (hasErrors) e.preventDefault();

    }).on('finished.fu.wizard', function(e) {
        var hasErrors = $('#formulario_registro').validator('validate').has('.has-error').length;
        if (hasErrors) e.preventDefault();
        if (hasErrors == 0) {
            //Confirmacion Nombre
            $('#nombre_confirmation').html($("#nombres").val() + " " + $("#apellidos").val());

            //Confirmacion Rut
            $('#rut_confirmation').html($("#rut").val());

            //Confirmacion Sexo
            $('#sexo_confirmation').html($("#sexo").val());

            //Confirmacion domicilio
            if($("#domicilio_calle").val()){
                var direccion = $("#domicilio_calle").val();

                if($("#domicilio_block").val()){
                    direccion = direccion + " " + $("#domicilio_block").val();
                }

                if ($("#domicilio_numero_dpto").val()) {
                    direccion = direccion + " " + $("#domicilio_numero_dpto").val();
                }

                if ($("#domicilio_poblacion").val()) {
                    direccion = direccion + " " + $("#domicilio_poblacion").val();
                }
                $('#domicilio_confirmation').html(direccion);
            }else if($("#domicilio_calle").val()==""){
                $('#domicilio_confirmation').html("-");
            }

            //Confirmacion Fecha de Nacimiento
            $('#fecha_nacimiento_confirmation').html($("#fecha_nacimiento").val());

            //Confirmacion Nacionalidad
            $('#nacionalidad_confirmation').html($("#id_pais").val());

            //Confirmacion Estado Civil
            $('#estado_civil_confirmation').html($("#estado_civil").val());

            //Confirmacion Telefonos
            var telefonos = "";

            if($("#tel_fijo").val() && $("#tel_movil").val()){
                telefonos = $("#tel_fijo").val() + " - " + $("#tel_movil").val();
            }else if($("#tel_fijo").val()){
                telefonos = $("#tel_fijo").val();
            }else if($("#tel_movil").val()){
                telefonos = $("#tel_movil").val();
            }

            $("#telefonos_confirmation").html(telefonos);

            //Confirmacion E-mail
            if($("#email").val()){
                $('#email_confirmation').html($("#email").val());
            } else {
                $('#email_confirmation').html("-");
            }

            //Confirmacion Credencial de Discapacidad
            if($("#credencial_discapacidad").val() == 1){
                $('#credencial_confirmation').html("Si - Vence: " + $("#credencial_vencimiento").val());
            }else if($("#credencial_discapacidad").val() == 2){
                $('#credencial_confirmation').html("En trámite");
            }else{
                $('#credencial_confirmation').html("No");
            }

            //Confirmacion Registro Social de Hogares
            if($("#registro_social_hogares").val() == 1){
                $('#registro_social_confirmation').html("Si - %" + $("#registro_social_porcentaje").val());
            }else if($("#registro_social_hogares").val() == 2){
                $('#registro_social_confirmation').html("En trámite");
            }else{
                $('#registro_social_confirmation').html("No");
            }

            //Confirmacion Tutor
            $('#tutor_confirmation').html($("#nombre_tutor").val() + " " + $("#apellido_tutor").val());

            //Confirmacion Telefono Tutor
            if($("#telefono_tutor").val()){
                $('#telefono_tutor_confirmation').html($("#telefono_tutor").val());
            }else{
                $('#telefono_tutor_confirmation').html("-")
            }

            //Confirmacion Prevision
            if($("#prevision").val()){
                $("#prevision_confirmation").html($("#prevision").val());
            }

            //Confirmacion Nivel Educacional
            $("#nivel_educacional_confirmation").html($("#nivel_educacional").val());

            //Confirmacion Ocupacion
            $("#ocupacion_confirmation").html($("#ocupacion").val());

            //Confirmacion Observacion General
            if($("#observacion_general").val()){
                $("#observacion_confirmation").html($("#observacion_general").val());
            } else {
                $("#observacion_confirmation").html("-");
            }

            //Confirmacion Discapacidad
            for (var i = 1; i < 7; i++) {
                if($("#discapacidad_" + i).val()){
                    $("#discapacidad_" + i + "_confirmation").html($("#discapacidad_" + i).val());
                } else {
                    $("#discapacidad_" + i + "_confirmation").html("-");
                }
            }

            //Confirmacion Diagnostico Medico
            if($("#inputDiagnostico").val()){
                $("#diagnostico_confirmation").html($("#inputDiagnostico").val());
            } else {
                $("#diagnostico_confirmation").html("-");
            }

            //Confirmacion Otras Enfermedades
            if($("#otras_enfermedades").val()){
                $("#otras_enfermedades_confirmation").html($("#otras_enfermedades").val());
            } else {
                $("#otras_enfermedades_confirmation").html("-");
            }

            //Confirmacion Dependencia
            if($("#dependencia").val()){
                $("#dependencia_confirmation").html($("#dependencia").val());
            } else {
                $("#dependencia_confirmation").html("-");
            }

            // //Confirmacion Cuidado de Terceros
            // if($("#cuidados").val()){
            //     $('#cuidados_confirmation').html("Si");
            // } else {
            //     $('#cuidados_confirmation').html("No");
            // }

            //Confirmacion Plan de Rehabilitacion
            if($("#p_reha_trat_ctrl").val()){
                $('#plan_confirmation').html($("#p_reha_trat_ctrl").val());
            } else {
                $('#plan_confirmation').html("-");
            }

            //Falta
            //Nacionalidad, Situacion Civil, Sexo, SOCIAL COMPLETO MENOS OBS, Discapacidades, Dependencia, Cuidado de terceros


            $('#confirmation').modal('show');
        }
    });


    /**
     * Si hay puntuacion se activa comentario.
     */
    $("#puntaje").change(function() {
        //Si se ha seleccionado si
        if (this.value == 1) {
            $('#comentario').removeAttr('disabled');
        }
        actualizarValidador();

    });

    /**
     * Registro Social de Hogares, si es si, activa porcentaje y lo pone requerido,
     * si no, lo bloquea.
     */
    $("#registro_social_hogares").change(function() {
        //Si se ha seleccionado si
        if (this.value == 1) {
            $("#registro_social_porcentaje").prop('required', true);
            $('#registro_social_porcentaje').removeAttr('disabled');
        }

        //Si se ha seleccionado en tramite o no
        if (this.value == 0 || this.value == 2) {
            $('#registro_social_porcentaje').removeAttr('required');
            $('#registro_social_porcentaje').val("");
            $("#registro_social_porcentaje").prop('disabled', true);
        }
        actualizarValidador();

    });

    /**
     * Requerir el numero de la direccion si se escribio una calle
     */
    $('#domicilio_calle').keyup(function() {
        var largo = $('#domicilio_calle').val().length;
        if (largo > 0) {
            $("#domicilio_numero").prop('required', true);
        } else {
            $('#domicilio_numero').removeAttr('required');
        }
        actualizarValidador();
    });

    /**
     * Funcion que permite actualizar el validador y requiera los campos necesarios
     */
    function actualizarValidador() {
        //Actualizar el validador del formulario
        $('#formulario-registro').validator("destroy");
        $('#formulario-registro').validator();
    }

    /**
     * Estilos para select del tema
     */
    $(".select2-selection").addClass("capitalize");
    $(".select2-search").css("width","100%");
    $(".select2-search__field").css("width","100%");

    $(function () {
        $('#fecha_nacimiento').datetimepicker({
            maxDate:"now",
            format: "DD/MM/YYYY",
            icons: {
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right'
            },
            viewMode: 'years'
        });
    });

    $(function () {
        $('#fecha_nacimiento2').datetimepicker({
            maxDate:"now",
            format: "DD/MM/YYYY",
            icons: {
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right'
            },
            viewMode: 'years'
        });
    });

    $(function () {
        $('#credencial_venc').datetimepicker({
            minDate:"now",
            format: "DD/MM/YYYY",
            icons: {
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right'
            }
        });
    });
});
