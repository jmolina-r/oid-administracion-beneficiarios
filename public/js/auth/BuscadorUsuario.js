function getUsuarioPorId(userId) {
    var promise = $.ajax({
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

                $('#editar_btn').show();
                $('#editar_btn').click(function() {
                    window.location.href = "/update/" + $('#userId').val();
                });
            },
            complete: function() {
                $.ajax({
                    type: 'GET',
                    url: '/users/' + userId + "/roles",
                    beforeSend: function() {
                        // this is where we append a loading image
                        //$('#progress').removeClass('hidden');
                    },
                    success: function(roles){
                        // var rol = ""
                        // for(var i in roles) {
                        //     if(i==0){
                        //         rol = roles[i].nombre
                        //     } else {
                        //         rol = rol + " - " + roles[i].nombre
                        //     }
                        // }
                        $('#roles').html(roles.nombre);
                    }, complete: function() {
                        $('#profile').modal('show');
                    }
                });
            },
            error: function(err) {
                console.log(err);
            }
    });

    promise.then(function(){

    });
}

function mostrarPerfilUsuario(username, email, status, role){
    $('#username').html(username);
    $('#email').html(email);
    $('#roles').html(role);
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
