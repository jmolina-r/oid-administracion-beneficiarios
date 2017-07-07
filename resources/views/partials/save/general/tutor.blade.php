<div class="form-group">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label class='control-label' for='inputSelect'>
            Acompañante o tutor (*)
        </label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class='form-group'>
                <input name='nombre_tutor' class='form-control onlyletters' id='inputText' placeholder='Nombre' type='text' required maxlength="200" value=
                @if(old('nombre_tutor') != null)
                    "{{ old('nombre_tutor') }}"
                @elseif(isset($persona) && $persona->tutor != null && $persona->tutor->nombre != null)
                    "{{ $persona->tutor->nombre }}"
                @else
                    ""
                @endif
                >
                <div class="help-block with-errors">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class='form-group'>
                <input name='apellido_tutor' class='form-control onlyletters' id='inputText' placeholder='Apellidos' type='text' required maxlength="200" value=
                @if(old('apellido_tutor') != null)
                    "{{ old('apellido_tutor') }}"
                @elseif(isset($persona) && $persona->tutor != null && $persona->tutor->apellido != null)
                    "{{ $persona->tutor->apellido }}"
                @else
                    ""
                @endif
                >
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
                    <input name='telefono_tutor' class='form-control onlynumbers' id='inputText' placeholder='Teléfono de contacto' type='text' maxlength="9" value=
                    @if(old('telefono_tutor') != null)
                        "{{ old('telefono_tutor') }}"
                    @elseif(isset($persona) && $persona->tutor != null && $persona->tutor->telefonos->first() != null)
                        "{{ $persona->tutor->telefonos->first()->numero }}"
                    @else
                        ""
                    @endif
                    >
                </div>
            </div>
        </div>
    </div>
</div>