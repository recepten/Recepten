<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Recept;

class ReceptController extends Controller
{
    public function index($id)
    {
         $recepten = DB::table('recepten')->where('receptId', $id)->get();

        return view('recept', ['recepten' => $recepten]);
    }

    public function recept_toevoegen()
    {
    	return view('recepttoevoegen');

    }

    public function recept_opslaan(Request $request)
    {

    	 Recept::create([
    	 	'titel' => $request->Titel,
    	 	'catagorieId' => $request->catagorieId,
    	 	'gebruikerId' => \Auth::id(),
    	 	'beschrijving' => $request->beschrijving,
    	 	'ingredienten' => $request->Ingredienten
    	 ]);



    }
}
