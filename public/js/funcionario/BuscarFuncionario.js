$(document).ready(function() {
    console.log('llego');
    $('#editar_btn').click(function() {
        console.log('editando');
        window.location.href = "/funcionario/editar/" + $('#funcionarioId').val();
    });
})

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
            $('#editarFuncionarioBtn').attr('href', '/funcionario/editar/' + funcionario.id);

        },
        error: function(err) {
            console.log(err);
        }
    });

    promise.then(function() {

    });
}

function convertDate(inputFormat) {
    function pad(s) {
        return (s < 10) ? '0' + s : s;
    }
    var d = new Date(inputFormat);
    return [pad(d.getDate() + 1), pad(d.getMonth() + 1), d.getFullYear()].join('/');
}
