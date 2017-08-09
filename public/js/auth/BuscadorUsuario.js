function getUsuarioPorId(userId) {
    $.ajax({
        type: 'GET',
        url: '/users/' + userId,
        beforeSend: function() {
            // this is where we append a loading image
            //$('#progress').removeClass('hidden');
        },
        success: function(res) {
            $('#userId').val(res.id);
            $('#username').html(res.username);
            $('#email').html(res.email);
            if(res.status == 1){
                $("#estado").removeClass("label-danger");
                $("#estado").addClass("label-success");
                $('#estado').html("Activo");
            } else {
                $("#estado").removeClass("label-success");
                $("#estado").addClass("label-danger");
                $('#estado').html("Inactivo");
            }

            console.log(res)

            $('#editar_btn').show();
            $('#editar_btn').click(function() {
                window.location.href = "/update/" + $('#userId').val();
            });

            $('#profile').modal('show');
        },
        complete: function() {
            //$('#progress').addClass('hidden');
        },
        error: function(err) {
            console.log(err);
        }
    });
}

function mostrarPerfilUsuario(username, email, status){
    $('#username').html(username);
    $('#email').html(email);
    if(status == 1){
        $("#estado").removeClass("label-danger");
        $("#estado").addClass("label-success");
        $('#estado').html("Activo");
    } else {
        $("#estado").removeClass("label-success");
        $("#estado").addClass("label-danger");
        $('#estado').html("Inactivo");
    }

    $('#editar_btn').hide();

    $('#profile').modal('show');
}