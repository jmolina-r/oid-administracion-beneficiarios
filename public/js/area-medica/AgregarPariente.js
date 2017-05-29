/**
 * Created by lfgut on 25-05-2017.
 */

$('#boton-agregar-pariente').click(function() {

    $('#ocupacion').val("aaaa");

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/area-medica/ficha-evaluacion-inicial/fonoaudiologia/agregarpariente",
        type: "POST",
        data: {
            nombre: $('#nombre').val(),
            parentesco: $('#parentesco').val(),
            edad: $('#edad').val(),
            escolaridad: $('#escolaridad').val(),
            ocupacion: $('#ocupacion').val()
        },
        success: function(data, textStatus, jqXHR) {
            $('#ocupacion').val("bbbbbb");
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });




});
