<div class="form-group">
    <label class='control-label' for='inputText'>Contacto</label>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-md-4 controls">
            <div class='form-group'>
                <div class='input-group'>
                    <span class='capitalize input-group-addon'>+56</span>
                    <input name='tel_fijo' id="tel_fijo" value=
                        @if(old('tel_fijo'))
                            "{{ old('tel_fijo') }}"
                        @elseif(isset($persona) && $persona->telefonos()->where('tipo', 'fijo')->first() != null)
                            "{{ $persona->telefonos()->where('tipo', 'fijo')->first()->numero }}"
                        @else
                            ""
                        @endif
                    class='form-control onlynumbers' id='inputText' placeholder='Telefono Fijo' type='text' maxlength="9">
                </div>
            </div>
        </div>

        <div class="col-md-4 controls">
            <div class='form-group'>
                <div class='input-group'>
                    <span class='capitalize input-group-addon'>+56</span>
                    <input name='tel_movil' id="tel_movil" value=
                        @if(old('tel_movil'))
                            "{{ old('tel_movil') }}"
                        @elseif(isset($persona) && $persona->telefonos()->where('tipo', 'movil')->first() != null)
                            "{{ $persona->telefonos()->where('tipo', 'movil')->first()->numero }}"
                        @else
                            ""
                        @endif
                    class='form-control onlynumbers' id='inputText' placeholder='Celular' type='text' maxlength="9">
                </div>
            </div>
        </div>

        <div class="col-md-4 controls">
            <div class='form-group'>
                <input name='email'  id="email" value=
                    @if(old('email'))
                        "{{ old('email') }}"
                    @elseif(isset($persona) && isset($persona->email))
                        "{{ $persona->email }}"
                    @else
                        ""
                    @endif
                class='form-control' placeholder='E-mail' type='email' pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                <div class="help-block with-errors">
                </div>
            </div>
        </div>
    </div>
</div>
