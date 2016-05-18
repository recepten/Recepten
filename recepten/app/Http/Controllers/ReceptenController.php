<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use App\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ReceptenController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {

    	$recepten = Recepten::all();

    	$data = [
    		'recepten' => $recepten
        ];

        return view('dashboard')->with($data);
    }

}