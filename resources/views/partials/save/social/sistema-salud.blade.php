<div class="form-group">
    <label class='control-label col-xs-12 col-sm-12 col-md-12 col-lg-12' for='inputText'>Sistema de Salud</label>

    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
        @if(isset($persona))
            <label style="margin-top: 0px;" class='radio radio-inline'>
                <input id="sistema_salud" name='sistema_salud' type='radio' value='fonasa'
                       @if($infoSocial->fonasa_id!=null)
                       checked
                        @endif
                >
                Fonasa
            </label>
            <label class='radio radio-inline'>
                <input id="sistema_salud" name='sistema_salud' type='radio' value='isapre'
                       @if($infoSocial->isapre_id!=null)
                       checked
                        @endif
                >
                Isapre
            </label>
        @else
            <label style="margin-top: 0px;" class='radio radio-inline'>
                <input id="sistema_salud" name='sistema_salud' type='radio' value='fonasa' checked>Fonasa
            </label>
            <label class='radio radio-inline'>
                <input id="sistema_salud" name='sistema_salud' type='radio' value='isapre'> Isapre
            </label>
        @endif
        <div class="help-block with-errors">
        </div>
    </div>

    <div class='col-sm-12 col-md-6 col-lg-6 form-group'>
        @if(isset($persona))
            @if($infoSocial->fonasa_id != null)
                <select style="width:100%;" id="sistemaSaludSelec" name='fonasa'
                        class='form-control capitalize select-nomore' required>
                    @foreach($fonasa as $fona)
                        @if($fona->id == $infoSocial->fonasa_id )
                            <option selected value="{{$fona->id}}">{{$fona->tramo}}</option>
                        @else
                            <option value="{{$fona->id}}">{{$fona->tramo}}</option>
                        @endif
                    @endforeach
                </select>
            @else
                <select style="width:100%;" id="sistemaSaludSelec" name='isapre'
                        class='form-control capitalize select-nomore' required>
                    @foreach($isapre as $isap)
                        @if($isap->id == $infoSocial->isapre_id)
                            <option selected value="{{$isap->id}}">{{$isap->organizacion}}</option>
                        @else
                            <option value="{{$isap->id}}">{{$isap->organizacion}}</option>
                        @endif
                    @endforeach
                </select>
            @endif

        @else
            <select style="width:100%;" id="sistemaSaludSelec" name='fonasa'
                    class='form-control capitalize select-nomore' required>
                @foreach($fonasa as $fona)
                    <option value="{{$fona->id}}">{{$fona->tramo}}</option>
                @endforeach
            </select>
        @endif


    </div>


</div>
