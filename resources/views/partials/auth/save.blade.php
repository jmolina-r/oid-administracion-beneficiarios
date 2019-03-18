<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label class='control-label' for='inputText'>Datos de Usuario</label>

    <div class="controls with-icon-over-input">
        <input id="usernameUserSave" type="text" class="form-control" name="username" placeholder="Nombre de Usuario" value=
        @if(old('username'))
            "{{ old('username') }}"
        @elseif(isset($user))
            "{{ $user->username }}"
        @else
            ""
        @endif
         autofocus

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
        <input id="emailUserSave" type="email" class="form-control" placeholder="E-mail" name="email" value=
        @if(old('email'))
            "{{ old('email') }}"
        @elseif(isset($user))
            "{{ $user->email }}"
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

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<label class='control-label' for='inputText'>Contraseña</label>
    <div class="controls with-icon-over-input">
        <input id="passwordUserSave" type="password" class="form-control" placeholder="Contraseña" name="password"
        @if(!isset($user))

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
        <input id="passwordConfirmUserSave" type="password" class="form-control" placeholder="Confirmar Contraseña" name="password_confirmation"
        @if(!isset($user))

        @endif
        >
    </div>
</div>

<div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
    <label class='control-label' for='inputText'>Roles</label>

    <select id="roleUserSave" style="width:100%;" name="roles" class='form-control select-tag'>

        @foreach($roles as $role)
            <option value="{{$role->id}}"
                @if((@old('roles') == $role->id) || (@old('roles') == null && isset($user) && $user->role != null && $role->id == $user->role->id))
                    {{-- (old('roles') && in_array($role->id, old('roles'))) || (isset($user) && $user->roles != null && count($user->roles) > 0 && count($user->roles->where('id', $role->id)) > 0)) --}}
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
            <input name='status' id="estadoUserSave"
                @if((old('status') == null && !isset($user)) || (old('status') != null && old('status') != '0') || (old('status') == null && isset($user) && $user->status == "1"))
                    checked
                @endif
            type='radio' value='1' >
            Activo
        </label>
        <label class='radio radio-inline'>
            <input name='status' id="estadoUserSave"
            @if((old('status') != null && old('status') == '0') || (old('status') == null && isset($user) && $user->status == "0"))
                checked
            @endif
            type='radio' value='0' >
            Inactivo
        </label>
    </div>
</div>

<br>

@if(isset($user) && $user->funcionario != null)
    <label class='control-label' for='inputText'>Funcionario de OID Asociado</label>
    <br>
    <p id="funcionarioUserData" class="capitalize">{{ $user->funcionario->nombre }} {{ $user->funcionario->apellido }}</p>
    <i id="funcionarioUserDataIco" class="fa fa-search-plus fa-lg" aria-hidden="true"></i>
    <br>
@else
<div class="form-group{{ $errors->has('funcionario') ? ' has-error' : '' }}">
    <label class='control-label' for='inputText'>Asociar Funcionario de OID</label>

    <select id="funcionarioUserSave" style="width:100%;" name="funcionario_id" class='form-control select-tag'>
        {{-- <option value="">No tiene</option> --}}
        @foreach($funcionarios as $funcionario)
            <option value="{{$funcionario->id}}"
                @if((@old('funcionario') == $funcionario->id) || (@old('funcionario') == null && isset($user) && $user->funcionario != null && $funcionario->id == $user->funcionario->id))
                    selected
                @endif
            >{{ $funcionario->nombre }} {{ $funcionario->apellido }}</option>
        @endforeach

    </select>

    @if ($errors->has('funcionario'))
        <span class="help-block">
            <strong>{{ $errors->first('funcionario') }}</strong>
        </span>
    @endif
</div>
@endif

<button id="userSaveFormBtn" class='btn btn-block btn-success'>Guardar Usuario</button>
