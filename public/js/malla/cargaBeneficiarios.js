$(document).ready(function () {

    var beneficiario;
    var listaBeneficiarios = [];
    var listaRut = [];
    $('#btn-agregar-beneficiario').click(function () {

        var rut = $('#rut').val();
        var entontrado = true;
        // beneficiario por medio del rut.
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: false,
            url: "/malla/getnombre",
            type: "GET",
            data: {
                rutBuscado: rut
            },
            success: function (data, textStatus, jqXHR) {
                beneficiario = $.parseJSON(data);
                //console.log(beneficiario);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Beneficiario no encontrado en el sistema.');
                entontrado = false;
            }
        });

        //validar tipo individual (solo un beneficiario)
        if (document.getElementById("Individual").checked && listaRut.length < 1 || document.getElementById("Grupal").checked) {
            //si se existe el beneficiario
            if (entontrado) {
                //validar que beneficiario no se encuetre duplicado
                if (!listaRut.includes(rut)) {
                    listaRut.push(rut);
                    //actualizar tabla
                    $('#tabla-beneficiarios > tbody:last-child').append('<tr>' +
                        '<td>' + beneficiario.nombre + ' ' + beneficiario.apellido + '</td>' +
                        '<td>' + rut + '</td>' +
                        '<td>' + '<button id = "eliminar-beneficiario" type="button" class="delbtn"' + '>Eliminar</button>' + '</td>' +
                        '</tr>');

                    //agregar a la lista de beneficiarios guardados
                    var rowData = [{
                        'id_beneficiario': beneficiario.id,
                    }];
                    listaBeneficiarios.push(rowData);
                    console.log(listaRut);

                } else {
                    alert('El Beneficiario ya se encuentra agregado');
                }

            }
        }
        //limpia texbox rut
        $('#rut').val('');

        //boton eliminar
        $('button.delbtn').click(function () {
            //eliminar rut de la listaRut
            var rutSeleccionado = $(this).parent().parents("tr").find('td:first').text();
            listaRut.splice(listaRut.indexOf(rutSeleccionado), 1);
            //eliminar fila de la tabla
            $(this).parent().parents("tr").remove();

        });

    });


});