<div class="form-group">
    <label class='control-label' for='inputText'>Cuidado de Terceros</label>
    <div class='col-md-12 form-group'>
        <div class='col-md-12'>
            <label style="margin-top: 0px;" class='radio radio-inline'>
                <input name='cuidados' id="cuidados"
                @if((old('cuidados') != null && old('cuidados') === '1') || (old('cuidados') == null && isset($persona) && $persona->ficha_beneficiario != null && $persona->ficha_beneficiario->ficha_discapacidad->requiere_cuidado == '1'))
                    checked
                @endif
                type='radio' value='1' required>
                Si
            </label>
            <label class='radio radio-inline'>
                <input name='cuidados'
                @if((old('cuidados')== null && !isset($persona)) || (old('cuidados') != null && old('cuidados') != '1') || (old('cuidados') == null && isset($persona) && $persona->ficha_beneficiario != null && $persona->ficha_beneficiario->ficha_discapacidad->requiere_cuidado == '0'))
                    checked
                @endif
                type='radio' value='0' required>
                No
            </label>
        </div>
    </div>
</div>
