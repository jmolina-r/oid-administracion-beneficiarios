<div class="form-group">
    <div class='box'>
        <label class='control-label' for='inputText'>Otras enfermedades o condiciones médicas</label>
        <div class='box-content'>
            <textarea name="otras_enfermedades" class='char-counter form-control' data-char-allowed='200' data-char-warning='10' placeholder='Ingrese otra enfermedad o condición...' rows='3' style='margin-bottom:10px;' value="{{ old('otras_enfermedades') }}" id="otras_enfermedades"@if(old('diagnostico'))
            	>{{ old('diagnostico') }}</textarea>
            @elseif(isset($persona->ficha_beneficiario->ficha_discapacidad->diagnostico))
                >{{$persona->ficha_beneficiario->ficha_discapacidad->diagnostico}}</textarea>
            @else
            	></textarea>
            @endif
        </div>
    </div>
</div>