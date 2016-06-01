<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use App\Models\User;
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
	}

	public function voorgerechten()
	{
		 $recepten = DB::table('recepten')->where('catagorieId', '1')->get();

		return view('recepten', ['recepten' => $recepten]);
	}

	public function hoofdgerechten()
	{
		 $recepten = DB::table('recepten')->where('catagorieId', '2')->get();

		return view('recepten', ['recepten' => $recepten]);
	}

	public function nagerechten()
	{
		 $recepten = DB::table('recepten')->where('catagorieId', '3')->get();

		return view('recepten', ['recepten' => $recepten]);
	}

	public function tussengerechten()
	{
		 $recepten = DB::table('recepten')->where('catagorieId', '4')->get();

		return view('recepten', ['recepten' => $recepten]);
	}

	public function cake()
	{
		 $recepten = DB::table('recepten')->where('catagorieId', '5')->get();

		return view('recepten', ['recepten' => $recepten]);
	}

	public function overig()
	{
		 $recepten = DB::table('recepten')->where('catagorieId', '6')->get();

		return view('recepten', ['recepten' => $recepten]);
	}

		public function mijnrecepten()
	{
		$id = \Auth::id();
		 $recepten = DB::table('recepten')->where('gebruikerId', $id)->get();

		return view('recepten', ['recepten' => $recepten]);
	}


	public function favorieten()
	{
		$id = \Auth::id();

		$alleRecepten = array();

		$recepten= DB::table('favorieten')->select('receptId')->where('gebruikerId', \Auth::id())->get();
		foreach ($recepten as $recept) {
			$favorieten = DB::table('recepten')->where('receptId', $recept->receptId)->get();
			array_push($alleRecepten, $favorieten[0]);
		 }
		return view('favorieten', ['recepten' => $alleRecepten]);
	}

}