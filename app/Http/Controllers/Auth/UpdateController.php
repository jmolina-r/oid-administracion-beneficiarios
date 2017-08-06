<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;

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
        $this->middleware('roles:admin');
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
            /*'username' => 'required|string|max:255|exists:users,username',*/
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'roles' => 'required'
        ];

        return $rules;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function update(Request $request, $id)
    {
        $this->validate($request, $this->rules($request));
        $user = User::find($id);
        $updateArray = [
            'email' => $request['email']
        ];
        if($request['password'] != null && $request['password'] != '') {
            $updateArray['password'] = bcrypt($request['password']);
        }
        User::find($id)->update($updateArray);

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


        return $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUpdateForm($id)
    {
        // Role
        $roles = Role::get();

        // User
        $user = User::find($id);

        return view('auth.update')
            ->with(compact('roles'))
            ->with(compact('user'));

    }

}
