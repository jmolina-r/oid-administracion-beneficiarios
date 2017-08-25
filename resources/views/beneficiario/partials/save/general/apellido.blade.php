<div class='form-group'>
    <label class='control-label' for='inputText'>Apellidos (*)</label>
    <div class='controls'>
        <input id="apellidos" name='apellidos' class='form-control onlyletters' id='inputText' placeholder='Apellidos' type='text' required value=
        @if(old('apellidos'))
            "{{ old('apellidos') }}"
        @elseif(isset($persona))
            "{{ $persona->apellido }}"
        @else
            ""
        @endif
        >
        <div class="help-block with-errors">
        </div>
    </div>
</div>