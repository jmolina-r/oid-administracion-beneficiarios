<div class="form-group">
    <div class='box'>
        <label class='control-label' for='inputText'>Observación General</label>
        <div class='box-content'>
            <textarea name="observacion_general" class='char-counter form-control' data-char-allowed='200' data-char-warning='10' placeholder='Ingrese una observación general...' rows='3' style='margin-bottom:10px;'
                @if(old('observacion_general'))
                    >{{ old('observacion_general') }}</textarea>
                @elseif(isset($persona))
                    >{{ $persona->ficha_beneficiario->dato_social->observacion }}</textarea>
                @else
                    ></textarea>
                @endif
        </div>
    </div>
</div>
