<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label class='control-label' for='inputText'>Datos de Usuario</label>

    <div class="controls with-icon-over-input">
        <input id="username" type="text" class="form-control" name="username" placeholder="Nombre de Usuario" value=
        @if(old('username'))
            "{{ old('username') }}"
        @elseif(isset($user))
            "{{ $user->username }}"
        @else
            ""
        @endif
        required autofocus
        @if(isset($user))
            disabled
        @endif
        >

        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

    <div class="controls with-icon-over-input">
        <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value=
        @if(old('email'))
            "{{ old('email') }}"
        @elseif(isset($user))
            "{{ $user->email }}"
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

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<label class='control-label' for='inputText'>Contraseña</label>
    <div class="controls with-icon-over-input">
        <input id="password" type="password" class="form-control" placeholder="Contraseña" name="password"
        @if(!isset($user))
            required
        @endif
        >

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="controls with-icon-over-input">
        <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar Contraseña" name="password_confirmation"
        @if(!isset($user))
            required
        @endif
        >
    </div>
</div>

<div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
    <label class='control-label' for='inputText'>Roles</label>

    <select style="width:100%;" name="roles[]" class='form-control select-tag' data-placeholder='Selecciona los beneficios asociados...' multiple='multiple'>

        @foreach($roles as $role)
            <option value="{{$role->id}}"
                @if((old('roles') && in_array($role->id, old('roles'))) || (isset($user) && $user->roles != null && count($user->roles) > 0 && count($user->roles->where('id', $role->id)) > 0))
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
                @if((old('status') == null && !isset($user)) || (old('status') != null && old('status') != '0') || (old('status') == null && isset($user) && $user->status == "1"))
                    checked
                @endif
            type='radio' value='1' required>
            Activo
        </label>
        <label class='radio radio-inline'>
            <input name='status' id="status"
            @if((old('status') != null && old('status') == '0') || (old('status') == null && isset($user) && $user->status == "0"))
                checked
            @endif
            type='radio' value='0' required>
            Inactivo
        </label>
    </div>
</div>

<br>

<button class='btn btn-block btn-success'>Guardar Usuario</button>
