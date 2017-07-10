
    function showContent(idelement,idcheck) {
            element = document.getElementById(idelement);
            check = document.getElementById(idcheck);
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
    }

    function toggle(elemento) {

        if (elemento.value == "12") {
            document.getElementById("uno").style.display = "block";
        } else {
            document.getElementById("uno").style.display = "none";
        }

    }

    function mostrar(id) {
        if (id == "item") {
            $("").show();
        }
        if (id == "0") {
            $("#reprobado").show();
        }
        if (id == "1") {
            $("#reprobado").hide();
        }
    }

    function checkButton(boton){


    }