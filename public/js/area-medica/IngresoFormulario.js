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
            $('#formulario_registro').submit();
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
