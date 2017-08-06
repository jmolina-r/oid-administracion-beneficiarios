<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label class='control-label' for='inputText'>Datos de Usuario</label>

    <div class="controls with-icon-over-input">
        <input id="username" type="text" class="form-control" name="username" placeholder="Nombre de Usuario" value="{{ old('username') }}" required autofocus>

        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

    <div class="controls with-icon-over-input">
        <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}" required>

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
        <input id="password" type="password" class="form-control" placeholder="Contraseña" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="controls with-icon-over-input">
        <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar Contraseña" name="password_confirmation" required>
    </div>
</div>

<div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
    <label class='control-label' for='inputText'>Roles</label>

    <select style="width:100%;" name="roles[]" class='form-control select-tag' data-placeholder='Selecciona los beneficios asociados...' multiple='multiple'>

        @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->nombre}}</option>
        @endforeach
    </select>

    @if ($errors->has('roles'))
        <span class="help-block">
            <strong>{{ $errors->first('roles') }}</strong>
        </span>
    @endif
</div>

<button class='btn btn-block btn-success'>Guardar Usuario</button>
