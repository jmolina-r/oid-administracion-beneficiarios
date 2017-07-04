<div class="form-group">
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