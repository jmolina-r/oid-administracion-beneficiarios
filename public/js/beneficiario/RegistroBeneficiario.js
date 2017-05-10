/**
 * Created by Alfredo Viccenzo on 09-05-2017.
 */

//$('#formulario-registro').validator();

$('#myWizard').wizard().on('actionclicked.fu.wizard', function (e, data) {

    if (data.direction === 'previous') {
        // Do nothing if you're going to the previous step
        return;
    }
    // var hasErrors = $('#formulario-registro').validator('validate').has('.has-error').length;
    // if(hasErrors) e.preventDefault();

}).on('finished.fu.wizard', function(e) {
    alert('salir');
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