<div class="form-group">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label class='control-label' for='inputSelect'>
            Credencial de discapacidad
        </label>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class='form-group'>
                <select style="width:100%;" name='credencial_discapacidad' class='form-control select-tag' id='credencial_discapacidad' required>
                   <option value='0'>No</option>
                   <option value='2'>En trámite</option>
                   <option value='1'>Si</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <div class='input-group' id='credencial_venc'>
                    <input name='credencial_vencimiento' class='form-control' data-format='DD/MM/YYYY' placeholder='Vencimiento' type='text' id="credencial_vencimiento" disabled>
                    <span class='input-group-addon'>
                        <span class='fa fa-calendar'></span>
                    </span>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>
        </div>
    </div>
</div>
