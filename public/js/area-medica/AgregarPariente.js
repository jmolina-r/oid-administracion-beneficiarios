/**
 * Created by lfgut on 25-05-2017.
 */

$('#boton-agregar-pariente').click(function() {

    if(!$('#nombre').val() || !$('#parentesco').val()){
        alert("Los campos 'Nombre' y 'Parentesco' son obligatorios");
        return;
    }

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
            var objetoAgregar = $.parseJSON(data);

            $('#tabla-parientes > tbody:last-child').append('<tr><td>'+
                objetoAgregar.nombre + '</td><td>' +
                objetoAgregar.parentesco + '</td><td>' +
                objetoAgregar.edad + '</td><td>' +
                objetoAgregar.escolaridad + '</td><td>' +
                objetoAgregar.ocupacion+'</td></tr>');

            $('#nombre').val('')
            $('#parentesco').val('')
            $('#edad').val('')
            $('#escolaridad').val('')
            $('#ocupacion').val('')

        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });




});