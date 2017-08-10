$(document).ready(function() {

    $("#inputBuscador").on('input', function() {
        if ($(this).val() == "" || $(this).val() == " ") {
            $("#listaBeneficiario").empty();
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
        if (beneficiarios) {
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
        }

    }

});
