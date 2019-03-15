$(document).ready(function () {


    var url = $(location).attr('href'),
        parts = url.split("/"),
        idHoraAgendada = parts[parts.length-1];

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/registro_prestacion/getnombrecompleto",
        dataType: "text",
        data: {
            id: idHoraAgendada
        },
        type: "POST",
        success: function(data, textStatus, jqXHR) {
            $('#paciente-actual').val(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Hubo un error, reintente");
        }
    });

    $('#boton-finalizar').click(function () {

        var respuesta = confirm("¿Seguro que desea finalizar el registro de inasistencia?");

        if(respuesta == false){
            return;
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/registro_prestacion/storeinasistencia",
            data: {
                id: idHoraAgendada,
                comentario: $('#text_inasistencia').val()
            },
            type: "POST",
            success: function(data, textStatus, jqXHR) {
                alert("Inasistencia registrada correctamente. Volviendo a la malla.");
                window.location.replace("/malla/show");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Hubo un error, reintente");
            }
        });

    });



});
