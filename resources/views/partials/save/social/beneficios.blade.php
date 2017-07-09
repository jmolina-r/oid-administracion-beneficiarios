<div class="form-group">
    <label class='control-label' for='inputText'>Beneficios</label>
    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
        <select style="width:100%;" name="beneficios[]" class='form-control select-tag' data-placeholder='Selecciona los beneficios asociados...' multiple='multiple'>

            @foreach($beneficios as $beneficio)
                <option value="{{$beneficio->id}}"
                    @if(isset($persona) && $persona->ficha_beneficiario != null && $persona->ficha_beneficiario->dato_social->beneficios !=null && count($persona->ficha_beneficiario->dato_social->beneficios) > 0 && count($persona->ficha_beneficiario->dato_social->beneficios->where('id', $beneficio->id)) > 0)
                        selected
                    @endif
                >{{$beneficio->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
