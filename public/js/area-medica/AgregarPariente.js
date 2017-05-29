/**
 * Created by lfgut on 25-05-2017.
 */

$('#boton-agregar-pariente').click( function () {

    $('#ocupacion').val("aaaa");

    $.post('/agregarpariente',

        {
            nombre: $('#nombre').val(),
            parentesco: $('#parentesco').val(),
            edad: $('#edad').val(),
            escolaridad: $('#escolaridad').val(),
            ocupacion: $('#ocupacion').val()
        },

        function () {
            $('#ocupacion').val("bbbbbb");
        }
        
    );


});