<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
    <label class='control-label' for='inputText'>Datos del Funcionario</label>

    <div class="controls with-icon-over-input">
        <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombres del Funcionario" value=
        @if(old('nombre'))
            "{{ old('nombre') }}"
        @elseif(isset($funcionario))
            "{{ $funcionario->nombre }}"
        @else
            ""
        @endif
        required autofocus>

        @if ($errors->has('nombre'))
            <span class="help-block">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
        @endif
    </div>
</div>

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
        required>

        @if ($errors->has('apellido'))
            <span class="help-block">
                <strong>{{ $errors->first('apellido') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">

    <div class="controls with-icon-over-input">
        <input id="rut" type="email" class="form-control" placeholder="Rut del Funcionario" name="rut" value=
        @if(old('rut'))
            "{{ old('rut') }}"
        @elseif(isset($funcionario))
            "{{ $funcionario->rut }}"
        @else
            ""
        @endif
        @if(isset($funcionario))
            disabled
        @endif
         required>

        @if ($errors->has('rut'))
            <span class="help-block">
                <strong>{{ $errors->first('rut') }}</strong>
            </span>
        @endif
    </div>
</div>

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
        required>

        @if ($errors->has('telefono'))
            <span class="help-block">
                <strong>{{ $errors->first('telefono') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">

    <div class="controls with-icon-over-input">
        <input id="fecha_nacimiento" type="text" class="form-control" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" value=
        @if(old('fecha_nacimiento'))
            "{{ old('fecha_nacimiento') }}"
        @elseif(isset($funcionario))
            "{{ $funcionario->fecha_nacimiento }}"
        @else
            ""
        @endif
        required>

        @if ($errors->has('fecha_nacimiento'))
            <span class="help-block">
                <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">

    <div class="controls with-icon-over-input">
        <input id="direccion" type="text" class="form-control" name="direccion" placeholder="Fecha de Nacimiento" value=
        @if(old('direccion'))
            "{{ old('direccion') }}"
        @elseif(isset($funcionario))
            "{{ $funcionario->direccion }}"
        @else
            ""
        @endif
        required>

        @if ($errors->has('direccion'))
            <span class="help-block">
                <strong>{{ $errors->first('direccion') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

    <div class="controls with-icon-over-input">
        <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value=
        @if(old('email'))
            "{{ old('email') }}"
        @elseif(isset($funcionario))
            "{{ $funcionario->email }}"
        @else
            ""
        @endif
        required>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>


{{--
<div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
    <label class='control-label' for='inputText'>Roles</label>

    <select style="width:100%;" name="roles[]" class='form-control select-tag' data-placeholder='Selecciona los beneficios asociados...' multiple='multiple'>

        @foreach($roles as $role)
            <option value="{{$role->id}}"
                @if((old('roles') && in_array($role->id, old('roles'))) || (isset($funcionario) && $funcionario->roles != null && count($funcionario->roles) > 0 && count($funcionario->roles->where('id', $role->id)) > 0))
                    selected
                @endif
            >{{$role->nombre}}</option>
        @endforeach

    </select>

    @if ($errors->has('roles'))
        <span class="help-block">
            <strong>{{ $errors->first('roles') }}</strong>
        </span>
    @endif
</div>


<div class="form-group">
    <label class='control-label'>Estado</label>
    <div class='col-md-12'>
        <label style="margin-top: 0px;" class='radio radio-inline'>
            <input name='status' id="status"
                @if((old('status') == null && !isset($funcionario)) || (old('status') != null && old('status') != '0') || (old('status') == null && isset($funcionario) && $funcionario->status == "1"))
                    checked
                @endif
            type='radio' value='1' required>
            Activo
        </label>
        <label class='radio radio-inline'>
            <input name='status' id="status"
            @if((old('status') != null && old('status') == '0') || (old('status') == null && isset($funcionario) && $funcionario->status == "0"))
                checked
            @endif
            type='radio' value='0' required>
            Inactivo
        </label>
    </div>
</div>

--}}

<br>

<button class='btn btn-block btn-success'>Guardar Funcionario</button>
