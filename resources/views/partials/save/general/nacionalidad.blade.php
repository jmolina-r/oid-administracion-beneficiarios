<div class="form-group">
    <label class='control-label' for='inputSelect'>Nacionalidad</label>
    <select style="width:100%;" name='id_pais' class='form-control select-nomore' id='id_pais'>
        @foreach($paises as $pais)
            <option
                @if((@old('id_pais') == $pais->id) || (@old('id_pais') == null && isset($persona) && $pais->id == $persona->pais->id))
                    selected
                @endif
            value="{{$pais->id}}">{{$pais->nombre}}</option>
        @endforeach
    </select>
</div>
