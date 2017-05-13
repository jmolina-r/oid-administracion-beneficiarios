/**
 * Created by Alfredo Viccenzo on 09-05-2017.
 */


/**
 * Acciones al cambiar al step siguiente o al anterior
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


/**
 * Credencial de discapacidad, si es si, activa vencimiento y lo pone requerido,
 * si no, lo bloquea.
 */
$( "#credencial_discapacidad").change(function() {
  //Si se ha seleccionado si
  if (this.value==1) {
    $( "#credencial_vencimiento").prop('required',true);
  }

  //Si se ha seleccionado en tramite o no
  if (this.value==0 || this.value==2){
    $('#credencial_vencimiento').removeAttr('required');
  }

  //Actualizar el validador del formulario
  $("#formulario-registro").validator('update');

});

/**
 * Registro Social de Hogares, si es si, activa porcentaje y lo pone requerido,
 * si no, lo bloquea.
 */
$( "#registro_social_hogares").change(function() {
  //Si se ha seleccionado si
  if (this.value==1) {
    $( "#registro_social_porcentaje").prop('required',true);
  }

  //Si se ha seleccionado en tramite o no
  if (this.value==0 || this.value==2){
    $('#registro_social_porcentaje').removeAttr('required');
  }

  //Actualizar el validador del formulario
  $("#formulario-registro").validator('update');
  
});

