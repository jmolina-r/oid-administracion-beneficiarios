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
     * Funcion que permite actualizar el validador y requiera los campos necesarios
     */
    function actualizarValidador() {
        //Actualizar el validador del formulario
        $('#formulario-registro').validator("destroy");
        $('#formulario-registro').validator();
    }






});
