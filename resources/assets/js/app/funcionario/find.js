import 'script-loader!../../../vendor/assets/javascripts/plugins/datatables/datatables.min.js'
import 'style-loader!../../../vendor/assets/stylesheets/plugins/datatables/datatables.css'

var utils = require('../generals/utils')

$(document).ready(function() {
    $('table').on('click', '.clickable-modal', e => ShowPerfilFuncionarioModal($(e.currentTarget).attr('funcionario-id')))

    function ShowPerfilFuncionarioModal(funcionarioId) {
        var promise = $.ajax({
            type: 'GET',
            url: '/funcionario/' + funcionarioId,
            success: function(funcionario) {
                $('#findFuncionarioPerfilFuncionarioModal').modal('show')
                $('#findFuncionarioFuncionarioId').val(funcionario.id)
                $('#findFuncionarioFuncionarioNombre').html(funcionario.nombre + ' ' + funcionario.apellido)
                $('#findFuncionarioFuncionarioRut').html(funcionario.rut)
                $('#findFuncionarioFuncionarioTelefono').html(funcionario.telefono)
                $('#findFuncionarioFuncionarioDireccion').html(funcionario.direccion)
                $('#findFuncionarioFuncionarioFechaNacimiento').html(utils.formatDate(funcionario.fecha_nacimiento))
                $('#findFuncionarioFuncionarioEmail').html(funcionario.email)
                $('#findFuncionarioFuncionarioTipo').html(funcionario.tipo_funcionario.nombre)
                $('#findFuncionarioEditarFuncionarioBtn').attr('href', '/funcionario/editar/' + funcionario.id)
            },
            error: function(err) {
                console.log(err)
            }
        })

        promise.then(function() {

        })
    }
})
