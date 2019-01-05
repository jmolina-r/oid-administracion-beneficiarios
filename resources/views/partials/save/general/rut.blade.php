<div class='form-group'>
    <label class='control-label' for='inputText'>Cédula de identidad (Sin puntos con guión) (*)</label>
    <div class='controls'>
        <input name="rut" class='form-control' id='rut' placeholder='Ej. 12345678-8' type='text' required pattern="\d{3,8}-[\d|kK]{1}" maxlength="200" value=
        @if(old('rut'))
            "{{ old('rut') }}"
        @elseif(isset($persona))
            "{{ $persona->rut }}"
        @else
            ""
        @endif

        @if(isset($persona))
             readonly="readonly"
        @endif
        >
        <div class="help-block with-errors">
        </div>
    </div>
</div>
