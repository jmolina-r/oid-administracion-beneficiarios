<div class="container">
    <div class="row">
        @isset($persona->ficha_beneficiario->dato_social->isapre)
            <p class="capitalize"><span class="tit">Isapre</span> {{ $persona->ficha_beneficiario->dato_social->isapre->organizacion }}</p>
        @endisset

        @isset($persona->ficha_beneficiario->dato_social->fonasa)
            <p class="capitalize"><span class="tit">Tramo Fonasa</span> {{ $persona->ficha_beneficiario->dato_social->fonasa->tramo }}</p>
        @endisset

        @isset($persona->ficha_beneficiario->dato_social->prevision)
            <p class="capitalize"><span class="tit">Previsión</span> {{ $persona->ficha_beneficiario->dato_social->prevision->nombre }}</p>
        @endisset

        @isset($persona->ficha_beneficiario->dato_social->sistema_proteccion)
            <p class="capitalize"><span class="tit">Sistema de Protección</span> {{ $persona->ficha_beneficiario->dato_social->sistema_proteccion->nombre }}</p>
        @endisset

        @isset($persona->educacion)
            <p class="capitalize"><span class="tit">Nivel Educacional</span> {{ $persona->educacion->nombre }}</p>
        @endisset

        @isset($persona->ocupacion)
            <p class="capitalize"><span class="tit">Ocupación</span> {{ $persona->ocupacion->nombre }}</p>
        @endisset

        @if(count($persona->ficha_beneficiario->dato_social->beneficios) > 0)
            <p class="tit">Beneficios</p>
            @foreach ($persona->ficha_beneficiario->dato_social->beneficios as $beneficio)
                <p class="capitalize">{{ $beneficio->nombre }}</p>
            @endforeach
        @endif

        @if(count($persona->ficha_beneficiario->dato_social->organizaciones_sociales) > 0)
            <p class="tit">Organizaciones Sociales</p>
            @foreach ($persona->ficha_beneficiario->dato_social->organizaciones_sociales as $organizacione_social)
                <p class="capitalize">{{ $organizacione_social->nombre }}</p>
            @endforeach
        @endif

        @isset($persona->registro_social_hogar)
            @if($persona->registro_social_hogar->en_tramite === 1)
                <p><span class="tit">Registro Social de Hogares</span> En Trámite</p>
            @else
                @isset($persona->registro_social_hogar->porcentaje)
                    <p><span class="tit">Porcentaje Registro Social de Hogares</span> {{ $persona->registro_social_hogar->porcentaje }}%</p>
                @endisset
            @endif
        @endisset

        @isset($persona->credencial_discapacidad)
            @if($persona->credencial_discapacidad->en_tramite === 1)
                <p><span class="tit">Credencial de Discapacidad</span> En Trámite</p>
            @else
                @isset($persona->credencial_discapacidad->fecha_vencimiento)
                    <p><span class="tit">Vencimiento Credencial de Discapacidad</span> {{ date('d/m/Y', strtotime($persona->credencial_discapacidad->fecha_vencimiento)) }}</p>
                @endisset
            @endif
        @endisset
    </div>
</div>
