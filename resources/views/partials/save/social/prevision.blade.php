<div class="form-group">
    <label class='control-label' for='inputText'>Previsión</label>

    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
        <select style="width:100%;" name='prevision' class='form-control capitalize select-nomore' id='prevision'>

            @if (isset($persona))
                @foreach($previsiones as $prevision)
                    @if($prevision->id==$infoSocial->prevision_id)
                        <option selected value="{{$prevision->id}}">{{$prevision->nombre}}</option>
                    @else
                        <option value="{{$prevision->id}}">{{$prevision->nombre}}</option>
                    @endif
                @endforeach
            @else
                @foreach($previsiones as $prevision)
                    <option value="{{$prevision->id}}">{{$prevision->nombre}}</option>
                @endforeach
            @endif

        </select>
    </div>
</div>
