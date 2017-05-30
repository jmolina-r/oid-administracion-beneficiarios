<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(count($persona->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades) > 0)
                <p class="tit">Porcentajes de Discapacidades</p>
                @foreach ($persona->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades as $discapacidad)
                    <p class="capitalize"> {{ $discapacidad->tipo_discapacidad->nombre }} {{ $discapacidad->porcentaje }}%</p>
                @endforeach
            @endif

            @isset($persona->ficha_beneficiario->ficha_discapacidad->diagnostico)
                <p class="tit">Diagnóstico Médico</p>
                <p>{{ $persona->ficha_beneficiario->ficha_discapacidad->diagnostico }}</p>
            @endisset

            @isset($persona->ficha_beneficiario->ficha_discapacidad->otras_enfermedades)
                <p class="tit">Otras Enfermedades</p>
                <p>{{ $persona->ficha_beneficiario->ficha_discapacidad->otras_enfermedades }}</p>
            @endisset

            @isset($persona->ficha_beneficiario->ficha_discapacidad->tipo_dependencia)
                <p><span class="tit">Tipo de Dependencia</span> <span class="capitalize">{{ $persona->ficha_beneficiario->ficha_discapacidad->tipo_dependencia->nombre }}</span></p>
            @endisset

            @if($persona->ficha_beneficiario->ficha_discapacidad->requiere_cuidado === 1)
                <p><span class="tit">Requiere Cuidados de Terceros</span> Si</p>
            @else
                <p><span class="tit">Requiere Cuidados de Terceros</span> No</p>
            @endif
        </div>
    </div>
</div>
