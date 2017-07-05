<div class="form-group">
    <label class='control-label' for='inputSelect'>Nacionalidad</label>
    <select style="width:100%;" name='id_pais' class='form-control select-tag' id='inputSelect'>
        @foreach($paises as $pais)
            <option
                @if(@old('id_pais') == $pais->id)
                    selected
                @elseif(@old('id_pais') == null && isset($persona) && $pais->id == $persona->pais->id)
                    selected
                @endif
            value="{{$pais->id}}">{{$pais->nombre}}</option>
        @endforeach
    </select>
</div>
