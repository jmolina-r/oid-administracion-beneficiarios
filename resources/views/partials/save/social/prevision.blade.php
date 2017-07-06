<div class="form-group">
    <label class='control-label' for='inputText'>Previsión</label>

    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
        <select style="width:100%;" name='prevision' class='form-control capitalize select-tag' id='inputSelect'>
            @if(@old('prevision') == null && isset($persona) == null)
            	<option selected value=''>No tiene</option>
            @endif
            @foreach($previsiones as $prevision)
                <option
                @if(@old('prevision') == $prevision->id)
                	selected
                @elseif(@old('prevision') == null && isset($persona) && $persona->ficha_beneficiario->dato_social->prevision != null && $persona->ficha_beneficiario->dato_social->prevision->id == $prevision->id)
                	selected
                @endif
                value="{{$prevision->id}}">{{$prevision->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
