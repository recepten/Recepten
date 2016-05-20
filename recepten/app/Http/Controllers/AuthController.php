<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

Class AuthController extends Controller {
	public function getLogin(){
		return view('auth.login');
	}

	public function getRegister(){
		return view('auth.register');
	}

	public function PostRegister(Request $request) {

		// $this->validate($request, [
		// 	'email' => 'required|email',
		// 	'password' => 'required|min:8',
		// ]);

		User::create([
			'naam' =>  $request->input('name'),
			'email' => $request->input('email'),
			'wachtwoord' => bcrypt($request->input('password'))
		]);

		return redirect()->route('login.index');
	}
}