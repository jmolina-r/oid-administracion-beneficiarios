<div class="form-group">
    <label class='control-label' for='inputSelect'>Situación Civil</label>
    <select style="width:100%;" name='estado_civil' class='form-control capitalize select-tag' id='estado_civil'>
        @foreach($estados_civiles as $estado_civil)
            <option
                @if((@old('estado_civil') == $estado_civil->id) || (@old('estado_civil') == null && isset($persona) && $estado_civil->id == $persona->estado_civil->id))
                    selected
                @endif
            value="{{$estado_civil->id}}">{{$estado_civil->nombre}}</option>
        @endforeach
    </select>
</div>
