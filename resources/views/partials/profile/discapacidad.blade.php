<div class="container">
    <div class="row">
        @if(isset($persona->ficha_beneficiario->ficha_discapacidad->diagnostico) || isset($persona->ficha_beneficiario->ficha_discapacidad->otras_enfermedades))
        <div class="col-lg-6">
            <div class="col-md-12">
                @isset($persona->ficha_beneficiario->ficha_discapacidad->diagnostico)
                    <p class="tit">Diagnóstico Médico</p>
                    <p>{{ $persona->ficha_beneficiario->ficha_discapacidad->diagnostico }}</p>
                @endisset
            </div>
            <div class="col-md-12">
                @isset($persona->ficha_beneficiario->ficha_discapacidad->otras_enfermedades)
                    <p class="tit">Otras Enfermedades</p>
                    <p>{{ $persona->ficha_beneficiario->ficha_discapacidad->otras_enfermedades }}</p>
                @endisset
            </div>
        </div>
        @endif
        <div class="col-md-6">
            @if(isset($persona->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades) && count($persona->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades) > 0)
                <div class="col-md-6">
                    <p class="tit">Porcentajes de Discapacidades</p>
                    @foreach ($persona->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades as $discapacidad)
                        <p class="capitalize"> {{ $discapacidad->tipo_discapacidad->nombre }} {{ $discapacidad->porcentaje }}%</p>
                    @endforeach
                </div>
            @endif
            <div class="col-md-6">
                @isset($persona->ficha_beneficiario->ficha_discapacidad->tipo_dependencia)
                    <p><span class="tit">Tipo de Dependencia</span> <span class="capitalize">{{ $persona->ficha_beneficiario->ficha_discapacidad->tipo_dependencia->nombre }}</span></p>
                @endisset
                @if(isset($persona->ficha_beneficiario->ficha_discapacidad->requiere_cuidado) && $persona->ficha_beneficiario->ficha_discapacidad->requiere_cuidado === 1)
                    <p><span class="tit">Requiere Cuidados de Terceros</span> Si</p>
                @else
                    <p><span class="tit">Requiere Cuidados de Terceros</span> No</p>
                @endif
            </div>
        </div>
    </div>
</div>
