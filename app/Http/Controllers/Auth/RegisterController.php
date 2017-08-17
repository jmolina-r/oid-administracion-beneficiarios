<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Funcionario;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

 use Illuminate\Http\Request;
 use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/find';


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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            /*'name' => 'required|string|max:255', */
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'roles' => 'required',
            'status' => 'required|boolean',
            'funcionario_id' => 'required|exists:funcionarios,id|unique:users,funcionario_id'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            /*'name' => $data['name'],*/
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => $data['status'],
            'funcionario_id' => $data['funcionario_id']
        ]);

        // Role Save
        if ($data['roles']) {
            foreach ($data['roles'] as $key => $val) {
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
    public function showRegistrationForm()
    {
        //Role
        $roles = Role::get();

        // Funcionarios without User account
        $funcionarios = [];

        foreach (Funcionario::get() as $funcionario) {
            if ($funcionario->user != null) {
                $funcionarios[] = $funcionario;
            }
        }


        return view('auth.register')
            ->with(compact('roles'))
            ->with(compact('funcionarios'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

}
