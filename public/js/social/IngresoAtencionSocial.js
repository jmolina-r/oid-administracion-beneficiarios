/**
 * Created by JOHN on 12-08-2017.
 */
$(document).ready(function() {
    /**
     * Acciones al cambiar al step siguiente o al anterior
     */


    $('#formularioAsistenciaSocial').submit(function(e) {
        e.preventDefault();

        //Confirmacion Patologías Concomitantes
        $('#pat_concom_confirmation').html($("#pat_concom").val());
        //Confirmacion Alergias
        $('#alergias_confirmation').html($("#alergias").val());

        //Confirmacion Medicamentos
        $('#medicamentos_confirmation').html($("#medicamentos").val());

        //Confirmacion Antecedentes Quirúrgicos
        $('#ant_quir_confirmation').html($("#ant_quir").val());

        //Confirmacion Aparatos
        $('#aparatos_confirmation').html($("#aparatos").val());

        //Confirmacion ¿Fuma?
        if ($("#fuma_sn").is(":checked")) {
            $('#fuma_sn_confirmation').html("Si");
        } else {
            $('#fuma_sn_confirmation').html("No");
        }

        //Confirmacion ¿Bebe OH?
        if ($("#alcohol_sn").is(":checked")) {
            $('#alcohol_sn_confirmation').html("Si");
        } else {
            $('#alcohol_sn_confirmation').html("No");
        }

        //Confirmacion Act. física
        if ($("#act_fisica_sn").is(":checked")) {
            $('#act_fisica_sn_confirmation').html("Si");
        } else {
            $('#act_fisica_sn_confirmation').html("No");
        }

        //Confirmacion Situación Familiar
        $('#situacion_familiar_confirmation').html($("#situacion_familiar").val());

        //Confirmacion Situación Laboral
        $('#situacion_laboral_confirmation').html($("#situacion_laboral").val());

        //Confirmacion ¿Asiste algún centro de RHB?
        $('#asiste_centro_rhb_confirmation').html($("#asiste_centro_rhb").val());

        //Confirmacion Motivo de Consulta
        $('#motivo_consulta_confirmation').html($("#motivo_consulta").val());

        //Confirmacion Alimentación
        $('#puntaje_alimentacion_confirmation').html($("#puntaje_alimentacion").val());
        $('#coment_alimentacion_confirmation').html($("#coment_alimentacion").val());

        //Confirmacion Arreglo Personal
        $('#puntaje_arreglo_pers_confirmation').html($("#puntaje_arreglo_pers").val());
        $('#coment_arreglo_pers_confirmation').html($("#coment_arreglo_pers").val());

        //Confirmacion Baño
        $('#puntaje_bano_confirmation').html($("#puntaje_bano").val());
        $('#coment_bano_confirmation').html($("#coment_bano").val());

        //Confirmacion Vestuario Superior
        $('#puntaje_vest_sup_confirmation').html($("#puntaje_vest_sup").val());
        $('#coment_vest_sup_confirmation').html($("#coment_vest_sup").val());

        //Confirmacion Vestuario Inerior
        $('#puntaje_vest_inf_confirmation').html($("#puntaje_vest_inf").val());
        $('#coment_vest_inf_confirmation').html($("#coment_vest_inf").val());

        //Confirmacion Aseo Personal
        $('#puntaje_aseo_pers_confirmation').html($("#puntaje_aseo_pers").val());
        $('#coment_aseo_pers_confirmation').html($("#coment_aseo_pers").val());

        //Confirmacion Control de Vejiga
        $('#puntaje_control_vejiga_confirmation').html($("#puntaje_control_vejiga").val());
        $('#coment_control_vejiga_confirmation').html($("#coment_control_vejiga").val());

        //Confirmacion Control de Instestino
        $('#puntaje_control_intestino_confirmation').html($("#puntaje_control_intestino").val());
        $('#coment_control_intestino_confirmation').html($("#coment_control_intestino").val());

        //Confirmacion Transferencia cama-silla
        $('#puntaje_trans_cama_silla_confirmation').html($("#puntaje_trans_cama_silla").val());
        $('#coment_trans_cama_silla_confirmation').html($("#coment_trans_cama_silla").val());

        //Confirmacion Traslado baño
        $('#puntaje_traslado_bano_confirmation').html($("#puntaje_traslado_bano").val());
        $('#coment_traslado_bano_confirmation').html($("#coment_traslado_bano").val());

        //Confirmacion Traslado ducha
        $('#puntaje_traslado_ducha_confirmation').html($("#puntaje_traslado_ducha").val());
        $('#coment_traslado_ducha_confirmation').html($("#coment_traslado_ducha").val());

        //Confirmacion Desplazarse caminando/sr
        $('#puntaje_desp_caminando_confirmation').html($("#puntaje_desp_caminando").val());
        $('#coment_desp_caminando_confirmation').html($("#coment_desp_caminando").val());

        //Confirmacion Subir y bajar escaleras
        $('#puntaje_escaleras_confirmation').html($("#puntaje_escaleras").val());
        $('#coment_escaleras_confirmation').html($("#coment_escaleras").val());

        //Confirmacion Expresión
        $('#puntaje_expresion_confirmation').html($("#puntaje_expresion").val());
        $('#coment_expresion_confirmation').html($("#coment_expresion").val());

        //Confirmacion Comprensión
        $('#puntaje_comprension_confirmation').html($("#puntaje_comprension").val());
        $('#coment_comprension_confirmation').html($("#coment_comprension").val());

        //Confirmacion Interacción social
        $('#puntaje_int_social_confirmation').html($("#puntaje_int_social").val());
        $('#coment_int_social_confirmation').html($("#coment_int_social").val());

        //Confirmacion Solución de problemas
        $('#puntaje_sol_problemas_confirmation').html($("#puntaje_sol_problemas").val());
        $('#coment_sol_problemas_confirmation').html($("#coment_sol_problemas").val());

        //Confirmacion Memoria
        $('#puntaje_memoria_confirmation').html($("#puntaje_memoria").val());
        $('#coment_memoria_confirmation').html($("#coment_memoria").val());

        //Confirmacion Conexión con el medio
        $('#conexion_medio_confirmation').html($("#conexion_medio").val());

        //Confirmacion Nivel cognitivo aparente
        $('#nivel_cognitivo_apar_confirmation').html($("#nivel_cognitivo_apar").val());

        //Confirmacion Visual
        $('#visual_confirmation').html($("#visual").val());

        //Confirmacion Auditivo
        $('#auditivo_confirmation').html($("#auditivo").val());

        //Confirmacion Táctil
        $('#tactil_confirmation').html($("#tactil").val());

        //Confirmacion Propioceptivo
        $('#propioceptivo_confirmation').html($("#propioceptivo").val());

        //Confirmacion Vestibular
        $('#vestibular_confirmation').html($("#vestibular").val());

        //Confirmacion Tono
        $('#tono_confirmation').html($("#tono").val());

        //Confirmacion ROM
        $('#rom_confirmation').html($("#rom").val());

        //Confirmacion Dolor
        $('#dolor_confirmation').html($("#dolor").val());

        //Confirmacion Fuerza Muscular
        $('#fm_confirmation').html($("#fm").val());

        //Confirmacion Habilidades Motrices
        $('#hab_motrices_confirmation').html($("#hab_motrices").val());

        //Confirmacion Coordinación
        $('#coordinacion_confirmation').html($("#coordinacion").val());

        //Confirmacion Equilibrio
        $('#equilibrio_confirmation').html($("#equilibrio").val());

        $('#confirmationformularioAsistenciaSocial').modal('show');
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
        $('#formularioAsistenciaSocial').validator("destroy");
        $('#formularioAsistenciaSocial').validator();
    }

    /**
     * Estilos para select del tema
     */
    $(".select2-selection").addClass("capitalize");
    $(".select2-search").css("width", "100%");
    $(".select2-search__field").css("width", "100%");



});


function enviarFormulario(){
    $('#formularioAsistenciaSocial').submit();
}
