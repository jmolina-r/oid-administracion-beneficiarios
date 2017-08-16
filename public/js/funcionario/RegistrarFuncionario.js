$(document).ready(function() {
    $(".select-tag").select2();

    rellenarFecha("#fecha_nacimiento", "max");

    /**
     * Funciona que rellena los campos de fecha
     */
    function rellenarFecha(input, restriccionFecha, callback){
        //Rellena la fecha de nacimiento

        var valueDate = $(input).attr('value-date');

        var options = {
            format: "DD/MM/YYYY",
            icons: {
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right'
            },
            viewMode: 'years',
            locale: 'es'
        }

        if(restriccionFecha == "max") {
            options.maxDate = "now";
        } else if(restriccionFecha == "min") {
            options.minDate = "now"
        }

        if(valueDate != ""){



            if(valueDate.includes("/")) {
                valueDateArr = valueDate.split(/\//);
                // TODO: Algo extranio pasa aca
                valueDate = valueDateArr[2]  + "-" + valueDate[3]+valueDate[4] + "-" + valueDate[0] + valueDate[1];
            }

            options.date = new Date(valueDate);
        }

         $(input).datetimepicker(options);

        if(callback && typeof callback == "function"){
            callback();
        }
    }
});
