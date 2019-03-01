$(document).ready(function() {
    /**
     * Acciones al cambiar al step siguiente o al anterior
     */


    $('#formularioAsistenciaSocial').submit(function(e) {
        e.preventDefault();
        //Confirmacion Patologías Concomitantes
        $('#mot_atent_confirmation').html("Ayudas");

        //Confirmacion Alergias
        var checkbox = document.getElementsByName('tipoAyudaSocial[]');
        var checkbox1 = document.getElementsByName('tipoAyudaSocialVer[]');
        var mostrarEspecifico = "";
        var ln = 0;
        for(var i=0; i< checkbox.length; i++) {
            if (checkbox[i].checked) {
                ln++;
                mostrarEspecifico += checkbox1[i].value;
                mostrarEspecifico += "<br>";
            }
        }
        $('#submot_atent_confirmation').html(mostrarEspecifico);

        //Confirmacion Observación
        var largo = $('#observacionAyuda').val().length;
        if(largo > 0){

            $('#obs_confirmation').html($("#observacionAyuda").val());

        }else{
            $('#obs_confirmation').html("Sin observación");
        }


        $('#confirmationformularioAsistenciaSocial').modal('show');
    });

    $('#formularioAsistenciaSocial2').submit(function(e) {
        e.preventDefault();

        //Confirmacion Patologías Concomitantes
        $('#mot_atent_confirmation2').html("Orientación");

        //Confirmacion Alergias
        var checkbox = document.getElementsByName('inputSubMotivo[]');
        var checkbox1 = document.getElementsByName('inputSubMotivoVer[]');
        var mostrarEspecifico = "";
        var ln = 0;
        for(var i=0; i< checkbox.length; i++) {
            if (checkbox[i].checked) {
                ln++;
                mostrarEspecifico += checkbox1[i].value;
                mostrarEspecifico += "<br>";
            }
        }

        $('#submot_atent_confirmation2').html(mostrarEspecifico);

        //Confirmacion Observación
        var largo = $('#observacion2').val().length;
        if(largo > 0){

            $('#obs_confirmation2').html($("#observacion2").val());

        }else{
            $('#obs_confirmation2').html("Sin observación");
        }

        $('#confirmationformularioAsistenciaSocial2').modal('show');
    });

    $('#formularioAsistenciaSocial3').submit(function(e) {
        e.preventDefault();

        //Confirmacion Patologías Concomitantes
        $('#mot_atent_confirmation3').html("Visita domiciliaria");

        //Confirmacion Alergias
        var checkbox = document.getElementsByName('vd[]');
        var checkbox1 = document.getElementsByName('vdVer[]');
        var mostrarEspecifico = "";
        var ln = 0;
        for(var i=0; i< checkbox.length; i++) {
            if (checkbox[i].checked) {
                ln++;
                mostrarEspecifico += checkbox1[i].value;
                mostrarEspecifico += "<br>";
            }
        }

        $('#submot_atent_confirmation3').html(mostrarEspecifico);

        //Confirmacion Observación
        var largo = $('#observacion3').val().length;
        if(largo > 0){

            $('#obs_confirmation3').html($("#observacion3").val());

        }else{
            $('#obs_confirmation3').html("Sin observación");
        }

        $('#confirmationformularioAsistenciaSocial3').modal('show');
    });

    $('#formularioAsistenciaSocial4').submit(function(e) {
        e.preventDefault();

        //Confirmacion Patologías Concomitantes
        $('#mot_atent_confirmation4').html("Becas");

        //Confirmacion Alergias
        var checkbox = document.getElementsByName('inputSubMotivo[]');
        var checkbox1 = document.getElementsByName('inputSubMotivoVer[]');
        var mostrarEspecifico = "";
        var ln = 0;
        for(var i=0; i< checkbox.length; i++) {
            if (checkbox[i].checked) {
                ln++;
                mostrarEspecifico += checkbox1[i].value;
                mostrarEspecifico += "<br>";
            }
        }

        var postAT = document.getElementsByName('postAT[]');

        if (checkbox[7].checked) {
            mostrarEspecifico += "con los siguientes detalles: <br>"
            mostrarEspecifico += "Año postulación: " + postAT[0].value + "<br>"
            mostrarEspecifico += "Tipo de ayuda: " + postAT[1].value + "<br>"
            var resultado = $( "#resultado" ).val();
            if(resultado == 0){
                var reprobado = document.getElementsByName('reprobado[]');
                mostrarEspecifico += "Resultado: Reprobado <br>"
                mostrarEspecifico += "Admisibilidad Regional: " + reprobado[1].value + "<br>"
                mostrarEspecifico += "Falta de requisitos:" + reprobado[2].value + "<br>"
            }else{
                mostrarEspecifico += "Resultado: Aprobado"
            }
        }

        $('#submot_atent_confirmation4').html(mostrarEspecifico);

        //Confirmacion Observación
        var largo = $('#observacion4').val().length;
        if(largo > 0){

            $('#obs_confirmation4').html($("#observacion4").val());

        }else{
            $('#obs_confirmation4').html("Sin observación");
        }

        $('#confirmationformularioAsistenciaSocial4').modal('show');
    });





    /**
     * Si hay puntuacion se activa comentario.
     */
    $("#puntaje").change(function() {
        //Si se ha seleccionado si
        if (this.value == 1) {
            $('#comentario').removeAttr('disabled');
        }
        actualizarValidador();

    });

    /**
     * Registro Social de Hogares, si es si, activa porcentaje y lo pone requerido,
     * si no, lo bloquea.
     */
    $("#registro_social_hogares").change(function() {
        //Si se ha seleccionado si
        if (this.value == 1) {
            $("#registro_social_porcentaje").prop('required', true);
            $('#registro_social_porcentaje').removeAttr('disabled');
        }

        //Si se ha seleccionado en tramite o no
        if (this.value == 0 || this.value == 2) {
            $('#registro_social_porcentaje').removeAttr('required');
            $('#registro_social_porcentaje').val("");
            $("#registro_social_porcentaje").prop('disabled', true);
        }
        actualizarValidador();

    });

    /**
     * Requerir el numero de la direccion si se escribio una calle
     */
    $('#domicilio_calle').keyup(function() {
        var largo = $('#domicilio_calle').val().length;
        if (largo > 0) {
            $("#domicilio_numero").prop('required', true);
        } else {
            $('#domicilio_numero').removeAttr('required');
        }
        actualizarValidador();
    });

    /**
     * Funcion que permite actualizar el validador y requiera los campos necesarios
     */
    function actualizarValidador() {
        //Actualizar el validador del formulario
        $('#formularioAsistenciaSocial').validator("destroy");
        $('#formularioAsistenciaSocial').validator();
    }

    /**
     * Estilos para select del tema
     */
    $(".select2-selection").addClass("capitalize");
    $(".select2-search").css("width", "100%");
    $(".select2-search__field").css("width", "100%");



});


function enviarFormulario(){
    //alert($('#formularioAsistenciaSocial').attr('id'));
    $("#formularioAsistenciaSocial").submit();
    //document.formularioAsistenciaSocial.submit();
}
function enviarFormulario2(){
    $("#formularioAsistenciaSocial2").submit();
}
function enviarFormulario3(){
    $("#formularioAsistenciaSocial3").submit();
}
function enviarFormulario4(){
    $("#formularioAsistenciaSocial4").submit();
}


function validaVacio(valor) {
    valor = valor.replace("&nbsp;", "");
    valor = valor == undefined ? "" : valor;
    if (!valor || 0 === valor.trim().length) {
        return true;
    }
    else {
        return false;
    }
}

function validarfor(){

    var checkedCount1 = $('input[name="tipoAyudaTecnica"]:checked').length;
    var checkedCount2 = $('input[name="tipoAyudaSocial"]:checked').length;

    console.log(checkedCount1);
    console.log(checkedCount2);

    if (checkedCount == 0) {  //COMPRUEBA CAMPOS VACIOS
        alert("Los campos no pueden quedar vacios");
        return false;
    }
    return true;
}