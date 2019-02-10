$(document).ready(function () {

    var beneficiario;
    var listaId = [];


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
                entontrado = false;
            }
        });

        //validar tipo individual (solo un beneficiario)
        if (document.getElementById("Individual").checked && listaId.length < 1 || document.getElementById("Grupal").checked) {
            //si se existe el beneficiario
            if (entontrado) {
                //validar que beneficiario no se encuetre duplicado
                if (!listaId.includes(beneficiario.id)) {
                    listaId.push(beneficiario.id);
                    //actualizar tabla
                    $('#tabla-beneficiarios > tbody:last-child').append('<tr>' +
                        '<td style="display:none;">' + beneficiario.id + '</td>' +
                        '<td>' + beneficiario.nombre + ' ' + beneficiario.apellido + '</td>' +
                        '<td>' + rut + '</td>' +
                        '<td>' + '<button id ="eliminar-beneficiario" class="delbtn btn btn-danger" type="button"><span class="fa fa-remove"></span></button>' + '</td>' +
                        '</tr>');

                    console.log(listaId);

                } else {
                    alert('El Beneficiario ya se encuentra agregado.');
                }
            } else {
                alert('Beneficiario no encontrado en el sistema.');
            }
        } else {
            alert('La sesión individual solo permite agregar un beneficiario.');
        }
        //limpia texbox rut
        $('#rut').val('');

        //boton eliminar
        $('button.delbtn').click(function () {
            //eliminar rut de la listaId
            var idSeleccionado = $(this).parent().parents("tr").find('td:first').text();
            listaId.splice(listaId.indexOf(idSeleccionado), 1);
            //eliminar fila de la tabla
            $(this).parent().parents("tr").remove();

        });

    });


    //reset table al cambiar de grupal a individual
    document.getElementById('Individual').onchange = function () {
        var nodes = document.getElementById('tbody');
        nodes.innerHTML = '';
        listaId = [];
    };

    $('#btn-guardar').click(function () {

        //validar inscripcion grupal tenga 2 o mas beneficiarios seleccionados
        if (document.getElementById("Grupal").checked && listaId.length > 1 || document.getElementById("Individual").checked) {
            var respuesta = confirm("¿Seguro que desea guardar el registro en la agenda?");

            if (respuesta == false) {
                return;
            }

            var jsonBeneficiariosSeleccionados = [];

            $('#tabla-beneficiarios').find('tbody tr').each(function () {
                var obj = {},
                    $td = $(this).find('td'),
                    beneficiario_id = $td.eq(0).text(),
                    nombre = $td.eq(1).text();
                obj['beneficiario_id'] = beneficiario_id;
                obj['nombre'] = nombre;
                jsonBeneficiariosSeleccionados.push(obj);
                console.log(jsonBeneficiariosSeleccionados);
            });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/malla/store",
                data: {
                    id_funcionario: $('#id').val(),
                    fecha: $('#fecha').val(),
                    hora: $('#hora').val(),
                    cantSesiones: $('#cantSesiones').val(),
                    tipo: $("input[name='tipo']:checked").val(),
                    jsonBeneficiariosSeleccionados: jsonBeneficiariosSeleccionados,
                },
                type: "POST",
                success: function (data, textStatus, jqXHR) {
                    alert("Hora agendada correctamente. Volviendo a la malla.");
                    window.location.replace("/malla/show2/" + $('#id').val());
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Hubo un error, reintente");
                }
            });
        } else {
            alert("Las sesiones grupales deben tener 2 o más beneficiarios.");
        }

    });

    $('#btn-update').click(function () {

        var respuesta = confirm("¿Seguro que desea guardar el registro en la agenda?");

        if (respuesta == false) {
            return;
        }

        var jsonBeneficiarios = [];

        $('#tabla-beneficiarios').find('tbody tr').each(function () {
            var obj = {},
                $td = $(this).find('td'),
                beneficiario_id = $td.eq(0).text(),

                asistencia = $td.find('option:selected').eq(0).val();
                if (asistencia =="Presente"){
                    prestacion = $td.find('option:selected').eq(1).val();
                }else{
                    prestacion = null;
                }

            //console.log('prestacion : ' + prestacion);
            obj['beneficiario_id'] = beneficiario_id;
            obj['asistencia'] = asistencia;
            obj['prestacion'] = prestacion;
            jsonBeneficiarios.push(obj);
            console.log(jsonBeneficiarios);
        });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/malla/update",
            data: {
                id_hora_agendada: $('#id').val(),
                jsonBeneficiarios: jsonBeneficiarios,
            },
            type: "POST",
            success: function (data, textStatus, jqXHR) {
                alert("Datos registrados correctamente. Volviendo a la malla.");
                window.location.replace("/malla/show2/" + $('#user_id').val()); //arreglar
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Hubo un error, reintente");
            }
        });

    });

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
                idHora: $('#id').val()
            },
            success: function (data, textStatus, jqXHR) {
                alert('La hora agendada se ha eliminado correctamente.');
                window.location.replace("/malla/show2/" + $('#user_id').val());
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Hubo un error al eliminar la hora. Reintente.');
            }
        });

    }

    document.getElementById("btn-atras").onclick = function () {
        window.location.replace("/malla/show2/" + $('#user_id').val());
    }




});