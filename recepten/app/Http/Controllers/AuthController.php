<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\User;

Class AuthController extends Controller {
	public function getLogin(){
		return view('auth.login');
	}

	public function getRegister(){

	}

	public function PostRegister() {

	}
}