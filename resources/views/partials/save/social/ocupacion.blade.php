<div class="form-group">
    <label class='control-label' for='inputText'>Ocupación Actual</label>
    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 controls'>
        <select style="width:100%;" name='ocupacion' class='form-control capitalize select-tag' id='inputSelect'>
            @foreach($situaciones as $situacion)
                <option value="{{$situacion->id}}">{{$situacion->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>