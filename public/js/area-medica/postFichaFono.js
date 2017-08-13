$('#formulario_registro').on("submit", function() {

    var enfermedadesPrenatal = "";
    var complicacionesParto = "";

    if($('#check_rubeola').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "Rubeola ";
    }

    if($('#check_diabetes').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "Diabetes ";
    }

    if($('#check_renal').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "Renal ";
    }

    if($('#check_hiper').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "Hipertensión ";
    }

    if($('#check_nutri').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "Nutricionales ";
    }

    if($('#check_trauma').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "Traumatismos ";
    }

    if($('#check_vene').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "Venéreas ";
    }

    if($('#check_infecciones').is(':checked')){
        enfermedadesPrenatal = enfermedadesPrenatal + "Infecciones ";
    }

    if($('#check_asfixia').is(':checked')){
        complicacionesParto = complicacionesParto + "Asfixia-perinatal ";
    }

    if($('#check_neumo').is(':checked')){
        complicacionesParto = complicacionesParto + "Neumonia-infecciosa ";
    }

    if($('#check_trauma_peri').is(':checked')){
        complicacionesParto = complicacionesParto + "Traumatismos ";
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/area-medica/ficha-evaluacion-inicial/fonoaudiologia/postFono",
        type: "POST",
        data: {
            //step 2
            planificacionEmbarazo: $('#plan_embarazo').val(),
            aceptacionEmbarazo: $('#acept_embarazo').val(),
            controlEmbarazo: $('#control_embarazo').val(),
            ingestaMedicamentos: $('#ingesta_med').val(),
            ingestaAlcoholDrogas: $('#ingesta_oh_drogas').val(),
            consumoCigarrillo: $('#consumo_cigarrillo').val(),
            estadoEmocional: $('#estado_emocional').val(),
            enfermedadesEmbarazo: enfermedadesPrenatal,
            otrosPrenatal: $('#otros_prenatales').val(),

            //step 3
            tipoParto: $('#tipo_parto').val(),
            sufrimientoFatal: $('#suf_fetal').val(),
            edadGestacional: $('#edad_gest').val(),
            lugarNacimiento: $('#lugar_naci').val(),
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
