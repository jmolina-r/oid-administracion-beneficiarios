<div class='form-group'>
    <label class='control-label' for='inputText'>Nombres (*)</label>
    <div class='controls'>
        <input id="nombres" name='nombres' class='form-control onlyletters' value=
            @if(old('nombres'))
                "{{ old('nombres') }}"
            @elseif(isset($persona))
                "{{ $persona->nombre }}"
            @else
                ""
            @endif
        placeholder='Nombres' type='text' maxlength="200" required>
    </div>
    <div class="help-block with-errors">
    </div>
</div>
