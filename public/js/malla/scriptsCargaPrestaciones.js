/**
 * Created by lfgut on 08-08-2017.
 */
$(document).ready(function () {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/registro_prestacion/getprestacionesprofesional",
        type: "POST",
        success: function(data, textStatus, jqXHR) {

            var arrayPrestaciones = JSON.parse(data);

            $.each(arrayPrestaciones, function(index, item) {
                $('#combo-prestacion').append(
                    $('<option></option>').val(item).html(item.id + "-" + item.nombre)
                );
            });

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Hubo un error, reintente");
        }
    });

});