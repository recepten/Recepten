<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;


class AuthController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        User::create([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),

        ]);

        return redirect()
            ->route('login.index')
            ->with('status', 'Uw account is aangemaakt, u kunt nu inloggen');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request) {
        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
            return redirect()->back()->with('info', 'Er kan niet ingelogd worden met het ingevulde email adres en wachtwoord, probeer het opnieuw');
        }
        return redirect()->route('home')->with('status', 'Je bent succesvol ingelogd');
    }

    public function getSignout() {
        Auth::logout();
        return redirect()->route('home');
    }
}