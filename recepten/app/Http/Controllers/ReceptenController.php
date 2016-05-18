<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
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
         $recepten = DB::table('recepten')->get();

        return view('recepten', ['recepten' => $recepten]);

    	/*$recepten = Recepten::all();

    	$data = [
    		'recepten' => $recepten
        ];

        return view('dashboard')->with($data);*/
    }

}