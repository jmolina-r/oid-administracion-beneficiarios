<div class='step-pane active' data-step='1'>
    <div class="col-md-12">
        @include('partials.save.general.nombre')
    </div>

    <div class="col-md-12">
        <div class='form-group'>
            <label class='control-label' for='inputText'>Apellidos</label>
            <div class='controls'>
                <input name='apellidos' value="{{ old('apellidos') }}" class='form-control onlyletters' id='inputText' placeholder='Apellidos' type='text' required>
                <div class="help-block with-errors">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class='form-group'>
            <label class='control-label' for='inputText'>Cédula de identidad (Sin puntos con guión)</label>
            <div class='controls'>
                <input name="rut" value="{{ old('rut') }}" class='onlyrut form-control' id='inputText' placeholder='Ej. 12345678-8' type='text' required pattern="\d{3,8}-[\d|kK]{1}" maxlength="200">
                <div class="help-block with-errors">
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            <label class='control-label' for='inputSelect'>Nacionalidad</label>
            <select style="width:100%;" name='id_pais' class='form-control select-tag' id='inputSelect'>
                @foreach($paises as $pais)
                    <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            <label class='control-label' for='inputSelect'>Fecha de Nacimiento</label>
            <div class='input-group' id='fecha_nacimiento'>
                <input value="{{ old('fecha_nacimiento') }}" name='fecha_nacimiento' class='form-control' data-format='DD/MM/YYYY' placeholder='Fecha de Nacimiento' type='text' required>
                <span class='input-group-addon'>
                    <span class='fa fa-calendar'></span>
                </span>
            </div>
            <div class="help-block with-errors">
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            <label class='control-label'>Sexo</label>
            <div class='col-md-12'>
                <label style="margin-top: 0px;" class='radio radio-inline'>
                    <input name='sexo' @if(old('sexo') != 'femenino') checked @endif type='radio' value='masculino' required>
                    Masculino
                </label>
                <label class='radio radio-inline'>
                    <input name='sexo' @if(old('sexo') === 'femenino') checked @endif type='radio' value='femenino' required>
                    Femenino
                </label>
            </div>
            <div class="help-block with-errors">
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            <label class='control-label' for='inputSelect'>Situación Civil</label>
            <select style="width:100%;" name='estado_civil' class='form-control capitalize select-tag' id='inputSelect'>
                @foreach($estados_civiles as $estado_civil)
                    <option value="{{$estado_civil->id}}">{{$estado_civil->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class='form-group'>
            <label class='control-label' for='inputText'>Domicilio</label>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class='form-group'>
                        <div class='controls'>
                            <input value="{{ old('domicilio_calle') }}" name='domicilio_calle' class='form-control' id='domicilio_calle' placeholder='Calle' type='text' maxlength="200">
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class='form-group'>
                        <input name='domicilio_numero' value="{{ old('domicilio_numero') }}" class='form-control onlynumbers' id='domicilio_numero' placeholder='Número' type='text'>
                        <div class="help-block with-errors">
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class='form-group'>
                        <input name='domicilio_block' value="{{ old('domicilio_block') }}" class='form-control' id='domicilio_block' placeholder='Block' type='text'>
                        <div class="help-block with-errors">
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class='form-group'>
                        <div class='controls'>
                            <input name='domicilio_numero_dpto' value="{{ old('domicilio_dpto') }}" class='form-control' id='inputText' placeholder='N° Departamento' type='text'>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class='form-group'>
                        <div class='controls'>
                            <input name='domicilio_poblacion' value="{{ old('domicilio_poblacion') }}" class='form-control' id='inputText' placeholder='Poblacion / Villa' type='text'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
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

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class='control-label' for='inputSelect'>
                Credencial de discapacidad
            </label>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
                <select style="width:100%;" name='credencial_discapacidad' value="{{ old('credencial_discapacidad') }}" class='form-control select-tag' id='credencial_discapacidad' required>
                   <option value='0'>No</option>
                   <option value='2'>En trámite</option>
                   <option value='1'>Si</option>
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
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

    <!-- Falta aqui manejar la subida de archivo para agregar la credencial -->

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class='control-label' for='inputSelect'>
                Registro social de hogares
            </label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
                <select style="width:100%;" name='registro_social_hogares' class='form-control select-tag' required id="registro_social_hogares">
                   <option value='0'>No</option>
                   <option value='2'>En trámite</option>
                   <option value='1'>Si</option>
                </select>
            </div>

            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
                <div class="input-group">
                    <input name='registro_social_porcentaje' class='form-control' placeholder='Porcentaje' type='number' min="0" max="100" id="registro_social_porcentaje" disabled>
                    <span class='input-group-addon'>%</span>
                </div>
                <div class="help-block with-errors">
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
            <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group'>
                <input name='nombre_tutor' value="{{ old('nombre_tutor') }}" class='form-control onlyletters' id='inputText' placeholder='Nombre' type='text' required maxlength="200">
                <div class="help-block with-errors">
                </div>
            </div>
            <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group'>
                <input name='apellido_tutor' value="{{ old('apellido_tutor') }}" class='form-control onlyletters' id='inputText' placeholder='Apellidos' type='text' required maxlength="200">
                <div class="help-block with-errors">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group input-group'>
                <span class='capitalize input-group-addon'>+56</span>
                <input name='telefono_tutor' value="{{ old('telefono_tutor') }}" class='form-control onlynumbers' id='inputText' placeholder='Teléfono de contacto' type='text' maxlength="9">
            </div>
        </div>
    </div>
</div>