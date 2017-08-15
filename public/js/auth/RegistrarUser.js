$(document).ready(function() {

    $('#funcionarioUserData, #funcionarioUserDataIco').click(function() {
        $('#perfilFuncionarioModalOnUser').modal('show')
    })


    $('#userSaveFormBtn').click(function(e) {
        e.preventDefault()

        // Fill Modal
        $('#usernameUserModal').html($('#usernameUserSave').val())
        $('#emailUserModal').html($('#emailUserSave').val())
        $('#rolesUserModal').html($('#roleUserSave').find(":selected").text())

        if($('input[name="status"]:checked').val() == 1) {
            $('#estadoUserModal').html('activo')
        } else {
            $('#estadoUserModal').html('inactivo')
        }


        console.log();

        var roles= $('#roleUserSave').select2('data');
        var rol = ""
        for(var i in roles) {
            if(i==0){
                rol = roles[i].text
            } else {
                rol = rol + " - " + roles[i].text
            }
        }
        $('#rolesUserModal').html(rol);

        $('#confirmationUserModal').modal('show')
    })

    $('#AceptarUserBtnModal').click(function() {
        $('#userSaveForm').submit()
    })

    $(".select-tag").select2()
});
