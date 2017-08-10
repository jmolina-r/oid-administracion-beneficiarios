<div class="form-group">
    <label class='control-label' for='inputText'>Sistema de protección</label>
    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
        <select style="width:100%;" name='sistema_proteccion' class='form-control capitalize select-tag'data-placeholder='Seleccione o agregue sistemas de proteccion' id="sistema_proteccion">
            <option value=''>No tiene</option>
            @foreach($datos_sociales as $dato_social)
                <option class="capitalize" value="{{$dato_social->id}}">{{$dato_social->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>