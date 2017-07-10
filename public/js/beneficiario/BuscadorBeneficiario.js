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
                var cardData = '<div class="card col-xs-12 col-md-6 col-lg-4 card-frame">' +
                    '<img class="card-img-top" src="http://placehold.it/230x230&text=Photo" alt="Card image cap">' +
                    '<div class="card-block">' +
                    '<h4 class="card-title capitalize">' + element.nombre + ' ' + element.apellido + '</h4>' +
                    '<p class="card-text">' + element.rut + '</p>' +
                    '<form method="GET" action="/beneficiario/informacion/'+ element.id +'">' +
                    '<button style="margin-bottom:10px" class="btn btn-primary" type="submit"> Perfil del Beneficiario </button>' +
                    '</form>' +
                    '</div>' +
                    '</div>';
                $(cardData).appendTo('#listaBeneficiario').fadeIn('normal');
            });
        }

    }

});
