<div class="form-group">
    <label class='control-label col-xs-12 col-sm-12 col-md-12 col-lg-12' for='inputText'>Sistema de Salud</label>

    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
        <label style="margin-top: 0px;" class='radio radio-inline'>
            <input name='sistema_salud' type='radio' value='fonasa' checked>
            Fonasa
        </label>
        <label class='radio radio-inline'>
            <input name='sistema_salud' type='radio' value='isapre'>
            Isapre
        </label>
        <div class="help-block with-errors">
        </div>
    </div>

    <div class='col-sm-12 col-md-6 col-lg-6 form-group'>
        <select style="width:100%;" id="sistemaSaludSelec" name='fonasa' class='form-control capitalize select-tag' required>
            @foreach($fonasa as $fona)
                <option value="{{$fona->id}}">{{$fona->tramo}}</option>
            @endforeach
        </select>
    </div>
</div>