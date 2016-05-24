<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;

class ReceptController extends Controller
{
    public function index($id)
    {
         $recepten = DB::table('recepten')->where('receptId', $id)->get();

        return view('recepten', ['recepten' => $recepten]);
    }

    public function toevoegen()
    {
    	return view('recepttoevoegen');
    }
}
