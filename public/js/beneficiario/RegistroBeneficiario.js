/**
 * Created by Alfredo Viccenzo on 09-05-2017.
 */
 $("#sistemaSaludSelec input[type='radio']").change(function() {
     if(this.value == 'f') {
     } else if(this.value == 'i') {
     }
 });

$('#formulario-registro').validator();

$('#myWizard').wizard().on('actionclicked.fu.wizard', function (e, data) {
    alert('hola');
    if (data.direction === 'previous') {
        // Do nothing if you're going to the previous step
        return;
    }
    var hasErrors = $('#formulario-registro').validator('validate').has('.has-error').length;
    if(hasErrors) e.preventDefault();

}).on('finished.fu.wizard', function(e) {
    var hasErrors = $('#formulario-registro').validator('validate').has('.has-error').length;
    if(hasErrors) e.preventDefault();
    if(hasErrors==0){
        $('#formulario-registro').submit();
    }
});





// var validator = $("#formulario-registro").validate({
//     rules: {
//         nombres: {
//             required: true,
//             lettersonly: true
//         },
//         apellidos: {
//             required: true,
//             lettersonly: true
//         },
//         email: {
//             required: true,
//             email: true
//         },
//         rut: {
//             required: true
//         }
//     },
//     messages: {
//         nombres: {
//             required: 'Debe ingresar un nombre.',
//             lettersonly: 'Solo debe ingresar letras.'
//         },
//         apellidos: {
//             required: 'Debe ingresar ambos apellidos.',
//             lettersonly: 'Solo debe ingresar letras.'
//         },
//         email: {
//             required: 'Debe ingresar una dirección e-mail.',
//             email: 'Por favor ingrese una dirección válida.'
//         },
//         rut: {
//             required: 'Debe ingresar el rut.'
//         }
//     }
// });
