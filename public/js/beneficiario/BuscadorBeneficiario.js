$(document).ready(function() {

    $("#inputBuscador").on('keyup', function() {
        $('#listaBeneficiario').html('<tr><td><i class="fa fa-spinner fa-spin"></i> <b>Cargando...</b></td><td></td><td></td><td></td></tr>');
        if ($(this).val().length < 1 || $(this).val() == "" || $(this).val() == " ") {
            $("#listaBeneficiario").html("<tr><td>No hay datos para mostrar.</td></td><td></td><td></td><td></td></tr>");
            return;
        }
        getBeneficiariosLikeNombre($(this).val());
    });


    function getBeneficiariosLikeNombre(query) {
        $.ajax({
            type: 'GET',
            url: '/beneficiario/buscar-json/',
            data: {
                query: query
            },
            beforeSend: function() {
                // this is where we append a loading image
                $('#progress').removeClass('hidden');
            },
            success: function(res) {
                addBeneficiarioToCard(res.beneficiarios)
            },
            complete: function() {
                $('#progress').addClass('hidden');
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function addBeneficiarioToCard(beneficiarios) {
        if (beneficiarios && beneficiarios.length > 0) {
            $("#listaBeneficiario").empty();
            beneficiarios.forEach(function(element) {
                var cardData =
                "<tr>" +
                    "<td class='capitalize'>" + element.id + "</td>" +
                    "<td class='capitalize'>" + element.nombre + " " + element.apellido + "</td>" +
                    "<td>" + element.rut + "</td>" +
                    "<td class='capitalize'>" + element.sexo + "</td>" +
                    "<td>" + convertDate(element.created_at) + "</td>" +
                    "<td>" +
                        "<div class='text-right'>" +
                            "<a class='btn btn-warning btn-xs' href='/area-medica/ficha-evaluacion-inicial/fichas/listaFichas/" + element.id + "'>" +
                                "<i class='fa fa-files-o'></i>" +
                            "</a>" +
                            "<a class='btn btn-primary btn-xs' href='/beneficiario/informacion/" + element.id + "'>" +
                                "<i class='fa fa-user'></i>" +
                            "</a>" +
                            "<a class='btn btn-warning btn-xs' href='/beneficiario/editar/" + element.id + "'>" +
                                "<i class='fa fa-pencil-square-o'></i>" +
                            "</a>" +
                        "</div>" +
                    "</td>" +
                "</tr>";
                $(cardData).appendTo('#listaBeneficiario').fadeIn('normal');
            });
        } else {
            $("#listaBeneficiario").html("<tr><td>Beneficiario no encontrado.</td></td><td></td><td></td><td></td></tr>");
        }
    }
});

function convertDate(inputFormat) {
    function pad(s) {
        return (s < 10) ? '0' + s : s;
    }
    var d = new Date(inputFormat);
    return [pad(d.getDate() + 1), pad(d.getMonth() + 1), d.getFullYear()].join('/');
}
