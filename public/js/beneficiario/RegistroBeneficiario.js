/**
 * Created by Alfredo Viccenzo on 09-05-2017.
 */

var validator = $("#formulario-registro").validate({
    rules: {
        nombres: {
            required: true,
            lettersonly: true
        },
        apellidos: {
            required: true,
            lettersonly: true
        },
        email: {
            required: true,
            email: true
        }
    },
    messages: {
        nombres: {
            required: 'Debe ingresar un nombre.',
            lettersonly: 'Solo debe ingresar letras.'
        },
        apellidos: {
            required: 'Debe ingresar ambos apellidos.',
            lettersonly: 'Solo debe ingresar letras.'
        },
        email: {
            required: 'Debe ingresar una dirección e-mail.',
            email: 'Por favor ingrese una dirección válida.'
        }
    }
});

$('#myWizard').on('actionclicked.fu.wizard', function (e, data) {
    if (data.direction === 'previous') {
        // Do nothing if you're going to the previous step
        return;
    }


	$.validator.addMethod("buga", (function(value) {
      return value === "buga";
    }), "Please enter \"buga\"!");

    $.validator.methods.equal = function(value, element, param) {
      return value === param;
    };


}).on('finished.fu.wizard', function(e) {
    // Mandar el formulario
});