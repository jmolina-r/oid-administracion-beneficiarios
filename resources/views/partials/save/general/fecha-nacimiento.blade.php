<div class="form-group">
    <label class='control-label' for='inputSelect'>Fecha de Nacimiento</label>
    <div class='input-group' id='fecha_nacimiento'>
        <input value="{{ old('fecha_nacimiento') }}" name='fecha_nacimiento' class='form-control' data-format='DD/MM/YYYY' placeholder='Fecha de Nacimiento' type='text' required>
        <span class='input-group-addon'>
            <span class='fa fa-calendar'></span>
        </span>
    </div>
    <div class="help-block with-errors">
    </div>
</div>