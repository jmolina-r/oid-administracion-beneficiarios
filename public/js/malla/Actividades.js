$(document).ready(function () {

    document.getElementById("btn-delete").onclick = function () {
        var respuesta = confirm("¿Seguro que desea eliminar el registro de la malla?");

        if (respuesta == false) {
            return;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: false,
            url: "/malla/destroy",
            type: "POST",
            data: {
                idHora: $('#id_hora_agendada').val()
            },
            success: function (data, textStatus, jqXHR) {
                alert('La hora agendada se ha eliminado correctamente.');
                window.location.replace("/malla/show2/" + $('#id').val());
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Hubo un error al eliminar la hora. Reintente.');
            }
        });

    }

    $('#btn-update').click(function () {

        var respuesta = confirm("¿Seguro que desea actualizar el registro en la agenda?");

        if (respuesta == false) {
            return;
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/malla/update",
            data: {
                id_hora_agendada: $('#id_hora_agendada').val(),
                descripcion: $('#actividad').val(),
            },
            type: "POST",
            success: function (data, textStatus, jqXHR) {
                alert("Datos registrados correctamente. Volviendo a la malla.");
                window.location.replace("/malla/show2/" + $('#id').val());
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Hubo un error, reintente");
            }
        });

    });

    document.getElementById("btn-atras").onclick = function () {
        console.log($('#id').val());
        window.location.replace("/malla/show2/" + $('#id').val());
    }

});
