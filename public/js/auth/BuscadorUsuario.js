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
                $('#estado').html("Activo");
            } else {
                $('#estado').html("Inactivo");
            }

            $('#editar_btn').click(function() { 
                alert($('#userId').val())
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