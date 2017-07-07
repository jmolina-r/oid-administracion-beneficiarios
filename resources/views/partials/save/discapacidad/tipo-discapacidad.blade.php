<div class="form-group">
    <label class='col-md-12 control-label' for='inputText'>
        Tipo de Discapacidad
    </label>

    @foreach ($tipo_discapacidades as $tipo_discapacidad)
        <div class='form-group col-md-12 col-lg-6'>
            <div class='input-group'>
                <span class='capitalize input-group-addon'>
                    {{$tipo_discapacidad->nombre}}
                </span>
                <input name="tipo_discapacidad[{{$tipo_discapacidad->id}}]" type="number" class="form-control bfh-number input-lg text-right" min="0" max="100" data-wrap="true"
                    @if(old('tipo_discapacidad') != null)
                        value="{{ old('tipo_discapacidad') }}"
                    @elseif(isset($persona) && $persona->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades != null && count($persona->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades) > 0)
                        @php ($end = count($persona->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades))
                        @foreach ($persona->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades as $key => $discapacidad)
                            @if($discapacidad->tipo_discapacidad->id == $tipo_discapacidad->id)
                                value="{{ $discapacidad->porcentaje }}"
                                @break
                            @else
                                @if(0 == --$end)
                                    value="0"
                                @endif
                            @endif
                        @endforeach

                    @endif
                >
                <span class="input-group-addon">%</span>
            </div>
        </div>
    @endforeach
</div>
