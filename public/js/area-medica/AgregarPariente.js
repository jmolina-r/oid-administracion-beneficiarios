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
                objetoAgregar.ocupacion + '</td><td>' +
                '<button id = "eliminar-pariente" type="button" class="delbtn"' + '>Eliminar</button>' + '</td></tr>');


            $('#nombre').val('')
            $('#parentesco').val('')
            $('#edad').val('')
            $('#escolaridad').val('')
            $('#ocupacion').val('')

            $('button.delbtn').click(function(){
                $(this).parent().parents("tr").remove()
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });

});
