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

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/registro_prestacion/getarea",
        dataType: "text",
        type: "POST",
        success: function(data, textStatus, jqXHR) {
            $('#area').val(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Hubo un error, reintente");
        }
    });

    $('#boton-agregar-prestacion').click(function () {

        var texto = $('#combo-prestacion option:selected').text();
        var resultado = texto.split("-");

        $('#tabla-prestaciones > tbody:last-child').append('<tr><td>'+
            resultado[0] + '</td><td>' +
            resultado[1] + '</td><td>' +
            '<button id = "eliminar-prestacion" type="button" class="delbtn"' + '>Eliminar</button>' + '</td></tr>');

        $('button.delbtn').click(function(){
            $(this).parent().parents("tr").remove()
        });

    });

    $('#boton-finalizar').click(function () {

        var respuesta = confirm("¿Seguro que desea finalizar el registro de prestaciones?");

        if(respuesta == false){
            return;
        }

        var jsonPrestacionesRealizadas = [];

        $('#tabla-prestaciones').find('tbody tr').each(function(){
            var obj = {},
                $td = $(this).find('td'),
                id = $td.eq(0).text(),
                nombre = $td.eq(1).text();
            obj['id'] = id;
            obj['nombre'] = nombre;
            jsonPrestacionesRealizadas.push(obj);
        });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/registro_prestacion/storeprestaciones",
            data: {
                idHoraAgendada: idHoraAgendada,
                jsonPrestaciones: jsonPrestacionesRealizadas
            },
            type: "POST",
            success: function(data, textStatus, jqXHR) {
                alert("Prestaciones registradas correctamente. Volviendo a la malla.");
                window.location.replace("/malla/show");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Hubo un error, reintente");
            }
        });

    });

});