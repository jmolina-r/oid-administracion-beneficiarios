$(document).ready(function() {

    $('#submitFuncionario').click(function(e) {
        e.preventDefault()

        // Fill Modal
        $('#funcionarioNombre').html($('#nombre').val() + ' ' + $('#apellido').val());
        $('#funcionarioRut').html($('#rut').val());
        $('#funcionarioTelefono').html($('#telefono').val());
        $('#funcionarioDireccion').html($('#direccion').val());
        $('#funcionarioFechaNacimiento').html($('#fecha_nacimiento').val());
        $('#funcionarioEmail').html($('#emailFuncionario').val());
        $('#funcionarioTipo').html($('#tipo_funcionario').find(":selected").text());

        $('#confirmationFuncionarioModal').modal('show');
    })

    $('#aceptarFuncionarioBtn').click(function() {
        $('#saveFuncionarioForm').submit()
    })

    $(".select-tag").select2()

    rellenarFecha("#fecha_nacimiento", "max")


    /**
     * Funcion que rellena los campos de fecha
     */
    function rellenarFecha(input, restriccionFecha, callback) {

        var valueDate = $(input).attr('value-date')

        var options = {
            format: "DD/MM/YYYY",
            icons: {
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right'
            },
            viewMode: 'years',
            locale: 'es'
        }

        if (restriccionFecha == "max") {
            options.maxDate = "now"
        } else if (restriccionFecha == "min") {
            options.minDate = "now"
        }

        if (valueDate != "") {
            if (valueDate.includes("/")) {
                valueDateArr = valueDate.split(/\//)
                // TODO: Algo extranio pasa aca
                valueDate = valueDateArr[2] + "-" + valueDate[3] + valueDate[4] + "-" + valueDate[0] + valueDate[1]
            }

            options.date = new Date(valueDate)
        }

        $(input).datetimepicker(options)

        if (callback && typeof callback == "function") {
            callback()
        }
    }
});
