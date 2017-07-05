<div class="form-group">
    <label class='control-label' for='inputText'>Dependencia</label>
    <div class='col-md-12 form-group'>
        <select style="width:100%;" name="tipo_dependencia" class='form-control permanente capitalize select-tag' id='inputSelect'>
            @foreach($dependencias as $dependencia)
                <option value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>