<div class="form-group">
    <label class='control-label' for='inputText'>Sistema de protección</label>
    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
        <select style="width:100%;" name='sistema_proteccion' class='form-control capitalize select-nomore'
                id="sistema_proteccion">
            @if(isset($persona))
                @foreach($datos_sociales as $dato_social)

                    @if ($dato_social->id == $infoSocial->sistema_proteccion_id)
                        <option selected value="{{$dato_social->id}}">{{$dato_social->nombre}}</option>
                    @else
                        <option value="{{$dato_social->id}}">{{$dato_social->nombre}}</option>
                    @endif
                @endforeach
            @else
                @foreach($datos_sociales as $dato_social)
                    <option value="{{$dato_social->id}}">{{$dato_social->nombre}}</option>
                @endforeach
            @endif


        </select>
    </div>
</div>
