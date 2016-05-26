<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Recept;

class ReceptController extends Controller
{
    function __construct()
    {
        $this->middleware('not_upvoted', ['only' => ['upvote']]);
    }

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


         return redirect()
            ->route('home')
            ->with('info', 'Uw account is aangemaakt, u kunt nu inloggen');



    }

    public function delete($id)
    {

        DB::table('recepten')->where('receptId', $id )->delete();


         return redirect()
            ->route('recepten')
            ->with('info', 'Uw recept is verwijderd');



    }

    public function upvote($id)
    {
        $upvote = DB::table('upvotes')->insert([
            'gebruikerId' => \Auth::id(),
            'receptId' => $id
        ]);

        return redirect("recept/$id")
            ->with('status', 'Uw recept is geupvote');

    }
}
