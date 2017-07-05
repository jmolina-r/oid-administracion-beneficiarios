<div class="form-group">
    <label class='col-md-12 control-label' for='inputText'>
        Tipo de Discapacidad
    </label>

    @foreach ($tipo_discapacidades as $tipo_discapacidad)
        <div class='form-group col-md-12 col-lg-6'>
            <div class='input-group'>
                <span class='capitalize input-group-addon'>
                    {{$tipo_discapacidad->nombre}}
                </span>
                <input name="tipo_discapacidad[{{$tipo_discapacidad->id}}]" type="number" class="form-control bfh-number input-lg text-right" min="0" max="100" data-wrap="true" value="0">
                <span class="input-group-addon">%</span>
            </div>
        </div>
    @endforeach
</div>