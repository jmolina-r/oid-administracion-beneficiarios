<div class="form-group">
    <label class='control-label'>Sexo</label>
    <div class='col-md-12'>
        <label style="margin-top: 0px;" class='radio radio-inline'>
            <input name='sexo'
                @if((old('sexo') == null && !isset($persona)) || (old('sexo') != null && old('sexo') != 'femenino') || (old('sexo') == null && isset($persona) && $persona->sexo == "masculino"))
                    checked
                @endif
            type='radio' value='masculino' required>
            Masculino
        </label>
        <label class='radio radio-inline'>
            <input name='sexo'
            @if((old('sexo') != null && old('sexo') === 'femenino') || (old('sexo') == null && isset($persona) && $persona->sexo == "femenino"))
                checked
            @endif
            type='radio' value='femenino' required>
            Femenino
        </label>
    </div>
    <div class="help-block with-errors">
    </div>
</div>
