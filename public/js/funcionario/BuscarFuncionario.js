$(document).ready(function() {
    $('table').on('click', '.clickable-modal', e => ShowPerfilFuncionarioModal($(e.currentTarget).attr('funcionario-id')));
    // $('table').on('click', '.clickable-modal', e => console.log($(this).after.attr('funcionario-id') ));

    // $('table').on('click', '.clickable-modal', function(){
    //     console.log($(this).attr('funcionario-id'));
    // });

    // $('.clickable-modal').onclick = function() {console.log('ola');};
    // $('table').on('click', '.clickable-modal', function() {
    //     console.log('ola');
    // })

    function ShowPerfilFuncionarioModal(funcionarioId) {
        var promise = $.ajax({
            type: 'GET',
            url: '/funcionario/' + funcionarioId,
            beforeSend: function() {

            },
            success: function(funcionario) {
                $('#findFuncionarioPerfilFuncionarioModal').modal('show');
                $('#findFuncionarioFuncionarioId').val(funcionario.id);
                $('#findFuncionarioFuncionarioNombre').html(funcionario.nombre + ' ' + funcionario.apellido);
                $('#findFuncionarioFuncionarioRut').html(funcionario.rut);
                $('#findFuncionarioFuncionarioTelefono').html(funcionario.telefono);
                $('#findFuncionarioFuncionarioDireccion').html(funcionario.direccion);
                $('#findFuncionarioFuncionarioFechaNacimiento').html((funcionario.fecha_nacimiento));
                $('#findFuncionarioFuncionarioEmail').html(funcionario.email);
                $('#findFuncionarioFuncionarioTipo').html(funcionario.tipo_funcionario.nombre);
                $('#findFuncionarioEditarFuncionarioBtn').attr('href', '/funcionario/editar/' + funcionario.id);

            },
            error: function(err) {
                console.log(err);
            }
        });

        promise.then(function() {

        });
    }
})


function convertDate(inputFormat) {
    function pad(s) {
        return (s < 10) ? '0' + s : s;
    }
    var d = new Date(inputFormat);
    return [pad(d.getDate() + 1), pad(d.getMonth() + 1), d.getFullYear()].join('/');
}
