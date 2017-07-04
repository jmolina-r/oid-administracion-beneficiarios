<div class="form-group">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label class='control-label' for='inputSelect'>
            Acompañante o tutor
        </label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class='form-group'>
                <input name='nombre_tutor' value="{{ old('nombre_tutor') }}" class='form-control onlyletters' id='inputText' placeholder='Nombre' type='text' required maxlength="200">
                <div class="help-block with-errors">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class='form-group'>
                <input name='apellido_tutor' value="{{ old('apellido_tutor') }}" class='form-control onlyletters' id='inputText' placeholder='Apellidos' type='text' required maxlength="200">
                <div class="help-block with-errors">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class='form-group'>
                <div class="input-group">
                    <span class='capitalize input-group-addon'>+56</span>
                    <input name='telefono_tutor' value="{{ old('telefono_tutor') }}" class='form-control onlynumbers' id='inputText' placeholder='Teléfono de contacto' type='text' maxlength="9">
                </div>
            </div>
        </div>
    </div>
</div>