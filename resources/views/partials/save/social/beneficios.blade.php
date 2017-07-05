<div class="form-group">
    <label class='control-label' for='inputText'>Beneficios</label>
    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
        <select style="width:100%;" name="beneficios[]" class='form-control select-tag' data-placeholder='Selecciona los beneficios asociados...' multiple='multiple'>
            @foreach($beneficios as $beneficio)
                <option value="{{$beneficio->id}}">{{$beneficio->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>