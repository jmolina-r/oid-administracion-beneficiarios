<div class="form-group">
    <label class='control-label' for='inputSelect'>Nacionalidad</label>
    <select style="width:100%;" name='id_pais' class='form-control select-tag' id='inputSelect'>
        @foreach($paises as $pais)
            <option value="{{$pais->id}}">{{$pais->nombre}}</option>
        @endforeach
    </select>
</div>