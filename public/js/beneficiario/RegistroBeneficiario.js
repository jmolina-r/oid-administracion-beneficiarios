$(document).ready(function() {

    //Trigger del segundo boton continuar al primero
    $("#continuar_btn_bottom" ).click(function() {
        $('#continuar_btn').click();
    });

    //Activa o deshabilita vencimiento credencial segun seleccion anterior
    activador("#credencial_discapacidad","#credencial_vencimiento");

    //Activa o deshabilita porcentaje registro social segun seleccion anterior
    activador("#registro_social_hogares","#registro_social_porcentaje");

    //Rellena el vencimiento de la credencial
    rellenarFecha("#credencial_vencimiento", "min", function() {
        rellenarFecha("#fecha_nacimiento", "max");
    });


    /**
     * Acciones al cambiar al step siguiente o al anterior
     */
    $('#formulario-registro').validator();

    $('#myWizard').wizard().on('actionclicked.fu.wizard', function(e, data) {

        //Acctiones del boton continuar en parte inferior
        if(data.step == "2" && data.direction == "next"){
            $("#continuar_btn_bottom").html("Finalizar <i class='fa fa-arrow-right'></i>");
        } else{
            $("#continuar_btn_bottom").html("Continuar <i class='fa fa-arrow-right'></i>");
        }

        var hasErrors = $('#formulario-registro').validator('validate').has('.has-error').length;
        if (hasErrors) e.preventDefault();

    }).on('finished.fu.wizard', function(e) {
        var hasErrors = $('#formulario-registro').validator('validate').has('.has-error').length;
        if (hasErrors) e.preventDefault();
        if (hasErrors == 0) {

            //Confirmacion Nombre
            $('#nombre_confirmation').html($("#nombres").val() + " " + $("#apellidos").val());

            //Confirmacion Rut
            $('#rut_confirmation').html($("#rut").val());

            //Confirmacion Sexo

            if ($("#sexo").is(":checked"))
            {
                $('#sexo_confirmation').html("Masculino");
            }else {
                $('#sexo_confirmation').html("Femenino");
            }

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
            $('#nacionalidad_confirmation').html($("#id_pais option:selected").text());

            //Confirmacion Estado Civil
            $('#estado_civil_confirmation').html($("#estado_civil option:selected").text());

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
                $('#prevision_confirmation').html($("#prevision option:selected").text());
            }

            //Confirmacion Nivel Educacional
            $('#nivel_educacional_confirmation').html($("#nivel_educacional option:selected").text());

            //Confirmacion Ocupacion
            $('#ocupacion_confirmation').html($("#ocupacion option:selected").text());

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
            $('#dependencia_confirmation').html($("#dependencia option:selected").text());

            //Confirmacion Cuidado de Terceros
            if ($("#cuidados").is(":checked"))
            {
                $('#cuidados_confirmation').html("Si");
            }else {
                $('#cuidados_confirmation').html("No");
            }

            //Confirmacion Plan de Rehabilitacion
            if($("#p_reha_trat_ctrl").val()){
                $('#plan_confirmation').html($("#p_reha_trat_ctrl").val());
            } else {
                $('#plan_confirmation').html("-");
            }

            //Confirmacion Sistema de Salud
            if ($("#sistema_salud").is(":checked"))
            {
                $('#salud_confirmation').html("Fonasa - " + $("#sistemaSaludSelec option:selected").text());
            }else {
                $('#salud_confirmation').html("Isapre - " + $("#sistemaSaludSelec option:selected").text());
            }

            //Confirmacion Beneficios
            $('#beneficios_confirmation').html($("#beneficios option:selected").text());

            //Confirmacion Beneficios
            $('#beneficios_confirmation').html($("#beneficios option:selected").text());

            //Confirmacion Sistema de Proteccion
            $('#proteccion_confirmation').html($("#sistema_proteccion option:selected").text());

            //Confirmacion Participacion en Organizaciones Sociales
            $('#organizaciones_confirmation').html($("#organizaciones_sociales option:selected").text());

            $('#confirmation').modal('show');
        }
    });


    /**
     * Credencial de discapacidad, si es si, activa vencimiento y lo pone requerido,
     * si no, lo bloquea.
     */
    $("#credencial_discapacidad").change(function() {
        activador("#credencial_discapacidad","#credencial_vencimiento");
    });

    /**
     * Registro Social de Hogares, si es si, activa porcentaje y lo pone requerido,
     * si no, lo bloquea.
     */
    $("#registro_social_hogares").change(function() {
        activador("#registro_social_hogares","#registro_social_porcentaje");
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
     * Funcion que habilita o deshabilita la fecha de la credencial segun seleccion anterior
     */
    function activador(selector,inputDependiente){

        //Si se ha seleccionado si
        if ($(selector).val() == 1) {
            $(inputDependiente).prop('required', true);
            $(inputDependiente).removeAttr('disabled');
        }

        //Si se ha seleccionado en tramite o no
        if ($(selector).val() == 0 || $(selector).val() == 2) {
            $(inputDependiente).removeAttr('required');
            $(inputDependiente).val("");
            $(inputDependiente).prop('disabled', true);
        }

        actualizarValidador();
    }

    /**
     * Beneficios tipo tags
     */
    $(".select-tag").select2({
      tags: true
    });

    $(".select-nomore").select2();

    /**
     * Estilos para select del tema
     */
    $(".select2-selection").addClass("capitalize");
    $(".select2-search").css("width","100%");
    $(".select2-search__field").css("width","100%");



    /**
     * Funciona que rellena los campos de fecha
     */
    function rellenarFecha(input, restriccionFecha, callback){
        //Rellena la fecha de nacimiento

        var valueDate = $(input).attr('value-date');

        var options = {
            format: "DD/MM/YYYY",
            icons: {
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right'
            },
            viewMode: 'years',
            locale: 'es'
        }

        if(restriccionFecha == "max") {
            options.maxDate = "now";
        } else if(restriccionFecha == "min") {
            options.minDate = "now"
        }

        if(valueDate != ""){



            if(valueDate.includes("/")) {
                valueDateArr = valueDate.split(/\//);
                // TODO: Algo extranio pasa aca
                valueDate = valueDateArr[2]  + "-" + valueDate[3]+valueDate[4] + "-" + valueDate[0] + valueDate[1];
            }

            options.date = new Date(valueDate);
        }

         $(input).datetimepicker(options);

        if(callback && typeof callback == "function"){
            callback();
        }
    }
});
