$(document).ready(function() {

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
        var hasErrors = $('#formulario-registro').validator('validate').has('.has-error').length;
        if (hasErrors) e.preventDefault();

    }).on('finished.fu.wizard', function(e) {
        var hasErrors = $('#formulario-registro').validator('validate').has('.has-error').length;
        if (hasErrors) e.preventDefault();
        if (hasErrors == 0) {

            $('#nombre').html($("#nombres").val() + " " + $("#apellidos").val());
            $('#rut').html($("#rut").val());
            $('#sexo').html($("#sexo").val());
            $('#domicilio').html($("#domicilio_calle").val() + " " + $("#domicilio_numero").val() + " " + $("#domicilio_block").val() + " " + $("#domicilio_numero_dpto").val() + " " + $("#domicilio_poblacion").val());

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
            viewMode: 'years'
        }

        if(restriccionFecha == "max") {
            options.maxDate = "now";
        } else if(restriccionFecha == "min") {
            options.minDate = "now"
        }

        if(valueDate != ""){

            console.log(valueDate);


            if(valueDate.includes("/")) {
                valueDateArr = valueDate.split(/\//);
                // TODO: Algo extranio pasa aca
                valueDate = valueDateArr[2]  + "-" + valueDate[3]+valueDate[4] + "-" + valueDate[0] + valueDate[1];
            }
            console.log(valueDate);

            options.date = new Date(valueDate);
            console.log(options.date);
        }

         $(input).datetimepicker(options);

        if(callback && typeof callback == "function"){
            callback();
        }
    }
});
