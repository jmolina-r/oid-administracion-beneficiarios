<div class="form-group">
    <label class='control-label' for='inputText'>Participación en Organizaciones Sociales</label>
    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 controls'>
        <select style="width:100%;" name='organizaciones_sociales[]' class='form-control capitalize select-tag' multiple='multiple' data-placeholder='Seleccione o agregue organizaciones...'>
            @foreach($organizaciones_sociales as $organizacion_social)
                <option value="{{$organizacion_social->id}}">{{$organizacion_social->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>