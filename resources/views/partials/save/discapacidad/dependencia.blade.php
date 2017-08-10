<div class="form-group">
    <label class='control-label' for='inputText'>Dependencia</label>
    <div class='col-md-12 form-group'>
        <select style="width:100%;" name="tipo_dependencia" class='form-control permanente capitalize select-nomore' id='dependencia'>
            @foreach($dependencias as $dependencia)
	            <option
	                @if((@old('tipo_dependencia') == $dependencia->id) || (@old('tipo_dependencia') == null && isset($persona) && $persona->ficha_beneficiario != null && $dependencia->id == $persona->ficha_beneficiario->ficha_discapacidad->tipo_dependencia_id))
	                    selected
	                @endif
	            value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
