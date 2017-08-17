<?php

namespace App\Http\Controllers\Auth;

use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

 use Illuminate\Http\Request;

class FindController extends Controller
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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSearch()
    {
        $users = User::get();

        return view('auth.find')
            ->with(compact('users'));
    }

    public function userInfoJson($id)
    {
        return User::find($id);
    }

    public function userInfoRolesJson($id)
    {
        return User::find($id)->role;
    }

    public function userInfoFuncionarioJson($id)
    {
        return User::find($id)->funcionario;
    }

}
