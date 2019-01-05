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

    // {{-- var prevision = {
    //   "afp": [
    //       @foreach($previsiones as $prevision)
    //         {"id":"{{$prevision->id}}","tramo":"{{$prevision->tramo}}"},
    //       @endforeach
    //   ],
    //   "ips": [
    //       //Falta definir IPS
    //   ]
    // } --}}

    //Se define la variable select a rellanar
    var select = $("#sistemaSaludSelec");

    //El radio button correspondiente gatilla esta funcion
    $("input[name='sistema_salud']").change(function(){

        //Tipo de sistema seleccionado en el radio button
        var tipoSistema = $('input[name=sistema_salud]:checked').val();

        //Se vacia el select
        select.empty();

        //Se define el sistema escogido para rellenar el select
        var sistemaEscogido;
        if(tipoSistema=='fonasa'){
            sistemaEscogido = sistemas.fonasa;
            $('#sistemaSaludSelec').attr('name', 'fonasa')
        }else{
            sistemaEscogido = sistemas.isapre;
            $('#sistemaSaludSelec').attr('name', 'isapre')
        }

        llenarSelect(sistemaEscogido, select);

    });

    function llenarSelect(sistema, select){

      //Se recorre el sistema y se llena el select
        $.each(sistema, function(i) {
            select.append($('<option>', {
                value: sistema[i].id,
                text : sistema[i].tramo
            }));
        });
    }
</script>
