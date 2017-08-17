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
            if (res.status == 1) {
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
                success: function(roles) {
                    // var rol = ""
                    // for(var i in roles) {
                    //     if(i==0){
                    //         rol = roles[i].nombre
                    //     } else {
                    //         rol = rol + " - " + roles[i].nombre
                    //     }
                    // }
                    $('#roles').html(roles.nombre);
                },
                complete: function() {





                    $.ajax({
                        type: 'GET',
                        url: '/users/' + userId + "/funcionario",
                        beforeSend: function() {
                            // this is where we append a loading image
                            //$('#progress').removeClass('hidden');
                        },
                        success: function(funcionario) {
                            $('#funcionarioNombreProfileHeader').html(funcionario.nombre + ' ' + funcionario.apellido);
                            $('#funcionarioRutProfileHeader').html(funcionario.rut);
                            $('#funcionarioTelefonoProfileHeader').html(funcionario.telefono);
                            $('#funcionarioDireccionProfileHeader').html(funcionario.direccion);
                            $('#funcionarioFechaNacimientoProfileHeader').html(convertDate(funcionario.fecha_nacimiento));
                            $('#funcionarioEmailProfileHeader').html(funcionario.email);
                        },
                        complete: function() {
                            $('#profile').modal('show');
                        }
                    });







                    //$('#profile').modal('show');
                }
            });
        },
        error: function(err) {
            console.log(err);
        }
    });

    promise.then(function() {

    });
}

function mostrarPerfilUsuario(username, email, status, role, funcionario) {
    $('#username').html(username);
    $('#email').html(email);
    $('#roles').html(role);
    if (status == 1) {
        $("#estado").removeClass("label-danger");
        $("#estado").addClass("label-success");
        $('#estado').html("Activo");
    } else {
        $("#estado").removeClass("label-success");
        $("#estado").addClass("label-danger");
        $('#estado').html("Inactivo");
    }

    $('#editar_btn').hide();

    // preserve newlines, etc - use valid JSON
    funcionario = funcionario.replace(/\\n/g, "\\n")
                   .replace(/\\'/g, "\\'")
                   .replace(/\\"/g, '\\"')
                   .replace(/\\&/g, "\\&")
                   .replace(/\\r/g, "\\r")
                   .replace(/\\t/g, "\\t")
                   .replace(/\\b/g, "\\b")
                   .replace(/\\f/g, "\\f");
    // remove non-printable and other non-valid JSON chars
    funcionario = funcionario.replace(/[\u0000-\u0019]+/g,"")
    funcionario = jQuery.parseJSON(funcionario)

    $('#funcionarioNombreProfileHeader').html(funcionario.nombre + ' ' + funcionario.apellido);
    $('#funcionarioRutProfileHeader').html(funcionario.rut);
    $('#funcionarioTelefonoProfileHeader').html(funcionario.telefono);
    $('#funcionarioDireccionProfileHeader').html(funcionario.direccion);
    $('#funcionarioFechaNacimientoProfileHeader').html(convertDate(funcionario.fecha_nacimiento));
    $('#funcionarioEmailProfileHeader').html(funcionario.email);


    $('#profile').modal('show');
}

function convertDate(inputFormat) {
    function pad(s) {
        return (s < 10) ? '0' + s : s;
    }
    var d = new Date(inputFormat);
    return [pad(d.getDate() + 1), pad(d.getMonth() + 1), d.getFullYear()].join('/');
}
