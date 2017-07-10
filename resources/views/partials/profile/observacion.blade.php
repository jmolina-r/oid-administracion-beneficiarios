<div class="container">
    <div class="row">
        <div class="col-md-12">
            @isset($persona->ficha_beneficiario->dato_social->observacion)
                <p class="capitalize"><span class="tit">Observación General</span><br>{{$persona->ficha_beneficiario->dato_social->observacion}}</p>
            @endisset
        </div>
    </div>
</div>
