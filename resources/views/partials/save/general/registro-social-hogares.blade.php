<div class="form-group">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label class='control-label' for='inputSelect'>
            Registro social de hogares
        </label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class='form-group'>
                <select style="width:100%;" name='registro_social_hogares' class='form-control select-tag' required id="registro_social_hogares">
                   <option value='0' {{ old('registro_social_hogares') == "0" ? "selected" : ""}}>No</option>
                   <option value='2' {{ old('registro_social_hogares') == "2" ? "selected" : ""}}>En trámite</option>
                   <option value='1' {{ old('registro_social_hogares') == "1" ? "selected" : ""}}>Si</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class='form-group'>
                <div class="input-group">
                    <input name='registro_social_porcentaje' class='form-control' placeholder='Porcentaje' type='number' min="0" max="100" id="registro_social_porcentaje" disabled>
                    <span class='input-group-addon'>%</span>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>
        </div>
    </div>
</div>