<div class="form-group">
    <label class='control-label' for='inputSelect'>Fecha de Nacimiento (*)</label>
    <div class='input-group'>
        <input id='fecha_nacimiento' value-date=
            @if(old('fecha_nacimiento') != null)
                "{{ old('fecha_nacimiento') }}"
            @elseif(isset($persona))
                "{{ $persona->fecha_nacimiento }}"
            @else
                ""
            @endif
            name='fecha_nacimiento' class='form-control' data-format='DD/MM/YYYY' placeholder='Fecha de Nacimiento' type='text' required>
        <span class='input-group-addon'>
            <span class='fa fa-calendar'></span>
        </span>
    </div>
    <div class="help-block with-errors">
    </div>
</div>
