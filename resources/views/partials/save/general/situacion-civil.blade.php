<div class="form-group">
    <label class='control-label' for='inputSelect'>Situación Civil</label>
    <select style="width:100%;" name='estado_civil' class='form-control capitalize select-tag' id='inputSelect'>
        @foreach($estados_civiles as $estado_civil)
            <option value="{{$estado_civil->id}}">{{$estado_civil->nombre}}</option>
        @endforeach
    </select>
</div>