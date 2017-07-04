<div class="form-group">
    <label class='control-label' for='inputText'>Contacto</label>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-md-4 controls">
            <div class='form-group'>
                <div class='input-group'>
                    <span class='capitalize input-group-addon'>+56</span>
                    <input name='tel_fijo' value="{{ old('tel_fijo') }}" class='form-control onlynumbers' id='inputText' placeholder='Telefono Fijo' type='text' maxlength="9">
                </div>
            </div>
        </div>

        <div class="col-md-4 controls">
            <div class='form-group'>
                <div class='input-group'>
                    <span class='capitalize input-group-addon'>+56</span>
                    <input name='tel_movil' value="{{ old('tel_movil') }}" class='form-control onlynumbers' id='inputText' placeholder='Celular' type='text' maxlength="9">
                </div>
            </div>
        </div>

        <div class="col-md-4 controls">
            <div class='form-group'>
                <input name='email'  value="{{ old('email') }}" class='form-control' placeholder='E-mail' type='email' pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                <div class="help-block with-errors">
                </div>
            </div>
        </div>
    </div>
</div>