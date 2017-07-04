<div class='step-pane active' data-step='1'>
    <div class="col-md-12">
        @include('partials.save.general.nombre')
    </div>

    <div class="col-md-12">
        @include('partials.save.general.apellido')
    </div>

    <div class="col-md-12">
        @include('partials.save.general.rut')
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        @include('partials.save.general.nacionalidad')
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        @include('partials.save.general.fecha-nacimiento')
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        @include('partials.save.general.sexo')
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        @include('partials.save.general.situacion-civil')
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('partials.save.general.domicilio')
    </div>

    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
        @include('partials.save.general.contacto')
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class='control-label' for='inputSelect'>
                Credencial de discapacidad
            </label>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @include('partials.save.general.credencial-discapacidad')
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @include('partials.save.general.credencial-vencimiento')
            </div>
        </div>
    </div>

    <!-- Falta aqui manejar la subida de archivo para agregar la credencial -->

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class='control-label' for='inputSelect'>
                Registro social de hogares
            </label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @include('partials.save.general.registro-social-hogares')
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

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
</div>