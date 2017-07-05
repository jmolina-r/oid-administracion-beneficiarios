$(document).ready(function() {

    //Activa o deshabilita vencimiento credencial segun seleccion anterior
    activadorVencimientoCredencial($("#credencial_discapacidad"));

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
            $('#formulario-registro').submit();
        }
    });


    /**
     * Credencial de discapacidad, si es si, activa vencimiento y lo pone requerido,
     * si no, lo bloquea.
     */
    $("#credencial_discapacidad").change(function() {
        activadorVencimientoCredencial();
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
     * Funcion que habilita o deshabilita la fecha de la credencial segun seleccion anterior
     */
    function activadorVencimientoCredencial(){
        console.log($("#credencial_discapacidad").val());

        //Si se ha seleccionado si
        if ($("#credencial_discapacidad").val() == 1) {
            $("#credencial_vencimiento").prop('required', true);
            $('#credencial_vencimiento').removeAttr('disabled');
        }

        //Si se ha seleccionado en tramite o no
        if ($("#credencial_discapacidad").val() == 0 || $("#credencial_discapacidad").val() == 2) {
            $('#credencial_vencimiento').removeAttr('required');
            $('#credencial_vencimiento').val("");
            $("#credencial_vencimiento").prop('disabled', true);
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
        $('#credencial_venc').datetimepicker({
            minDate:"now",
            format: "DD/MM/YYYY",
            icons: {
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right'
            }
        });
    });

    $('#credencial_venc').datetimepicker({
        format: "DD/MM/YYYY",
        date: new Date("2015-03-23")
    });
});