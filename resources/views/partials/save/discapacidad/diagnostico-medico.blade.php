<div class="form-group">
    <div class='box'>
        <label class='control-label' for='inputText'>Diagnóstico Médico</label>
        <div class='box-content'>
            <textarea name="diagnostico" class='char-counter form-control' data-char-allowed='200' data-char-warning='10' placeholder='Ingrese un diagnóstico médico...' rows='3' style='margin-bottom:10px;' value="{{ old('diagnostico') }}" id="inputDiagnostico"
            @if(old('diagnostico'))
            	>{{ old('diagnostico') }}</textarea>
            @elseif(isset($persona->ficha_beneficiario->ficha_discapacidad->diagnostico))
                >{{$persona->ficha_beneficiario->ficha_discapacidad->diagnostico}}</textarea>
            @else
            	></textarea>
            @endif
        </div>
    </div>
</div>