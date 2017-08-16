<label class='control-label' for='inputText'>Datos del Funcionario</label>
<div class="row">
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
            <div class="controls with-icon-over-input">
                <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombres del Funcionario" value=
                @if(old('nombre'))
                    "{{ old('nombre') }}"
                @elseif(isset($funcionario))
                    "{{ $funcionario->nombre }}"
                @else
                    ""
                @endif
                 autofocus>

                @if ($errors->has('nombre'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">

            <div class="controls with-icon-over-input">
                <input id="apellido" type="text" class="form-control" name="apellido" placeholder="Apellidos del Funcionario" value=
                @if(old('apellido'))
                    "{{ old('apellido') }}"
                @elseif(isset($funcionario))
                    "{{ $funcionario->apellido }}"
                @else
                    ""
                @endif
                >

                @if ($errors->has('apellido'))
                    <span class="help-block">
                        <strong>{{ $errors->first('apellido') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">

            <div class="controls with-icon-over-input">
                <input id="rut" type="text" class="form-control" placeholder="Rut del Funcionario" name="rut" value=
                @if(old('rut'))
                    "{{ old('rut') }}"
                @elseif(isset($funcionario))
                    "{{ $funcionario->rut }}"
                @else
                    ""
                @endif
                @if(isset($funcionario))
                    readonly
                @endif
                 >

                @if ($errors->has('rut'))
                    <span class="help-block">
                        <strong>{{ $errors->first('rut') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">

        <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
            <div class='controls input-group'>
                <input id='fecha_nacimiento' value-date=
                    @if(old('fecha_nacimiento') != null)
                        "{{ old('fecha_nacimiento') }}"
                    @elseif(isset($funcionario))
                        "{{ $funcionario->fecha_nacimiento }}"
                    @else
                        ""
                    @endif
                    name='fecha_nacimiento' class='form-control' data-format='DD/MM/YYYY' placeholder='Fecha de Nacimiento' type='text'>
                <span class='input-group-addon'>
                    <span class='fa fa-calendar'></span>
                </span>
            </div>
            @if ($errors->has('direccion'))
                <span class="help-block">
                    <strong>{{ $errors->first('direccion') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">

            <div class="controls with-icon-over-input">
                <input id="direccion" type="text" class="form-control" name="direccion" placeholder="Dirección Particular" value=
                @if(old('direccion'))
                    "{{ old('direccion') }}"
                @elseif(isset($funcionario))
                    "{{ $funcionario->direccion }}"
                @else
                    ""
                @endif
                >

                @if ($errors->has('direccion'))
                    <span class="help-block">
                        <strong>{{ $errors->first('direccion') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">

            <div class="controls with-icon-over-input">
                <input id="telefono" type="text" class="form-control" name="telefono" placeholder="Telefono del Funcionario" value=
                @if(old('telefono'))
                    "{{ old('telefono') }}"
                @elseif(isset($funcionario))
                    "{{ $funcionario->telefono }}"
                @else
                    ""
                @endif
                >

                @if ($errors->has('telefono'))
                    <span class="help-block">
                        <strong>{{ $errors->first('telefono') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <div class="controls with-icon-over-input">
                <input id="emailFuncionario" type="email" class="form-control" placeholder="E-mail" name="email" value=
                @if(old('email'))
                    "{{ old('email') }}"
                @elseif(isset($funcionario))
                    "{{ $funcionario->email }}"
                @else
                    ""
                @endif
                >

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group{{ $errors->has('tipo_funcionario') ? ' has-error' : '' }}">
    <label class='control-label' for='inputText'>Cargo en OID</label>

    <select id="tipo_funcionario" style="width:100%;" name="tipo_funcionario" class='form-control select-tag' data-placeholder='Cargo en OID'>

        @foreach($tipo_funcionarios as $tipo_funcionario)
            <option
                @if((@old('tipo_funcionario') == $tipo_funcionario->id) || (@old('tipo_funcionario') == null && isset($funcionario) && $tipo_funcionario->id == $funcionario->tipo_funcionario->id))
                    selected
                @endif
            value="{{$tipo_funcionario->id}}">{{$tipo_funcionario->nombre}}</option>
        @endforeach

    </select>

    @if ($errors->has('tipo_funcionario'))
        <span class="help-block">
            <strong>{{ $errors->first('tipo_funcionario') }}</strong>
        </span>
    @endif
</div>


<br>

<button id="submitFuncionario" class='btn btn-block btn-success'>Guardar Funcionario</button>
