/**
 * Created by Alfredo Viccenzo on 09-05-2017.
 */
$('#formulario-registro').validator();

$('#myWizard').wizard().on('actionclicked.fu.wizard', function (e, data) {
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