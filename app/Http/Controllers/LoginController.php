<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware("no.auth");
    }
    
    public function index()
    {
        return view('login');
    }

    public function login( LoginRequest $request )
    {
        $credentials = $this->getCredentials( $request );
        if ( !Auth::validate($credentials) ) {
           return redirect()->route('login')
                    ->withInput($credentials)
                    ->withErrors(['email' => trans('auth.failed')]);
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return redirect()->route('home');
    }

    public function getCredentials( $request )
    {
        return [
            'email' => $request->email,
            'password' => $request->password
        ];
    }
}
