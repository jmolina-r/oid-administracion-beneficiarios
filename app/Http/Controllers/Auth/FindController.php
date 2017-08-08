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
        $this->middleware('roles:admin');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function getUsers()
    {
        return User::get();
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSearch()
    {
        return view('auth.find');
    }

}
