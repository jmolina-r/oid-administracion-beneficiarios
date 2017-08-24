<template>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='box'>
                <div class='box-content box-padding'>
                    <div class="container">
                        <div class='col-md-12 form-group'>
                            <label class='control-label' for='inputBuscador'>Ingrese beneficiario</label>
                            <div class='controls'>
                                <input class='form-control' id='inputBuscador' placeholder='Ingrese nombre, apellido o rut' type='text' maxlength="200">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class='box bordered-box green-border' style='margin-bottom:0;'>
                                <div class='box-content box-no-padding'>
                                    <div class='responsive-table'>
                                        <table class='table table-bordered table-hover table-striped' style='margin-bottom:0;'>
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Nombre
                                                    </th>
                                                    <th>
                                                        Rut
                                                    </th>
                                                    <th>
                                                        Género
                                                    </th>
                                                    <th>
                                                        Registrado
                                                    </th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="listaBeneficiario">
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        No hay datos para mostrar.
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

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
                                "<i class='fa fa-heart'></i>" +
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

export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style lang="css">
</style>
