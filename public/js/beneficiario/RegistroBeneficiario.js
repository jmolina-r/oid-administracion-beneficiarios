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


$( "#target" ).keyup(function() {
  alert( "Handler for .keyup() called." );
});