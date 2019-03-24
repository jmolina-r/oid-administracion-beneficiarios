$(document).ready(function() {
    /**
     * Acciones al cambiar al step siguiente o al anterior
     */

    $('#formulario-registro').validator();

    //$('#continuar_btn').onclick(function () {
        //calcular total bruto por test
        //calcular total bruto general
    //});

    $('#myWizard').wizard().on('actionclicked.fu.wizard', function(e, data) {
        var hasErrors = $('#formulario_registro').validator('validate').has('.has-error').length;
        //if (hasErrors) e.preventDefault();

    }).on('finished.fu.wizard', function(e) {
        var hasErrors = $('#formulario_registro').validator('validate').has('.has-error').length;
        if (hasErrors) e.preventDefault();
        if (hasErrors == 0) {


            //$('#nombre_taller_confirmation').html($("#nombre_taller").val());

            $('#confirmation').modal('show');
        }
    });


});