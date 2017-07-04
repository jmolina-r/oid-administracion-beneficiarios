<div class='step-pane' data-step='2'>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <label class='control-label col-xs-12 col-sm-12 col-md-12 col-lg-12' for='inputText'>Sistema de Salud</label>

        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
            <label style="margin-top: 0px;" class='radio radio-inline'>
                <input name='sistema_salud' type='radio' value='fonasa' checked>
                Fonasa
            </label>
            <label class='radio radio-inline'>
                <input name='sistema_salud' type='radio' value='isapre'>
                Isapre
            </label>
            <div class="help-block with-errors">
            </div>
        </div>

        <div class='col-sm-12 col-md-6 col-lg-6 form-group'>
            <select style="width:100%;" id="sistemaSaludSelec" name='fonasa' class='form-control capitalize select-tag' required>
                @foreach($fonasa as $fona)
                    <option value="{{$fona->id}}">{{$fona->tramo}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <label class='control-label' for='inputText'>Previsión</label>

        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
            <select style="width:100%;" name='prevision' class='form-control capitalize select-tag' id='inputSelect'>
                <option value=''>No tiene</option>
                @foreach($previsiones as $prevision)
                    <option value="{{$prevision->id}}">{{$prevision->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group">
        <label class='control-label' for='inputText'>Nivel Educacional</label>
        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
            <select style="width:100%;" name='educacion' class='form-control capitalize select-tag' id='inputSelect'>
                @foreach($niveles_educacion as $nivel_educacion)
                    <option value="{{$nivel_educacion->id}}">{{$nivel_educacion->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group">
        <label class='control-label' for='inputText'>Ocupación Actual</label>
        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 controls'>
            <select style="width:100%;" name='ocupacion' class='form-control capitalize select-tag' id='inputSelect'>
                @foreach($situaciones as $situacion)
                    <option value="{{$situacion->id}}">{{$situacion->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group">
        <label class='control-label' for='inputText'>Beneficios</label>
        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
            <select style="width:100%;" name="beneficios[]" class='form-control select-tag' data-placeholder='Selecciona los beneficios asociados...' multiple='multiple'>
                @foreach($beneficios as $beneficio)
                    <option value="{{$beneficio->id}}">{{$beneficio->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group'>
        <label class='control-label' for='inputText'>Sistema de protección</label>
        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 controls'>
            <select style="width:100%;" name='sistema_proteccion' class='form-control capitalize select-tag'data-placeholder='Seleccione o agregue sistemas de proteccion'>
                <option value=''>No tiene</option>
                @foreach($datos_sociales as $dato_social)
                    <option class="capitalize" value="{{$dato_social->id}}">{{$dato_social->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
        <label class='control-label' for='inputText'>Participación en Organizaciones Sociales</label>
        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 controls'>
            <select style="width:100%;" name='organizaciones_sociales[]' class='form-control capitalize select-tag' multiple='multiple' data-placeholder='Seleccione o agregue organizaciones...'>
                @foreach($organizaciones_sociales as $organizacion_social)
                    <option value="{{$organizacion_social->id}}">{{$organizacion_social->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class='col-sm-12'>
        <div class='box'>
            <label class='control-label' for='inputText'>Observación General</label>
            <div class='box-content'>
                <textarea name="observacion_general" class='char-counter form-control' data-char-allowed='200' data-char-warning='10' placeholder='Ingrese una observación general...' rows='3' style='margin-bottom:10px;' value="{{ old('observacion_general') }}"></textarea>
            </div>
        </div>
    </div>
</div>