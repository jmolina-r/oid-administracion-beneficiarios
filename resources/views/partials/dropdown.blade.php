<script>
    /**
     * Este script busca rellenar los select con los datos recibidos del
     * backend segun la seleccion de usuario.
    */

    //Se crea un JSON con los sistemas de salud
    var sistemas = {
      "fonasa": [
          @foreach($fonasa as $fona)
            {"id":"{{$fona->id}}","tramo":"{{$fona->tramo}}"},
          @endforeach
      ],

      "isapre": [
          @foreach($isapre as $isap)
            {"id":"{{$isap->id}}","tramo":"{{$isap->organizacion}}"},
          @endforeach
        ]
    };

    //Se define la variable select a rellanar
    var select = $("#sistemaSaludSelec");

    //El radio button correspondiente gatilla esta funcion
    $("input[name='sistema']").change(function(){

        //Tipo de sistema seleccionado en el radio button
        var tipoSistema = $('input[name=sistema]:checked').val();

        //Se vacia el select
        select.empty();

        //Se define el sistema escogido para rellenar el select
        var sistemaEscogido;
        if(tipoSistema=='f'){
            sistemaEscogido = sistemas.fonasa;
        }else{
            sistemaEscogido = sistemas.isapre;
        }

        //Se recorre el sistema y se llena el select
        $.each(sistemaEscogido, function(i) {
            select.append($('<option>', {
                value: sistemaEscogido[i].id,
                text : sistemaEscogido[i].tramo
            }));
        });
    });
</script>
