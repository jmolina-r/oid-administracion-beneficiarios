<div class='step-pane' data-step='3'>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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

    <div class='col-md-12'>
        <div class='box'>
            <label class='control-label' for='inputText'>Diagnóstico Médico</label>
            <div class='box-content'>
                <textarea name="diagnostico" class='char-counter form-control' data-char-allowed='200' data-char-warning='10' placeholder='Ingrese un diagnóstico médico...' rows='3' style='margin-bottom:10px;' value="{{ old('diagnostico') }}" id="inputDiagnostico"></textarea>
            </div>
        </div>
    </div>

    <div class='col-md-12'>
        <div class='box'>
            <label class='control-label' for='inputText'>Otras enfermedades o condiciones médicas</label>
            <div class='box-content'>
                <textarea name="otras_enfermedades" class='char-counter form-control' data-char-allowed='200' data-char-warning='10' placeholder='Ingrese otra enfermedad o condición...' rows='3' style='margin-bottom:10px;' value="{{ old('otras_enfermedades') }}" id="inputDiagnostico"></textarea>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-4">
        <label class='control-label' for='inputText'>Dependencia</label>
        <div class='col-md-12 form-group'>
            <select name="tipo_dependencia" class='form-control permanente capitalize select-tag' id='inputSelect'>
                @foreach($dependencias as $dependencia)
                    <option value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="col-md-12 col-lg-3">
        <label class='control-label' for='inputText'>Cuidado de Terceros</label>
        <div class='col-md-12 form-group'>
            <div class='col-md-12'>
                <label style="margin-top: 0px;" class='radio radio-inline'>
                    <input name='cuidados' type='radio' value='1' required>
                    Si
                </label>
                <label class='radio radio-inline'>
                    <input name='cuidados' type='radio' value='0' required checked>
                    No
                </label>
            </div>
        </div>
    </div>

    <div class='col-md-12 col-lg-5 form-group'>
        <label class='control-label' for='inputText'>Plan de rehabilitación, tratamiento o control</label>
        <div class='col-md-12 controls'>
            <input name='p_reha_trat_ctrl' class='form-control' id='inputText' placeholder='¿Donde? Si no aplica, dejar en blanco.' type='text'>
        </div>
    </div>
</div>