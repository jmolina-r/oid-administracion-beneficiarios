/**
 * Created by lfgut on 03-07-2017.
 */

$('#formulario_registro').on("submit", function() {
    alert("HINT");

    var enfermedadesPrenatal = "";
    var complicacionesParto = "";

    if($('#check_rubeola').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "rubeola ";
    }

    if($('#check_diabetes').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "diabetes ";
    }

    if($('#check_renal').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "renal ";
    }

    if($('#check_hiper').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "hipertensión ";
    }

    if($('#check_nutri').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "nutricionales ";
    }

    if($('#check_trauma').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "traumatismos ";
    }

    if($('#check_vene').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "venéreas ";
    }

    if($('#check_infecciones').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "infecciones ";
    }

    if($('#check_asfixia').is(':checked')){
        complicacionesParto = complicacionesParto + "asfixia-perinatal ";
    }

    if($('#check_neumo').is(':checked')){
        complicacionesParto = complicacionesParto + "neumonia-infecciosa ";
    }

    if($('#check_trauma_peri').is(':checked')){
        complicacionesParto = complicacionesParto + "traumatismos ";
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/area-medica/ficha-evaluacion-inicial/fonoaudiologia/postfono",
        type: "POST",
        data: {
            //step 2
            planificacionEmbarazo: $('#planificacion_embarazo').val(),
            aceptacionEmbarazo: $('#aceptacion_embarazo').val(),
            controlEmbarazo: $('#control_embarazo').val(),
            ingestaMedicamentos: $('#ingesta_medicamentos').val(),
            ingestaAlcoholDrogas: $('#ingesta_alcohol_drogas').val(),
            consumoCigarrillo: $('#consumo_cigarrillo').val(),
            estadoEmocional: $('#estado_emocional').val(),
            enfermedadesEmbarazo: enfermedadesPrenatal,
            otrosPrenatal: $('#otros_prenatal').val(),

            //step 3
            tipoParto: $('#tipo_parto').val(),
            sufrimientoFatal: $('#sufrimiento_fetal').val(),
            edadGestacional: $('#edad_gestacional').val(),
            lugarNacimiento: $('#lugar_nacimiento').val(),
            peso: $('#peso').val(),
            talla: $('#talla').val(),
            apgar: $('#apgar').val(),
            complicaciones: complicacionesParto

            //step 4



        },
        success: function(data, textStatus, jqXHR) {
            alert(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
});

