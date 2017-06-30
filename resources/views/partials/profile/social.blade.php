<div class="container">
    <div class="row">
        <div class="col-md-12">                      
            @isset($persona->ficha_beneficiario->dato_social->isapre)
            <div class="col-md-3">  
                <p class="capitalize"><span class="tit">Isapre</span><br> {{ $persona->ficha_beneficiario->dato_social->isapre->organizacion }}</p>
            </div>
            @endisset
        
        
            @isset($persona->ficha_beneficiario->dato_social->fonasa)
            <div class="col-md-3">
                <p class="capitalize"><span class="tit">Tramo Fonasa</span><br> {{ $persona->ficha_beneficiario->dato_social->fonasa->tramo }}</p>
            </div>
            @endisset
        
        
            @isset($persona->ficha_beneficiario->dato_social->prevision)
            <div class="col-md-3">
                <p class="capitalize"><span class="tit">Previsión</span><br> {{ $persona->ficha_beneficiario->dato_social->prevision->nombre }}</p>
            </div>
            @endisset
        
        
            @isset($persona->ficha_beneficiario->dato_social->sistema_proteccion)
            <div class="col-md-3">
                <p class="capitalize"><span class="tit">Sistema de Protección</span><br> {{ $persona->ficha_beneficiario->dato_social->sistema_proteccion->nombre }}</p>
            </div>
            @endisset
        
        
            @isset($persona->educacion)
            <div class="col-md-3">
                <p class="capitalize"><span class="tit">Nivel Educacional</span><br> {{ $persona->educacion->nombre }}</p>
            </div>
            @endisset
        
        
            @isset($persona->ocupacion)
            <div class="col-md-3">
                <p class="capitalize"><span class="tit">Ocupación</span><br> {{ $persona->ocupacion->nombre }}</p>
            </div>
            @endisset
        
        
            @if(isset($persona->ficha_beneficiario->dato_social->beneficios) && count($persona->ficha_beneficiario->dato_social->beneficios) > 0)
            <div class="col-md-3">
                <p class="tit">Beneficios</p>
                @foreach ($persona->ficha_beneficiario->dato_social->beneficios as $beneficio)
                    <p class="capitalize">{{ $beneficio->nombre }}</p>
                @endforeach
            </div>
            @endif
        
        
            @if(isset($persona->ficha_beneficiario->dato_social->organizaciones_sociales) && count($persona->ficha_beneficiario->dato_social->organizaciones_sociales) > 0)
            <div class="col-md-3">
                <p class="tit">Organizaciones Sociales</p>
                @foreach ($persona->ficha_beneficiario->dato_social->organizaciones_sociales as $organizacione_social)
                    <p class="capitalize">{{ $organizacione_social->nombre }}</p>
                @endforeach
            </div>
            @endif
        
            @isset($persona->registro_social_hogar)
            <div class="col-md-3">
                @if($persona->registro_social_hogar->en_tramite === 1)
                    <p><span class="tit">Registro Social de Hogares</span><br> En Trámite</p>
                @else
                    @isset($persona->registro_social_hogar->porcentaje)
                        <p><span class="tit">Porcentaje Registro Social de Hogares</span><br> {{ $persona->registro_social_hogar->porcentaje }}%</p>
                    @endisset
                @endif
            </div>
            @endisset
        
        
            @isset($persona->credencial_discapacidad)
            <div class="col-md-3">
                @if($persona->credencial_discapacidad->en_tramite === 1)
                    <p><span class="tit">Credencial de Discapacidad</span><br> En Trámite</p>
                @else
                    @isset($persona->credencial_discapacidad->fecha_vencimiento)
                        <p><span class="tit">Vencimiento Credencial de Discapacidad</span><br> {{ date('d/m/Y', strtotime($persona->credencial_discapacidad->fecha_vencimiento)) }}</p>
                    @endisset
                @endif
            </div>
            @endisset            
        </div>
    </div>
</div>
