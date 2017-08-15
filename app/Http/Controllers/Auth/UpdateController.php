<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Funcionario;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

 use Illuminate\Http\Request;

class UpdateController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Changed to redirect to Login page.
        $this->middleware('auth');
        $this->middleware('roles:admin|coordinador_oficina');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function rules(Request $request)
    {
        $rules = [
            /*'name' => 'required|string|max:255', */
            'username' => 'required|string|max:255|exists:users,username',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'roles' => 'required',
            'status' => 'required|boolean',
            'funcionario_id' => 'nullable|exists:funcionarios,id'
        ];

        return $rules;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function update(Request $request, User $user)
    {
        $this->validate($request, $this->rules($request));
        $updateArray = [
            'email' => $request['email'],
            'status' => $request['status']
        ];

        if($request['password'] != null && $request['password'] != '') {
            $updateArray['password'] = bcrypt($request['password']);
        }

        if($request['funcionario_id'] != null && $request['funcionario_id'] != '') {
            $updateArray['funcionario_id'] = $request['funcionario_id'];
        }

        $user->update($updateArray);


        // Role Update

        foreach ($user->roles as $role) {
            $role->pivot->delete();
        }

        if ($request['roles']) {
            foreach ($request['roles'] as $key => $val) {
                if (is_numeric($val)) {
                    $role = Role::find($val);
                    if ($role) {
                        $user->roles()->save($role);
                    }
                }
            }
        }


        return redirect()->route('find');;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUpdateForm(User $user)
    {
        // Role
        $roles = Role::get();

        // Funcionarios without User account
        $funcionarios = [];

        foreach (Funcionario::get() as $funcionario) {
            if ($funcionario->user != null) {
                $funcionarios[] = $funcionario;
            }
        }

        return view('auth.update')
            ->with(compact('roles'))
            ->with(compact('funcionarios'))
            ->with(compact($user, 'user'));

    }

}
