<div class="form-group">
    <label class='control-label' for='inputText'>Sistema de protección</label>
    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
        <select style="width:100%;" name='sistema_proteccion' class='form-control capitalize select-nomore' id="sistema_proteccion">
            @if(@old('sistema_proteccion') == null && isset($persona) == null)
            	<option selected value=''>No tiene</option>
            @endif
            @foreach($datos_sociales as $dato_social)
                <option
                @if(@old('sistema_proteccion') == $dato_social->id)
                	selected
                @elseif(@old('sistema_proteccion') == null && isset($persona) && $persona->ficha_beneficiario != null && $persona->ficha_beneficiario->dato_social->dato_social != null && $persona->ficha_beneficiario->dato_social->dato_social->id == $dato_social->id)
                	selected
                @endif
                value="{{$dato_social->id}}">{{$dato_social->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
