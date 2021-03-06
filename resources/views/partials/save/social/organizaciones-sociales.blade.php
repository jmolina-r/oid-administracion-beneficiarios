<div class="form-group">
    <label class='control-label' for='inputText'>Participación en Organizaciones Sociales</label>
    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
        <select style="width:100%;" name='organizaciones_sociales[]' class='form-control capitalize select-tag' multiple='multiple' id="organizaciones_sociales" data-placeholder='Seleccione o agregue organizaciones...'>
            @foreach($organizaciones_sociales as $organizacion_social)
                <option value="{{$organizacion_social->id}}"
                    @if((old('organizaciones_sociales') && in_array($organizacion_social->id, old('organizaciones_sociales'))) || (isset($persona) && $persona->ficha_beneficiario != null && $persona->ficha_beneficiario->dato_social->organizaciones_sociales !=null && count($persona->ficha_beneficiario->dato_social->organizaciones_sociales) > 0 && count($persona->ficha_beneficiario->dato_social->organizaciones_sociales->where('id', $organizacion_social->id)) > 0))
                        selected
                    @endif
                >{{$organizacion_social->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
