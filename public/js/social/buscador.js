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
                    "<td class='capitalize'>" + element.nombre + " " + element.apellido + "</td>" +
                    "<td>" + element.rut + "</td>" +
                    "<td class='capitalize'>" + element.sexo + "</td>" +
                    "<td>" + element.created_at + "</td>" +
                    "<td>" +
                        "<div class='text-right'>" +
                            "<a href='/areasocial/asistentesocial/showFichas/" + element.id + "'>" +
                                "<span class='badge badge-success'>Ver Ficha</span>" +
                            "</a>" +
                            "<a href='/areasocial/asistentesocial/ingresar/" + element.id +"'>" +
                                "<span class='badge badge-info'>Agregar Ficha</span>" +
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
