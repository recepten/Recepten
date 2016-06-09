<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Recept;
use Illuminate\Support\Facades\Input;

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
        // GET ALL THE INPUT DATA , $_GET,$_POST,$_FILES.
        $input = Input::all();

        // VALIDATION RULES
        $rules = array(
            'file' => 'image|max:3000',
            'Titel' => 'required',
            'beschrijving' => 'required',
            'Ingredienten' => 'required',
        );

       // hier validate je de input met de rules dit geeft een true of false
        $validation = Validator::make($input, $rules);

        // als de validate niet goed is wordt je doorgestuurd.
        if ($validation->fails()) {

            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validation);

        }

        $data = [
            'titel' => $request->Titel,
            'catagorieId' => $request->catagorieId,
            'gebruikerId' => \Auth::id(),
            'beschrijving' => $request->beschrijving,
            'ingredienten' => $request->Ingredienten,
        ];

        // als de request een file heeft
        if ($file = array_get($input, 'file', false)) {
            // hier kan je het pad invullen
            $destinationPath = 'uploads';

            // deze haalt de exensie van van de foto op
            $extension = $file->getClientOriginalExtension();

            // vernaderd de naam van het bestand  en zet de exensie er weer achter
            $fileName = rand(11111, 99999) . '.' . $extension;

            // upload de foto naar de map
            $upload_success = $file->move($destinationPath, $fileName);

            $data['foto'] = $fileName;
        }




        Recept::create($data);

        return redirect()
            ->route('home')
            ->with('info', 'Uw reccept is succesvol toegevoegd');




    }

        public function edit($id)
    {
         $recept = DB::table('recepten')->where('receptId', $id)->first();

        return view('receptbewerken', ['recept' => $recept]);
    }


    public function editsave($id, Request $request)
    {
        // VALIDATION RULES
        $rules = [
            'file' => 'image|max:3000',
            'Titel' => 'required',
            'beschrijving' => 'required',
            'Ingredienten' => 'required',
        ];

        // hier validate je de input met de rules dit geeft een true of false
        $validation = Validator::make($request->all(), $rules);

        // als de validate niet goed is wordt je doorgestuurd.
        if ($validation->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validation);

        }

        $data = [
            'titel' => $request->Titel,
            'catagorieId'=> $request->catagorieId,
            'beschrijving' => $request->beschrijving,
            'ingredienten' => $request->Ingredienten
        ];

        // Als de request een bestand heeft...
        if($file = array_get($request, 'file', false)) {
            // hier kan je het pad invullen
            $destinationPath = 'uploads';

            // deze haalt de exensie van van de foto op
            $extension = $file->getClientOriginalExtension();

            // vernaderd de naam van het bestand  en zet de exensie er weer achter
            $fileName = rand(11111, 99999) . '.' . $extension;

            // upload de foto naar de map
            $file->move($destinationPath, $fileName);

            $data['foto'] = $fileName;
        }

        Recept::where('receptId', $id)->update($data);

        return redirect()->route("recept.index", ['id' => $id])
                         ->with('info', 'Uw account is aangemaakt, u kunt nu inloggen');
    }






    public function delete($id)
    {

        DB::table('recepten')->where('receptId', $id )->delete();


         return redirect()
            ->route("home", array('id' => $id))
            ->with('info', 'Uw recept is verwijderd');



    }

    public function upvote($id)
    {
        DB::table('upvotes')->insert([
            'gebruikerId' => \Auth::id(),
            'receptId' => $id
        ]);

        return redirect("recept/$id")
            ->with('status', 'Uw recept is geupvote');

    }

    public function favorietToevoegen($id)
    {
        DB::table('favorieten')->insert([
            'gebruikerId' => \Auth::id(),
            'receptId' => $id
        ]);

    return redirect("recept/$id")
            ->with('status', 'Uw recept is toegevoegd aan uw favorieten');

    }

    public function favorietVerwijderen($id)
    {
        DB::table('favorieten')->where('receptId', $id)->delete();

        return redirect("recept/$id")
            ->with('status', 'Uw recept is verwijderd uit uw favorieten');

    }
    public function favorietVerwijderenVanuitLijst($id)
    {
        DB::table('favorieten')->where('receptId', $id)->delete();

        return redirect("favorieten")
            ->with('status', 'Uw recept is verwijderd uit uw favorieten');

    }
}

