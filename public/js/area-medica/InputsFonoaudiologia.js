/**
 * Created by lfgut on 21-06-2017.
 */

$('#radio_lactancia').click(function () {
    $('#text_lactancia').removeAttr("disabled");
});

$('#radio_relleno').click(function () {
    $('#text_lactancia').attr("disabled","disabled");
    $('#text_lactancia').val("");
});

$('#radio_mixta').click(function () {
    $('#text_lactancia').attr("disabled","disabled");
    $('#text_lactancia').val("");
});

$('#morb_alergia_si').click(function () {
    $('#des_trat1').removeAttr("disabled");
});

$('#morb_alergia_no').click(function () {
    $('#des_trat1').attr("disabled","disabled");
    $('#des_trat1').val("");
});

$('#morb_oti_si').click(function () {
    $('#des_trat2').removeAttr("disabled");
});

$('#morb_oti_n').click(function () {
    $('#des_trat2').attr("disabled","disabled");
    $('#des_trat2').val("");
});

$('#morb_obe_si').click(function () {
    $('#des_trat3').removeAttr("disabled");
});

$('#morb_obe_no').click(function () {
    $('#des_trat3').attr("disabled","disabled");
    $('#des_trat3').val("");
});

$('#morb_dia_si').click(function () {
    $('#des_trat4').removeAttr("disabled");
});

$('#morb_dia_no').click(function () {
    $('#des_trat4').attr("disabled","disabled");
    $('#des_trat4').val("");
});

$('#morb_cir_si').click(function () {
    $('#des_trat5').removeAttr("disabled");
});

$('#morb_cir_no').click(function () {
    $('#des_trat5').attr("disabled","disabled");
    $('#des_trat5').val("");
});

$('#morb_tra_si').click(function () {
    $('#des_trat6').removeAttr("disabled");
});

$('#morb_tra_no').click(function () {
    $('#des_trat6').attr("disabled","disabled");
    $('#des_trat6').val("");
});

$('#morb_epi_si').click(function () {
    $('#des_trat7').removeAttr("disabled");
});

$('#morb_epi_no').click(function () {
    $('#des_trat7').attr("disabled","disabled");
    $('#des_trat7').val("");
});

$('#morb_vis_si').click(function () {
    $('#des_trat8').removeAttr("disabled");
});

$('#morb_vis_no').click(function () {
    $('#des_trat8').attr("disabled","disabled");
    $('#des_trat8').val("");
});

$('#morb_aud_si').click(function () {
    $('#des_trat9').removeAttr("disabled");
});

$('#morb_aud_no').click(function () {
    $('#des_trat9').attr("disabled","disabled");
    $('#des_trat9').val("");
});

$('#morb_par_si').click(function () {
    $('#des_trat10').removeAttr("disabled");
});

$('#morb_par_no').click(function () {
    $('#des_trat10').attr("disabled","disabled");
    $('#des_trat10').val("");
});