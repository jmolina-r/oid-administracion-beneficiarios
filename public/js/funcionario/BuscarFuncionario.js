$(document).ready(function() {})

function getFuncionarioPorId(funcionarioId) {
    var promise = $.ajax({
        type: 'GET',
        url: '/funcionario/' + funcionarioId,
        beforeSend: function() {
            // this is where we append a loading image
            //$('#progress').removeClass('hidden');
        },
        success: function(funcionario) {
            $('#perfilFuncionarioModal').modal('show');

            $('#funcionarioId').val(funcionario.id);
            $('#funcionarioNombre').html(funcionario.nombre + ' ' + funcionario.apellido);
            $('#funcionarioRut').html(funcionario.rut);
            $('#funcionarioTelefono').html(funcionario.telefono);
            $('#funcionarioDireccion').html(funcionario.direccion);
            $('#funcionarioFechaNacimiento').html(convertDate(funcionario.fecha_nacimiento));
            $('#funcionarioEmail').html(funcionario.email);
            $('#funcionarioTipo').html(funcionario.tipo_funcionario.nombre);

            console.log(funcionario);

            // $('#editar_btn').show();
            $('#editar_btn').click(function() {
                window.location.href = "/update/" + $('#funcionarioId').val();
            });
        },
        // complete: function() {
        //     $.ajax({
        //         type: 'GET',
        //         url: '/users/' + funcionarioId + "/roles",
        //         beforeSend: function() {
        //             // this is where we append a loading image
        //             //$('#progress').removeClass('hidden');
        //         },
        //         success: function(roles){
        //             var rol = ""
        //             for(var i in roles) {
        //                 if(i==0){
        //                     rol = roles[i].nombre
        //                 } else {
        //                     rol = rol + " - " + roles[i].nombre
        //                 }
        //             }
        //             $('#roles').html(rol);
        //         }, complete: function() {
        //             $('#profile').modal('show');
        //         }
        //     });
        // },
        error: function(err) {
            console.log(err);
        }
    });

    promise.then(function() {

    });
}

function convertDate(inputFormat) {
  function pad(s) { return (s < 10) ? '0' + s : s; }
  var d = new Date(inputFormat);
  return [pad(d.getDate()+1), pad(d.getMonth()+1), d.getFullYear()].join('/');
}