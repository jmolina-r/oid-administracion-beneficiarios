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
